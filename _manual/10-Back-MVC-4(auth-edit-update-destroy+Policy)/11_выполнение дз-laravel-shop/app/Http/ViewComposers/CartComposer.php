<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Cart;

class CartComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(auth()->user()) $view->with('carts', Cart::select('id')->where('user_id', auth()->user()->id)->get());
        else $view->with('carts', 0);
    }
}
