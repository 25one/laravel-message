<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'price', 'image', 'top9'
    ];

    /**
     * Getter of showing yes(1) or no(0) for top9.
     *
     * @var array
     */    
    //public function getTop9Attribute($value)
    //{
    //    return $value?'yes':'no'; 
    //}   

    /**
     * Setter of storing 1 or 0 for top9 (from form - on or null).
     *
     * @var array
     */    
    public function setTop9Attribute($value)
    {
        return $this->attributes['top9'] = $value?1:0; //если выбран checkbox – он есть в $request – есть $value – атрибуту модели top9 присваивается 1, если не выбран – его нет в $request – нет $value – атрибуту модели top9 присваивается 0
    }   

}
