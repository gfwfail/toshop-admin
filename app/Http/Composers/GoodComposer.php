<?php namespace App\Http\Composers;

use App\Store;
use Illuminate\Contracts\View\View;
use App\Category;

class GoodComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', Category::all())
             ->with('stories',Store::all());
    }

}