<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apimessage extends Model {

    public $timestamps = false;

    protected $fillable = [
         'title', 'message', 'datevisit'
    ];    

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    /*
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    */
}
