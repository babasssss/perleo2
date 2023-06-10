<?php

namespace App\Http\Controllers;

use App\Models\_Aimer;
use App\Models\Aimer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AimerController extends Controller
{
    public function index(Request $request,$id_article, $id_user){
      $aimer = Aimer::create([
        'id_article' => $id_article,
        'id'=> $id_user
      ]);
      event(new Registered($aimer));
      try {
      } catch (\Throwable $th) {
        Aimer::where('id_article', $id_article)
          ->where('id', $id_user)
          ->delete();
      }
      return Redirect::to('/');
    }
    public function indexEvent(Request $request,$code,$id_user){
      try {
        $_aimer = _Aimer::create([
          'code' => $code,
          'id'=> $id_user
          ]);
        event(new Registered($_aimer));
      } catch (\Throwable $th) {
        _Aimer::where('code', $code)
          ->where('id', $id_user)
          ->delete();
      }
      return Redirect::to('/');
    }
}
