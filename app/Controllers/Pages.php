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
    public function comingSoon()
    {
        $data = [
            'title' => 'Coming Soon!',
        ];
        return view('pages/coming-soon', $data);
    }
}
