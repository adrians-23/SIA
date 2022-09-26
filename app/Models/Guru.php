<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;

class Guru extends Model
{
    use HasFactory;
    //ini ditambahkan jika nama tabel kita tidak jamak (dalam bahasa inggris)
    protected $table = 'guru';

    //ini jika kita menggunakan Eloquent ORM
    protected $guarded = [];

    public function Mapel(){
        return $this->belongsTo(Mapel::class);
    }
}
