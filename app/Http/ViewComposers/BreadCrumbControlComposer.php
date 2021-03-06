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

class BreadCrumbControlComposer
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
        if(is_array($pathArray)){
            $lastKey = count($pathArray)-1;
            $eachUrl = '/'; //start from home
            $breadCrumbHtml .= '<ol class="breadcrumb">';
            $breadCrumbHtml .= '<li class="breadcrumb-icon"><a href="'.$eachUrl.'"><span class="fa fa-home"></span></a></li>';
            $breadCrumbHtml .= '<li class="breadcrumb-link"><a href="'.$eachUrl.'">Home</a></li>';
            foreach ($pathArray as $key=>$path){
                $eachUrl .= $path.'/';
                if($key === $lastKey){
                    $breadCrumbHtml .= '<li class="breadcrumb-current-item">'.$this->dic->makeUnUrl($path).'</li>';
                }else{
                    $breadCrumbHtml .= '<li class="breadcrumb-link"><a href="'.$eachUrl.'">'.$this->dic->makeUnUrl($path).'</a></li>';
                }
            }
            $breadCrumbHtml .= '</ol>';
        }
        return $breadCrumbHtml;
    }

}