<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model {

    public $timestamps = false;

    protected $fillable = [
         'type_id', 'name', 'title'
    ];    

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
