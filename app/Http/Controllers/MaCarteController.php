<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MaCarteController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->select('users.*')
            ->where('users.id', '=', Auth::user()->id)
            ->limit(1)
            ->get();
        // dd($users);

        $data = 'https://www.netflix.com/fr/';
        $qrCode = QrCode::size(200)->generate($data);


        return view('MaCarte', compact('qrCode'),['users'=>$users]);
    }
}
