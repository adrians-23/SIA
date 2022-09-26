<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Kelas extends Model
{
    use HasFactory;
     //ini ditambahkan jika nama tabel kita tidak jamak (dalam bahasa inggris)
     protected $table = 'kelas';

     //ini jika kita menggunakan Eloquent ORM
     protected $guarded = [];

     public function Siswa(){
        return $this->hasMany(Siswa::class);
    }
}
