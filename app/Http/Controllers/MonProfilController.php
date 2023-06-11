<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Effectuer;
use App\Models\Evenement;
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
      $evenements = DB::table('effectuer')
        ->join('evenement', 'effectuer.code', '=', 'evenement.code')
        ->join('image', 'effectuer.code', '=', 'image.code') // Ajout de la clause de jointure avec la table "image"
        ->select('evenement.*', 'effectuer.*', 'image.*') // Sélectionnez les colonnes des trois tables
        ->where('effectuer.id', '=', Auth::user()->id)
        ->get();
        // dd($evenements);
      $users = DB::table('users')
        ->select('users.*')
        ->where('users.id', '=', Auth::user()->id)
        ->limit(1)
        ->get();
        // dd($users);

      return view('MonProfil',['articles'=>$articles,'evenements'=>$evenements,'users'=>$users]);
    }

    public function delete($id)
    {
        $deletedRows = Article::where('id_article', $id)
            ->where('id', Auth::user()->id)
            ->delete();

        if ($deletedRows === 0) {
            // La suppression n'a pas eu lieu, retourner une erreur
            return redirect()->back()->withErrors('Erreur lors de la suppression de l\'article.');
        }

        return redirect()->route('mon-compte')->with('success', 'L\'article a été supprimé avec succès.');
    }


    public function deleteEvenement($id)
    {
      $deletedRows = Effectuer::where('code', $id)
          ->where('id', Auth::user()->id)
          ->delete();

      if ($deletedRows === 0) {
          // La suppression n'a pas eu lieu, retourner une erreur
          return redirect()->back()->withErrors('Erreur lors de la suppression de l\'évènements.');
      }

      return redirect()->route('mon-compte')->with('success', 'Vous n\'êtes plus associés à cet évènement.');
  }


}
