<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Str;

use App\Models\UnitTest;

class BrowserUxTest extends DuskTestCase
{
    /**
     * Test of clicking add to cart on a product page adds the product to the cart
     *
     * @test
     * @return void
     */
    public function home_page_to_product_page_add_to_cart_test()
    {
        $this->browse(function (Browser $browser) {
            $test_for = 'Product page add to cart button';

            $browser->maximize();
            $browser->visit('https://squatwolf.pagelyapps.com/')
                    ->click('#menu-item-9083')
                    ->click('.image-fade_in_back')
                    ->click('.single_add_to_cart_button');
            

            $element = $browser->resolver->find('.remove_from_cart_button');

            if (!empty($element) && $element->getText()) {
                $test_status = 'Passed';
                $test_description = 'Add to Cart Working: Add to cart button on product page is working fine.';
                $status = true;
            } else {
                $test_status = 'Failed';
                $test_description = 'Add to Cart Not Working: Add to cart button on product page is not working.';
                $status = false;
            }

            UnitTest::create([
                'test_for' => $test_for,
                'test_status' => $test_status,
                'test_description' => $test_description,
            ]);
            $this->assertTrue($status);
        });
    }
}
