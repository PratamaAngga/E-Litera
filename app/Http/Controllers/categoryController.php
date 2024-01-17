<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use App\Models\category;

class categoryController extends Controller
{
    public function categoryPage()
    {
        return view('admin/manage-book/category');
    }

    public function newCategory(Request $request)
    {
        $validation = $request->validate([
            'name_category' => 'required|string|max:24'
        ]);

        $newCategory = category::create($validation);


        return redirect('admin/manage-book/category')->with('success', 'data has been saved!!');
    }

    public function displaycategory()
    {
        $categories = category::all();
        return view('admin/manage-book/category', compact('categories'));
    }

    public function delCategory(category $category)
    {
        $category->delete();
        return redirect('admin/manage-book/category')->with('success', 'Category has been deleted!');
    }
}
