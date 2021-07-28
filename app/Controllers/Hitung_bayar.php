<?php

namespace App\Controllers;

class Hitung_bayar extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Perhitungan Total Bayar',
        ];

        return view('hitung_bayar/index', $data);
    }
}
