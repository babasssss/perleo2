<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonProfilController extends Controller
{
    public function index(){

      $articles = DB::table('article')
            ->join('image','article.id_article','=', 'image.id_article')
            ->select('article.*','image.*')
            ->where('article.id','=', Auth::user()->id) 
            ->get();
        // dd($articles);

      return view('MonProfil',['articles'=>$articles]);
    }
}
