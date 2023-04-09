<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchProviderControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testIndexAction(): void
    {
        $response = $this->get('api/v1/search_providers');

        $response->assertStatus(200);
        $responseData = $response->decodeResponseJson()->json();
        $this->assertSame('Search providers loaded', $responseData['response']['msg']);
        $this->assertCount(2, $responseData['response']['payload']);
        $this->assertSame('github', $responseData['response']['payload'][0]['name']);
        $this->assertSame('twitter', $responseData['response']['payload'][1]['name']);
    }
}
