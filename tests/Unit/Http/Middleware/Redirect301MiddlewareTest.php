<?php

use App\Http\Middleware\Redirect301Middleware;
use App\Redirect301;
use Illuminate\Http\Request;
use Tests\TestCase;

class Redirect301MiddlewareTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItCanRedirect()
    {
        $requestMock = $this->setMock(Request::class);
        $redirect301Mock = $this->setMock(Redirect301::class);
        $requestMock->shouldReceive('has')
        ->with('page')
        ->andReturn(true);
        $requestMock->shouldReceive('input')
            ->with('page')
            ->andReturn('test');
        $requestMock->shouldReceive('getQueryString')
            ->andReturn('page=test');
        $redirect301Mock->shouldReceive('search')
            ->with('page=test')
            ->andReturn(new Redirect301());
        $redirect301Mock->shouldReceive('first')
            ->andReturn(new Redirect301(['redirect_to'=>'tethtrst', 'status_code'=>301]));

        $response = $this->get('/?page=test');

        $response->assertStatus(301);
        $response->assertRedirect('/test');
    }

    public function setMock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }
}
