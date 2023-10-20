<?php

namespace App\Http\Controllers\admin;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Artikel::all();
        return view('admin.artikel.view', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.artikel.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['picture'] =  $request->file('picture')->store('artikels');

        Artikel::create($data);
        return redirect()->route('artikel.index')->with(['success' => 'data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::find($id);
        $category = Category::all();

        return view('admin.artikel.edit', compact('artikel', 'category')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('picture'))) {
            $artikel = Artikel::find($id);
            $artikel->update([
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'author'      => $request->author,
                'slug'        => Str::slug($request->title),
                'date'        => $request->date,
                'body'        => $request->body,
            ]);
            return redirect()->route('artikel.index')->with(['success' => 'data berhasil dirubah']);
        }else{

            $artikel = Artikel::find($id);
            Storage::delete($artikel->picture);
            $artikel->update([
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'author'      => $request->author,
                'slug'        => Str::slug($request->title),
                'date'        => $request->date,
                'body'        => $request->body,
                'picture'     =>  $request->file('picture')->store('artikels'),

            ]);
            return redirect()->route('artikel.index')->with(['success' => 'data berhasil dirubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::find($id);
        Storage::delete($artikel->picture);
        $artikel->delete();
        return redirect()->route('artikel.index')->with(['success' => 'data berhasil terhapus']);
    }
}
