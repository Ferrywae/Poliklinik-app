class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga'
    ];

    public function detailPeriksas(){
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }
}
