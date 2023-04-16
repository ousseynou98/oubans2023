<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

    use HasFactory;

    protected $table = "episode";

    protected $fillable =[
        "serie", "season",	"title", "filename", "img_ep",	"duration"
    ];
}
