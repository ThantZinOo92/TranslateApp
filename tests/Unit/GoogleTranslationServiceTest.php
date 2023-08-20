<?php

namespace Tests\Unit;

use Tests\TestCase;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Services\Translation\GoogleTranslationService;

/**
 * Test Class for App\Services\Translation\GoogleTranslationService
 */
class GoogleTranslationServiceTest extends TestCase
{
     /**
     * @property GoogleTranslate $mockObject
     * @property GoogleTranslationService $service
     */
    private GoogleTranslate $mockObject;
    private GoogleTranslationService $service;

    function setUp() : void
    {
        parent::setUp();
        $this->mockObject = $this->mock(GoogleTranslate::class);
        app()->instance(GoogleTranslate::class,$this->mockObject);
        $this->service = app()->make(GoogleTranslationService::class);       
    }
    /**
     * unit test for translate() method
     */
    public function test_translate(): void
    {
        $text = "Hello";
        $source = "en";
        $target = "my";
        $shouldReturn = "မင်္ဂလာပါ";

        $this->mockObject->shouldReceive('setSource')
                         ->with($source)
                         ->once()
                         ->andReturnSelf()
                         ->shouldReceive("setTarget")
                         ->with($target)
                         ->once()
                         ->andReturnSelf()
                         ->shouldReceive('translate')
                         ->with($text)
                         ->once()
                         ->andReturn($shouldReturn);

        $translate = $this->service->translate($text,$target);
        $this->assertIsString($translate);
        $this->assertSame($shouldReturn,$translate);
    }
}
