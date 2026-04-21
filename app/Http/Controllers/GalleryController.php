<?php

namespace App\Http\Controllers;

use App\Models\GalleryPhoto;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = GalleryPhoto::orderBy('sort_order')->get();
        return view('gallery', compact('photos'));
    }
}   