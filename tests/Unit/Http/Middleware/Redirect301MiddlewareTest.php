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
        $redirect301Mock = $this->setMock(Redirect301::class);
        $redirect301Mock->shouldReceive('search')
            ->with('page=test')
            ->andReturn(new Redirect301(['redirect_to'=>'/test', 'status_code'=>301]));

        $response = $this->get('/?page=test');

        $this->assertEquals(301, $response->getStatusCode());
    }

    public function setMock($class)
    {
        $mock = \Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }
}
