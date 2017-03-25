<?php

/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/02/2017
 * Time: 7:16 PM
 */

namespace App\Http\ViewComposers;

use App\Category;
use App\State;
use Illuminate\View\View;

class StateLinksComposer
{
    /**
     * @var $category Category
     */
    protected $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('states', $this->state->all());
    }

}