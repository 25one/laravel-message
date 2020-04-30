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
        $view->with('carts', Cart::select('id')->get());
    }
}
