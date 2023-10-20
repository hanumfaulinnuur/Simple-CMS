<?php

namespace App\Http\Controllers\front;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
        $artikel = Artikel::all();
        return view('front.home', compact('artikel'));
    }

    public function Detail($id){
    $detail = Artikel::find($id);
    return view('front.detail', compact('detail'));
  }
}
