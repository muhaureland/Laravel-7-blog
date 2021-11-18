<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categorys|max:255|min:3'
        ]);

        Category::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name)
        ]);
        return redirect('category')->with('status', 'tambah data berhasil disimpan!');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        // $category = Category::findorfail($category);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categorys|max:255|min:3'
        ]);
        // // cara update jika menggunakan -crm krn dan jika menggunakan slug, slugnya ndk update
        // $category->update($request->all());

        // cara update jika menggunakan --resource dan memakai slug di -crm
        Category::where('id', $category->id)->update([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name)
        ]);
        //redirect jika menggunakan mode -crm "krn sudah otomatis"
        return redirect('category')->with('status', 'Merubah data berhasil disimpan!');

        //redirect jika menggukan --resource "lebih spesifik"
        //return redirect()route('category.index')->with('status', 'Merubah data berhasil disimpan!');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('category')->with('status', 'menghapus data berhasil!');

        // //cara delete jika menggunakan controller biasa atau --resource
        // $category = Category::findorfail($id);
        // $category->delete();
    }
}
