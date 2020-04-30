<?php

namespace App\Repositories;

use App\Models\ {
    Apimessage

};

class AdminRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Create a new AdminRepository instance.
     *
     * @param  \App\Models\Apimessage $apimessage
     */
    public function __construct(Apimessage $apimessage)
    {
        $this->model = $apimessage;
    }

    /**
     * Store post of apiuser.
     *
     * @param  \App\Http\Requests\ApimessageRequest $request
     * @return void
     */
    public function storeapimessage($request)
    {
        return $apimessage = Apimessage::create($request->all()); //in mobi-message must be later {"title":"aaa","message":"bbb","datevisit":"2019-12-12","id":1}
    }      

}

