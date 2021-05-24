<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'About us',
        ];
        return view('pages/about', $data);
    }
}
