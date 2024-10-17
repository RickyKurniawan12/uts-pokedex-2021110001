<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class pokemon extends Model
{
    use HasFactory;

    
    protected $fillable = [
        "name",
        'species',
        'primary_type',
        'weight',
        'height',
        'hp',
        'attack',
        'defense',
        'is_legendary',
        'photo',
    ];

    protected $append = [
        'pokemon_image_url',
    ];

    public function getpokemon_imageUrlAttribute()
    {
        if(filter_var($this->photo_image, FILTER_VALIDATE_URL)){
            return $this->photo_image;
        }
            return $this->photo_image ? Storage::url($this->photo_image) : null;
        
    }
}