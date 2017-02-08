<?php

use App\Helpers\Dic;
use Illuminate\Http\Request;
use Tests\TestCase;

/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 5/02/2017
 * Time: 3:59 PM
 */
class DicTest extends TestCase
{
    protected $dic;

    public function setUp()
    {
        parent::setUp();
        $request = Request::create('http://driving-instructors-catalog.com.au/url/to/path');
        $this->dic = new Dic($request);
    }

    public function testItCanGetUrl(){

        $this->assertEquals(['url','to','path'], $this->dic->getUrlPath());
    }

    public function testItCanMakeUrl(){
        $this->assertEquals('url-section', $this->dic->makeUrl('url Section'));
    }

    public function testItCanMakeUnUrl(){
        $this->assertEquals('Url Section', $this->dic->makeUnUrl('url-section'));
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);

        $this->app->instance($class, $mock);

        return $mock;
    }
}