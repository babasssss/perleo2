<?php

namespace App\Http\Controllers;

use App\Models\_Aimer;
use App\Models\Aimer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
  public function index(){

      $categories = DB::table('categorie')
        ->select('categorie.*')
        ->get();

      $options = [ ];

      foreach($categories as $categorie){
        array_push($options, ['value' => $categorie->id_categorie, 'label' => $categorie->nom_categorie]);
      }

      $articles = DB::table('etat_article')
        ->select('etat_article.*')
        ->get();

      $etatArticles=[ ];

      foreach($articles as $article){
        array_push($etatArticles, ['value' => $article->id_etat_article, 'label' => $article->nom_etat_article]);
      }
      return view('ajouterArticle',compact('options','etatArticles'));
  }

  public function store(Request $request)
  {
      // Valider les données
      $request->validate([
          'photo' => 'required|image',
          'name' => 'required|max:255',
          'etat' => 'required',
          'category' => 'required',
          'textarea' => 'required|max:255',
      ]);

      $photoPath = $request->photo->store('img/articles', 'public');
      $photoUrl = Storage::disk('public')->url($photoPath);

      // Vous pouvez également enregistrer le chemin d'accès de l'image dans votre base de données si nécessaire
      // $article = new Article;
      // $article->photo = $photoPath;
      // $article->save();

      dd($photoUrl);
  }

}
