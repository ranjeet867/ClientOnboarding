<?php

namespace Tests\Feature;

use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWebLinks()
    {
        $this->get('/clients')->assertSee('Client Listings');
        $this->get('/clients/create')->assertSee('Client Onboarding Form');
        $this->get('/')->assertSee('Client Onboarding!');
    }
}
