<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    // Tabel yang digunakan oleh model ini
    protected $table = 'pembayarans';

    // Primary key dari tabel ini
    protected $primaryKey = 'id';

    // Tipe primary key
    public $incrementing = true; // Default auto-incrementing ID

    // Tanggal pembuatan dan pembaruan model
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'customer_id',
        'bulan',
        'tahun',
        'amount',
    ];

    // Relasi ke model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id_customers');
    }
}
