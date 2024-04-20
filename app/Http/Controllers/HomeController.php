<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Film;

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
//     public function storeImagesToDatabase()
// {
//     $imagePaths = Storage::files('public/images');

//     foreach ($imagePaths as $path) {
//         Film::create([
//             'pathtoimage' => $path,
//             // Добавьте другие поля, если они нужны
//         ]);
//     }
// }
}
// class Film extends Model
// {
//     protected $fillable = ['pathtoimage', /* other fields */];
// }