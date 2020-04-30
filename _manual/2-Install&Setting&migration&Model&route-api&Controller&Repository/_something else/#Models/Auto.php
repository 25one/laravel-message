<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model {

    public $timestamps = false;

    protected $fillable = [
         'country_id', 'name', 'image', 'active'
    ];

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
