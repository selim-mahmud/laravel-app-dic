<?php

/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/02/2017
 * Time: 7:16 PM
 */

namespace App\Http\ViewComposers;

use App\Helpers\Dic;
use Illuminate\View\View;

class BreadCrumbComposer
{
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

    protected function getBreadCrumb(){
        return $this->generateBreadCrumbHtml($this->dic->getUrlPath());
    }

    protected function generateBreadCrumbHtml(array $pathArray){
        $breadCrumbHtml = '';
        if(is_array($pathArray)){
            $lastKey = count($pathArray)-1;
            $eachUrl = '/'; //start from home
            $breadCrumbHtml .= '<ol class="breadcrumb">';
            $breadCrumbHtml .= '<li><a href="'.$eachUrl.'">Home</a></li>';
            foreach ($pathArray as $key=>$path){
                $eachUrl .= $path.'/';
                if($key === $lastKey){
                    $breadCrumbHtml .= '<li class="active">'.$this->dic->makeUnUrl($path).'</li>';
                }else{
                    $breadCrumbHtml .= '<li><a href="'.$eachUrl.'">'.$this->dic->makeUnUrl($path).'</a></li>';
                }
            }
            $breadCrumbHtml .= '</ol>';
        }
        return $breadCrumbHtml;
    }

}