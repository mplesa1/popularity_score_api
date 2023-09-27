<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchResultControllerTest extends TestCase
{
    public function testSearchAction(): void
    {
        $request = [
            'word_provider_id'=>1,
            'keyword'=>'php'
        ];
        $response = $this->post('api/v1/search_results', $request);

        $response->assertStatus(200);
        $responseData = $response->decodeResponseJson()->json();
        $this->assertSame('Search result loaded', $responseData['response']['msg']);
        $this->assertNotNull($responseData['response']['payload']);
        $this->assertSame($request['keyword'], $responseData['response']['payload']['keyword']);
        $this->assertIsInt($responseData['response']['payload']['count']);
        $this->assertIsInt($responseData['response']['payload']['positive_count']);
        $this->assertIsInt($responseData['response']['payload']['negative_count']);
        $this->assertIsInt($responseData['response']['payload']['word_provider_id']);
        $this->assertNotNull($responseData['response']['payload']['score']);
    }

    public function testThatSearchActionWithoutKeywordWillReturnValidationError(): void
    {
        $request = [
            'word_provider_id'=>1,
        ];
        $response = $this->post('api/v1/search_results', $request);

        $response->assertStatus(400);
        $responseData = $response->decodeResponseJson()->json();
        $this->assertNotNull($responseData['error']);
        $this->assertSame('Validation error',$responseData['error']['display']['msg']);
        $this->assertSame('The keyword field is required.',$responseData['error']['api_errors']['keyword'][0]);
    }

    public function testThatSearchActionWithoutSearchProviderIdWillReturnValidationError(): void
    {
        $request = [
            'keyword'=>'php',
        ];
        $response = $this->post('api/v1/search_results', $request);

        $response->assertStatus(400);
        $responseData = $response->decodeResponseJson()->json();
        $this->assertNotNull($responseData['error']);
        $this->assertSame('Validation error',$responseData['error']['display']['msg']);
        $this->assertSame('The search provider id field is required.',$responseData['error']['api_errors']['word_provider_id'][0]);
    }

    public function testThatSearchActionWithInvalidSearchProviderIdWillReturnValidationError(): void
    {
        $request = [
            'keyword'=>'php',
            'word_provider_id'=>1234,
        ];
        $response = $this->post('api/v1/search_results', $request);

        $response->assertStatus(400);
        $responseData = $response->decodeResponseJson()->json();
        $this->assertNotNull($responseData['error']);
        $this->assertSame('Validation error',$responseData['error']['display']['msg']);
        $this->assertSame('The selected search provider id is invalid.',$responseData['error']['api_errors']['word_provider_id'][0]);
    }

    public function testThatSearchActionWithNotImplementedSearchProviderIdWillReturnInternalError(): void
    {
        $request = [
            'keyword'=>'php',
            'word_provider_id'=>2,
        ];
        $response = $this->post('api/v1/search_results', $request);

        $response->assertStatus(500);
        $responseData = $response->decodeResponseJson()->json();
        $this->assertNotNull($responseData['error']);
        $this->assertSame('Not implemented',$responseData['error']['display']['msg']);
    }
}
