<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavorisController extends Controller
{
    public function index(){

      $lovesArticles = DB::table('aimer')
        ->join('article','aimer.id_article','=', 'article.id_article')
        ->join('image','article.id_article','=', 'image.id_article')
        ->select('article.*','image.*','aimer.*')
        ->where('aimer.id','=', Auth::user()->id) 
        ->get();
        // dd($articles);
      $lovesEvenements = DB::table('_aimer')
        ->join('evenement','_aimer.code','=', 'evenement.code')
        ->join('image','evenement.code','=', 'image.code')
        ->select('evenement.*', 'image.*', '_aimer.*') // Sélectionnez les colonnes des trois tables
        ->where('_aimer.id', '=', Auth::user()->id)
        ->get();
        // dd($lovesEvenements , $lovesArticles);

        

      return view('Favoris',['lovesArticles'=>$lovesArticles,'lovesEvenements'=>$lovesEvenements]);
    }
}
