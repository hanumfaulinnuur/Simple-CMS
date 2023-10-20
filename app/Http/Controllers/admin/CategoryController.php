<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::all();
        return view('admin.category.view', compact('category'));
    }

    
    public function create()
    {
        return view('admin.category.add');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_type' => 'required|min:5'
        ]);

        $category = Category::create([
            'category_type' => $request->category_type,
            'slug'          =>Str::slug( $request->category_type)
        ]);

        return redirect()->route('category.index')->with(['success' => 'data berhasil ditambahkan']);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category')) ;
    }

    
    public function update(Request $request, string $id)
    {
        $category = $request->all();
        $category['slug'] = Str::slug($request->category_type);

        $data = Category::findOrFail($id);
        $data->update($category);

        return redirect()->route('category.index')->with(['success' => 'data berhasil terupdate']);
    }

    
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();
        return redirect()->route('category.index')->with(['success' => 'data berhasil terhapus']);

    }
}
