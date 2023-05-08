<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = [
        'description',
        'titre',
        'image',
        'date_publication',
        'auteur',
        'resumer',
    ];

    public $timestamps = false;
    protected $primaryKey = "id";
    public $incrementing = false;
}

?>
