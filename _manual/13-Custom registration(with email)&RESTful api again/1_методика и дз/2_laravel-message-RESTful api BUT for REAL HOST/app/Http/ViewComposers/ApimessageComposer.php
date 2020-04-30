<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Apimessage;

class ApimessageComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(auth()->user()->role != 'admin') $view->with('apimessages', Apimessage::select('id')->where('user_id', auth()->user()->id)->get());
        else $view->with('apimessages', Apimessage::select('id')->get());
    }
}
