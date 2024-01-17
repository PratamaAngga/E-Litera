<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Category;

class book extends Model
{
    use HasFactory;
    public function makeCategories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'kode_buku',
        'tahun_terbit',
        'jumlah_buku',
        'deskripsi',
        'gambar',
    ];
}
