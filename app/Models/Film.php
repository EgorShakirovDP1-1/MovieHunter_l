<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'filmName',
        'filmDescription',
        'filmImage1',
        'filmImage2',
        'filmImage3',
        'filmImage4',
        'filmImage5',
        'filmImage6',
        'filmImage7',
        'filmImage8',
    ];
    public function getImageURLs()
    {
        $maxImages = 8;
        $images = [];

        for ($i = 1; $i <= $maxImages; $i++) {
            $filmImage = 'filmImage' . $i;
            $image = $this->$filmImage;
            if ($image) {
                $images[] = url('storage/' . $image);
            }
        }

        return $images;
    }

    public function getFirstImageURL()
    {
        $filmImage = $this->filmImage1;
        if ($filmImage) {
            return url('storage/'.$filmImage);
        }

        return null;
    }
}