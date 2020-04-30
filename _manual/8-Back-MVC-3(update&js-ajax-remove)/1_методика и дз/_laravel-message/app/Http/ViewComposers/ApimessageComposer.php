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
        $view->with('apimessages', Apimessage::select('id')->get());
    }
}
