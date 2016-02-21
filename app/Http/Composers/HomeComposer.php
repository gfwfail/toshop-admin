<?php namespace App\Http\Composers;

use App\Store;
use Illuminate\Contracts\View\View;
use App\Category;

class HomeComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cates', Category::orderBy('name')->get())


        ;
    }

}