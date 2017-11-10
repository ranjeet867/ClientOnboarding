<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LinkTest extends DuskTestCase
{

    public function testIsDirWritable()
    {
        $this->assertDirectoryIsWritable(storage_path().'/csv');
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLinksClicks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Client Onboarding!');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Clients')
                    ->assertSee('Client Listings');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Add Client')
                ->assertSee('Client Onboarding Form');
        });
    }

}
