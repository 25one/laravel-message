<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apimessage extends Model {

    public $timestamps = false;

    protected $fillable = [
         'title', 'message', 'datevisit'
    ];

}
