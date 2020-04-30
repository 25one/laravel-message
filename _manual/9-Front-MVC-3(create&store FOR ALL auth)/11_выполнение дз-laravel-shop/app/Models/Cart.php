<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    public $timestamps = false;

    protected $fillable = [
         'user_id', 'name', 'price', 'image'
    ]; 

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user() //!!!
    {
        return $this->belongsTo(User::class);
    }        

}
