<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    protected $fillable = [
        'titre',
        'img',
        'resumer',
    ];

    public $timestamps = false;
    protected $primaryKey = "idinformation";
    public $incrementing = false;
}

?>