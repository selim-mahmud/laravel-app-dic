<?php

class ExampleTest extends TestCase
{

    /**
     * A basic functional test exampl
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Laravel');
    }

    /**
     * test for feedback button on home page
     *
     * @return void
     */
    public function testContactUsButton()
    {
        $this->visit('/')
            ->click('Contact us')
            ->see('This is contact us page')
            ->seePageIs('/contactus');
    }
}
