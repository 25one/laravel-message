<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Cart,
    Substribe
};

class ShopRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model_product;
    protected $model_cart;

    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     */
    public function __construct(Product $product, Cart $cart)
    {
        $this->model_product = $product;
        $this->model_cart = $cart;        
    }

    /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request, $parameters)
    {
        $query = $this->model_product
            ->select('id', 'name', 'price', 'image')
            //->orderBy('price', 'asc');
            ->orderBy($parameters['order'], $parameters['direction']);

        if(isset($request->search)) $query->where('name', 'like', '%' . $request->search . '%');

        return $query->get();
    }

    /**
     * Store thing.
     *
     * @param  \App\Http\Requests\Request $request
     * @return void
     */
    public function store($request)
    {
        //Cart::create($request->all());
        //$this->model_cart->user_id = 1;
        $this->model_cart->user_id = auth()->user()->id; //!!!auth()->user()->id
        $this->model_cart->name = $request->name;
        $this->model_cart->price = $request->price;
        $this->model_cart->image = $request->image;
        $this->model_cart->save();                        
    }        

    /**
     * Create a query for Cart.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function fromCart()
    {
        $query = $this->model_cart
            ->select('id', 'user_id', 'name', 'price', 'image')
            ->where('user_id', auth()->user()->id); //!!!auth()->user()->id

        return $query->get();
    }

    /**
     * Mailer of sending message.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function mailer($request)
    {
        Substribe::create($request->all());

        $title = 'Message of your registration - ' . date('d-m-Y H:i:s');
        $message = 'You has been successfully registred!';
        $client = new \GuzzleHttp\Client([
           'headers' => [
               //'Authorization' => '9267585bb333341dc049321d4e74398f',
               //'Content-Type' => 'application/json',
            ]
        ]);
        $response = $client->request('GET', 'http://api.25one.com.ua/api_mail.php?email_to=' . $request->email . '&title=' . $title . '&message=' . $message,
         [
            //...
         ]);    
        //return json_decode($response->getBody()->getContents());  
        return response()->json([
                'answer' => $response->getBody()->getContents(),
            ]);
    }                      

}
