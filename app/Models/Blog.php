<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Blog extends Model
{
    use HasFactory;

    public function getMetaTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getOgTitleAttribute($value)
    {
        return ucfirst($value);
    }

}
