<?php

namespace App\Services\Translation;

class TranslationService
{

     /**
     * @property TranslationServiceInterface $service
     * @property string $dataKey
     * @property string $defaultTarget 
     *
     */
    private TranslationServiceInterface $service;
    private $dataKey = "translation";
    private $defaultTarget = "my";

    /**
     * @param TranslationServiceInterface $service
     */
    public function __construct(TranslationServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * translate $text to $target language
     * translate to "my" language, if $target is empty or null
     * @param string $text
     * @param string $target
     * @return string
     */
    public function translate(string $text,?string $target) : string
    {
       $target = $target ? : $this->defaultTarget;
       return $this->service->translate($text,$target);
    }

    /**
     * get name for response
     * @return string 
     */
    public function getDataKey() : string
    {
        return $this->dataKey;
    }
}