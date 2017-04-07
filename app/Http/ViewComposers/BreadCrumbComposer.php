<?php

/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/02/2017
 * Time: 7:16 PM
 */

namespace App\Http\ViewComposers;

use App\Helpers\Dic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BreadCrumbComposer
{
    /**
     * @var $dic Dic
     */
    protected $dic;

    public function __construct(Dic $dic)
    {
        $this->dic = $dic;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('breadCrumbHtml', $this->getBreadCrumb());
    }

    /**
     * gets breadcrumb elements for view
     *
     * @return string
     */
    protected function getBreadCrumb(){
        return $this->generateBreadCrumbHtml($this->dic->getUrlPath());
    }

    /**
     * generates html for breadcrumb
     *
     * @param array $pathArray
     * @return string
     */
    protected function generateBreadCrumbHtml(array $pathArray){
        $breadCrumbHtml = '';
        if (is_array($pathArray)) {
            $lastKey = count($pathArray) - 1;
            $eachUrl = '/'; //start from home
            $breadCrumbHtml .= '<div itemscope itemtype="http://schema.org/Webpage">';
            $breadCrumbHtml .= '<ol class="breadcrumb bg-none" itemscope itemtype="http://schema.org/BreadcrumbList">';
            $breadCrumbHtml .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
            $breadCrumbHtml .= '<a itemprop="item" href="' . $eachUrl . '"><span itemprop="name">Home</span></a>';
            $breadCrumbHtml .= '<meta itemprop="position" content="1" />';
            $breadCrumbHtml .= '</li>';
            foreach ($pathArray as $key => $path) {
                $eachUrl .= $path . '/';
                $anchorTagText = ucwords(str_replace('-', ' ', $path));
                $contentPosition = $key+2; //$contentPosition need to be 2 more than the value $key
                if ($key === $lastKey) {
                    $breadCrumbHtml .= '<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                        <span itemprop="item"><span itemprop="name">'.$anchorTagText.'</span></span>
                                        <meta itemprop="position" content="'.$contentPosition.'" />
                                      </li>';
                } else {
                    $breadCrumbHtml .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                        <a itemprop="item" href="'.$eachUrl.'"><span itemprop="name">'.$anchorTagText.'</span></a>
                                        <meta itemprop="position" content="'.$contentPosition.'" />
                                     </li>';
                }
            }
            $breadCrumbHtml .= '</ol>';
            $breadCrumbHtml .= '</div>';
        }
        return $breadCrumbHtml;
    }

}