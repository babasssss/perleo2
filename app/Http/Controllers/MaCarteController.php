<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MaCarteController extends Controller
{
    public function index()
    {
        $data = 'https://www.netflix.com/fr/';
        $qrCode = QrCode::size(200)->generate($data);


        return view('MaCarte', compact('qrCode'));
    }
}
