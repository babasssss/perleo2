<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EvenementController extends Controller
{
    public function index(Request $request, $nom){
        $Evenements = DB::table('evenement')
            ->join('image','evenement.code','=', 'image.code')
            ->select('evenement.*','image.*')
            ->where('slug', '=', $nom) 
            ->take(1) 
            ->get();
        dd($Evenements);
    }
}
