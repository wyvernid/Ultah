<?php

namespace App\Http\Controllers;

use App\Models\DownloadFile;

class HomeController extends Controller
{
    public function index()
    {
        $downloadFiles = DownloadFile::orderBy('sort_order')->get();
        return view('home', compact('downloadFiles'));
    }
}