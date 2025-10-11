<?php

namespace App\Models; 

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama','alamat','no_ktp','no_hp','no_rm','role','id_poli','email','password'
    ];

    protected $hidden = ['password','remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // boleh ada / boleh tidak
        ];
    }

    public function poli()           { return $this->belongsTo(Poli::class, 'id_poli'); }
    public function jadwalPeriksas() { return $this->hasMany(JadwalPeriksa::class, 'id_dokter'); }
}
