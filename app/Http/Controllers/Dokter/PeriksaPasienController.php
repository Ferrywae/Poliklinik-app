<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException; // ✅ tambah
use Throwable; // ✅ tambah (opsional tapi aman)

class PeriksaPasienController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();

        $daftarPasien = DaftarPoli::with(['pasien', 'jadwalPeriksa', 'periksas'])
            ->whereHas('jadwalPeriksa', function ($query) use ($dokterId) {
                $query->where('id_dokter', $dokterId);
            })
            ->orderBy('no_antrian')
            ->get();

        return view('dokter.periksa-pasien.index', compact('daftarPasien'));
    }

    public function create($id)
    {
        $obats = Obat::all();
        return view('dokter.periksa-pasien.create', compact('obats', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_daftar_poli' => 'required|exists:daftar_poli,id',
            'obat_json' => 'required',
            'catatan' => 'nullable|string',
            'biaya_periksa' => 'required|integer|min:0',
        ]);

        // ✅ decode obat_json + validasi harus array
        $obatIds = json_decode($request->obat_json, true);

        // json_decode bisa null kalau string bukan json
        if (!is_array($obatIds) || count($obatIds) < 1) {
            return back()
                ->withErrors(['obat_json' => 'Obat harus dipilih minimal 1.'])
                ->withInput();
        }

        try {
            DB::transaction(function () use ($request, $obatIds) {

                // ✅ hitung qty per obat (kalau suatu saat bisa pilih obat yang sama berkali-kali)
                $counts = array_count_values($obatIds); // id_obat => qty

                // ✅ cek stok dulu (lockForUpdate biar aman)
                foreach ($counts as $idObat => $qty) {
                    $obat = Obat::where('id', $idObat)
                        ->lockForUpdate()
                        ->first();

                    if (!$obat) {
                        throw ValidationException::withMessages([
                            'obat_json' => 'Obat tidak ditemukan.'
                        ]);
                    }

                    if ((int) $obat->stok < (int) $qty) {
                        throw ValidationException::withMessages([
                            'obat_json' => "Stok obat {$obat->nama_obat} tidak cukup. Sisa: {$obat->stok}"
                        ]);
                    }
                }

                // ✅ simpan periksa
                $periksa = Periksa::create([
                    'id_daftar_poli' => $request->id_daftar_poli,
                    'tgl_periksa' => now(),
                    'catatan' => $request->catatan,
                    'biaya_periksa' => (int) $request->biaya_periksa + 150000,
                ]);

                // ✅ simpan detail per qty + kurangi stok
                foreach ($counts as $idObat => $qty) {

                    // kurangi stok sesuai qty
                    Obat::where('id', $idObat)->decrement('stok', (int) $qty);

                    // simpan detail sesuai qty
                    for ($i = 0; $i < (int) $qty; $i++) {
                        DetailPeriksa::create([
                            'id_periksa' => $periksa->id,
                            'id_obat' => $idObat,
                        ]);
                    }
                }
            });

            return redirect()->route('periksa-pasien.index')
                ->with('success', 'Data periksa berhasil disimpan.');
        } catch (ValidationException $e) {
            // ✅ error stok/validasi balik ke form
            return back()->withErrors($e->errors())->withInput();
        } catch (Throwable $e) {
            // ✅ error lain
            return back()
                ->withErrors(['obat_json' => $e->getMessage()])
                ->withInput();
        }
    }
}
