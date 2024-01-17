<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use App\Models\category;

class bookController extends Controller
{
    public function openNewBook()
    {
        $categories = category::all();
        return view('admin/manage-book/book', compact('categories'));
    }

    public function newBook(Request $request)
    {
        $validation = $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|string|max:255',
            'jumlah_buku' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $photoPath = $request->file('gambar')->store('books_photos', 'public');
        } else {
            $photoPath = null;
        }
        // dd($validation);
        $newBook = new book([
            'gambar' => $photoPath,
            'judul' => $validation['judul'],
            'kode_buku' => $validation['kode_buku'],
            'penulis' => $validation['penulis'],
            'penerbit' => $validation['penerbit'],
            'tahun_terbit' => $validation['tahun_terbit'],
            'jumlah_buku' => $validation['jumlah_buku'],
            'deskripsi' => $validation['deskripsi'],
        ]);
        
        $newBook->save();


        $selectedCategories = $request->input('categories', []);
        // Pastikan id_buku tidak null sebelum menyimpan relasi
        if (!empty($newBook->id_buku) && !empty($selectedCategories)) {
            // Konversi nilai 'categories' ke dalam bentuk array asosiatif
            $categories = array_fill_keys($selectedCategories, []);
    
            $newBook->makeCategories()->sync($categories);
        }
        return redirect('/home')->with('success', 'Buku baru berhasil ditambahkan');
    }
}
