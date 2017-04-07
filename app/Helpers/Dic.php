<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/02/2017
 * Time: 7:37 PM
 */

namespace App\Helpers;

use App\Review;
use Illuminate\Http\Request;

class Dic
{
    protected $request;

    /**
     * Dic constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * returns each section of current url in an array
     *
     * @return array
     */
    public function getUrlPath(){
        return explode("/", $this->request->path());
    }

    /**
     * makes a string ready for section of url
     *
     * @param $path
     * @return string
     */
    public function makeUrl($path){
        return strtolower(str_replace(' ', '-', $path));
    }

    /**
     * makes section of url capitalized space separated
     *
     * @param $path
     * @return string
     */
    public function makeUnUrl($path){
        return ucwords(str_replace('-', ' ', $path));
    }

    function getStarsSVG($score, $addClass = "", $ratingCount = 0, $panelLink = "", $schema = false) {
        $return=""; //return string full of html code

        $width = (floatval($score)/5)*100; // calculate percentage

        $return.='<div class="ratingWrapper '.$addClass.'"';
        if ($schema==true) {
            $return.=' itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">';
        } else {
            $return.='>';
        }
        $return.='<div class="rating">';
        $return.='<div class="rating star-fill" style="width: '.$width.'%;" title="'.$score.' out of 5"></div>';
        $return.='</div>';

        if ($panelLink) {
            if ($ratingCount >0) {
                if ($schema==true) {
                    $return.= '<div class="rating-text"><strong itemprop="ratingValue">'.$score.'</strong> based on <a href="'.$panelLink.'"><span itemprop="reviewCount">'.$ratingCount.'</span> reviews</a></div>';
                } else {
                    $return.= '<div class="rating-text"><strong>'.$score.'</strong> based on <a href="'.$panelLink.'">'.$ratingCount.' reviews</a></div>';
                }
            } else {
                $return.= '<div class="rating-text">No reviews</div>';
            }
        }
        $return.='</div>';

        return $return;
    }

    public static function getReviewStat($id){
        $review = Review::where(['school_id' => $id, 'approved' => 1])->get();
        $count = $review->count();
        $sum = $review->sum('rating');
        $average = 0;
        if($count>0){
            $average = round(($sum/$count), 1);
        }
        return ['count' => $count, 'average' => $average];
    }

}