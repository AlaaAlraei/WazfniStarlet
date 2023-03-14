<?php

namespace App\Http\View\Composers;

use App\Country;
use Illuminate\View\View;
use App\Category;
use App\Job;
use App\Location;

class LayoutComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countries', Country::all());
    }
}
