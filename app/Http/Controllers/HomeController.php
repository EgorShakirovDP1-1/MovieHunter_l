<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HomeController extends Controller
{
    
    public function showHome()
{
       
        $imageUrls = [
            Storage::url('images/movie1.jpg'),
            Storage::url('images/movie2.jpg'),
            Storage::url('images/play-button.png'),
            Storage::url('images/coming-soon1.jpg'),
            // Add more image URLs as needed
        ];

        return Inertia::render('Home', [
            'images' => $imageUrls,
        ]);
    }
}
