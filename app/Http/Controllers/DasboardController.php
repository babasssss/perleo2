<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DasboardController extends Controller
{
    public function index(Request $request){
        $Evenements = DB::table('evenement')
            ->join('image','evenement.code','=', 'image.code')
            ->select('evenement.*','image.*')
            ->where('date', '>', date('Y-m-d')) // Filtrer les évènements à partir d'aujourd'hui
            ->orderBy('date', 'asc') // Trier les évènements par ordre croissant de date
            ->take(2) // Limiter les résultats aux deux premiers évènements
            ->get();
        
        $Articles = DB::table('evenement')
            ->join('article_events','evenement.code','=', 'article_events.code')
            ->join('article','article_events.id_article','=', 'article.id_article')
            ->join('categorie','article.id_categorie','=', 'categorie.id_categorie')
            ->join('image','article.id_article','=', 'image.id_article')
            ->select('evenement.*','article_events.*','article.*','categorie.*','image.*')
            ->where('date', '>', date('Y-m-d')) // Filtrer les évènements à partir d'aujourd'hui
            ->orderBy('date', 'asc') // Trier les évènements par ordre croissant de date
            ->get();
        
        $tabCategorie=[];
        foreach($Articles as $article){
            if (!in_array($article->nom_categorie, $tabCategorie)) {
                $tabCategorie[] = $article->nom_categorie;
            }
        }
        // dd($Evenements,$Articles,$tabCategorie);

        if (Auth::user()) {
            $Aimers = DB::table('aimer')
                ->select('aimer.*')
                ->where('aimer.id',Auth::user()->id)
                ->get();
            $_Aimers = DB::table('_aimer')
                ->select('_aimer.*')
                ->where('_aimer.id',Auth::user()->id)
                ->get();
            // dd($Aimer);
            return view('accueil',['evenements'=>$Evenements,'articles'=>$Articles, 'tabCategorie'=>$tabCategorie,'Aimers'=>$Aimers,'_Aimers'=>$_Aimers]);
        }
        else{
            return view('accueil',['evenements'=>$Evenements,'articles'=>$Articles, 'tabCategorie'=>$tabCategorie]);
        }
    }
}
