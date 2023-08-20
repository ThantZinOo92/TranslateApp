<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Illuminate\Http\Response;

/**
 * Test Class for App\Http\Controllers\Api\TranslationController
 */
class ApiTranslationControllerTest extends TestCase
{
    /**
     * feature test for translating success.
     */
    public function test_it_get_success_response_for_translation(): void
    {
        $text = "Hello";
        $response = $this->post('/api/translation/translate',["text"=>$text]);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure(["success","error","translation"]);
        $response->assertJson(fn (AssertableJson $json) =>
                                $json->whereType('success', ["boolean"])
                                     ->where("success",true)
                                     ->whereType("error",["null"])
                                     ->where("error",null)
                                     ->whereType("translation",["string"])
                                     ->where("translation","မင်္ဂလာပါ")
                            );
    }
    /**
     * feature test for validation fail for translation.
     */
    public function test_it_get_validation_error_when_text_is_empty_for_translation(): void
    {
        $response = $this->post('/api/translation/translate');
        
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonStructure(["success","error"]);
        $response->assertJson(fn (AssertableJson $json) =>
                                $json->whereType('success', ["boolean"])
                                     ->where("success",false)
                                     ->whereType("error",["string"])
                            );
    }


}
