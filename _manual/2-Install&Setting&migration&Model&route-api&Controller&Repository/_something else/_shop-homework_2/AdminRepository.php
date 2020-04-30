<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Apimessage
};

class AdminRepository
{

    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model_product;
    protected $model_apimessage;

    /**
     * Create a new AdminRepository instance.
     *
     * @param  \App\Models\Product $product
     * @param  \App\Models\Apimessage $apimessage     
     */
    public function __construct(Product $product, Apimessage $apimessage)
    {
        $this->model_product = $product;
        $this->model_apimessage = $apimessage;        
    }

    /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request, $parameters)
    {
        $query = $this->model_product
            ->select('id', 'name', 'price', 'image', 'top9')
            ->orderBy($parameters['order'], $parameters['direction']);

        return $query->get();
    }  

    /**
     * Store a newly created product in storage.
     *
     * @param  \App\Http\Requests\ProductRequest $request
     * @return \Illuminate\Http\Response
     */      
    public function store($request)
    {
       Product::create($request->all());
    }

    /**
     * Update product.
     *
     * @param  \App\Models\Product $product
     * @return void
     */            
    public function update($request, $product)
    {
       $product->update($request->all());
    }

    /**
     * Store a newly created apimessage in storage.
     *
     * @param  \App\Http\Requests\ApiRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeapi($request)
    {
       $this->model_apimessage->title = $request->title;
       $this->model_apimessage->message = $request->message;  
       $this->model_apimessage->datevisit = $request->datevisit;  
       return $this->model_apimessage->save();            
    }     

}
