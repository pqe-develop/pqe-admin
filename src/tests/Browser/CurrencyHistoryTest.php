<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CurrencyHistoryTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin = \Pqe\Admin\Models\User::find(1);
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
            $browser->visit(route('admin.currencyhistory.index'));
            $browser->assertRouteIs('admin.currencyhistory.index');
        });
    }
}
