<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\UnitTest;

class HeaderAndBannerTest extends TestCase
{
    /**
     *  Test for Banner image loading on the homepage
     *
     * @test
     * @return void
     */
    public function is_home_page_banner_image_loading()
    {
        $test_for = 'Home Page Banner';
        $url = "https://squatwolf.pagelyapps.com/wp-content/uploads/2020/11/launch-banner2.jpg";

        if (! $this->url_exists($url)){
            $test_status = 'Failed';
            $test_description = 'Banner missing: Home page banner loading failed.';
           	$status = false;
        } else {
            $test_status = 'Passed';
            $test_description = 'Banner loaded: Home page banner loading success.';
            $status = true;
        }

        UnitTest::create([
            'test_for' => $test_for,
            'test_status' => $test_status,
            'test_description' => $test_description,
        ]);
        $this->assertTrue($status, $test_description);
    }

    /**
     * Check if url exists
     * @param string $url 
     * @return bool
     */
    public function url_exists($url) {
		$headers = get_headers($url);
		return stripos($headers[0],"200 OK")?true:false;
	}


    /**
     * Check header feature test.
     *
     * @test
     * @return void
     */
    public function header_is_present()
    {
        $response = $this->get('https://squatwolf.pagelyapps.com');

        $header_name = 'X-Gateway-Cache-Key';
        $test_for = "Header {$header_name} Test";

        if ($response->headers->has($header_name)) {
	        $test_status = 'Passed';
	        $test_description = "Header Exists: Site contains header {$header_name}.";
	        $status = true;
        } else {
        	$test_status = 'Failed';
	        $test_description = "Header Not Found: Header [{$header_name}] not present on response.";
	        $status = false;
        }

        UnitTest::create([
            'test_for' => $test_for,
            'test_status' => $test_status,
            'test_description' => $test_description,
        ]);

        $this->assertTrue($status, $test_description);
    }
}
