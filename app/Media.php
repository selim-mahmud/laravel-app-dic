<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';

    protected $fillable = ['owner_type', 'media_type', 'image_type', 'owner_id', 'url'];

    public static function getAvatar($medias){
    	$avatar = $medias->where(['media_type' => 'image', 'image_type' => 'avatar'])->first();
    	if($avatar){
    		return $avatar->url;
    	}else{
    		return config('global.default_avatar_link');
    	}
    }
}
