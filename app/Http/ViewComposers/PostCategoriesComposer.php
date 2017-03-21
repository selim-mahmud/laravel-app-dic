<?php

/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/02/2017
 * Time: 7:16 PM
 */

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class PostCategoriesComposer
{
    /**
     * @var $category Category
     */
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->category->all());
    }

}