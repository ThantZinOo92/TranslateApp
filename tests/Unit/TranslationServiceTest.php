<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Translation\TranslationServiceInterface;
use App\Services\Translation\TranslationService;

/**
 * Test Class for App\Services\Translation\TranslationService
 */
class TranslationServiceTest extends TestCase
{
    /**
     * @property TranslationServiceInterface $mockObject
     * @property TranslationService $service
     */
    private TranslationServiceInterface $mockObject;
    private TranslationService $service;
    function setUp() : void
    {
        parent::setUp();
        $this->mockObject = $this->mock(TranslationServiceInterface::class);
        app()->instance(TranslationServiceInterface::class,$this->mockObject);
        $this->service = app()->make(TranslationService::class);       
    }

    /**
     * unit test for translate() method
     */
    public function test_translate(): void
    {
        $text = "Hello";
        $target = "my";
        $shouldReturn = "မင်္ဂလာပါ";

        $this->mockObject->shouldReceive('translate')
                         ->with($text,$target)
                         ->once()
                         ->andReturn($shouldReturn);

        $translate = $this->service->translate($text,$target);
        $this->assertIsString($translate);
        $this->assertSame($shouldReturn,$translate);

    }

     /**
     * unit test for getDataKey() method
     */
    public function test_get_data_key() : void 
    {
        $dataKey = $this->service->getDataKey();
        $shouldReturn = "translation";
        $this->assertIsString($dataKey);
        $this->assertSame($shouldReturn,$this->service->getDataKey());
    }
}
