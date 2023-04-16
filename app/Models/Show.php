<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $table = "show" ;

    protected $fillable = [
        	"cat",	"producteur",	"name",	"quality",	"description",	"img_url",	"banner_url"
    ];
}
