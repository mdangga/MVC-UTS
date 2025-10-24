<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    protected $table = 'pemasok';
    protected $primaryKey = 'id_pemasok';

    protected $fillable =
    [
        'nama_pemasok',
        'kontak',
        'alamat',
    ];

    public function barangs(){
        return $this->hasMany(Barang::class, 'id_pemasok');
    }
}
