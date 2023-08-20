<?php

namespace App\Services\Translation;
use Stichoza\GoogleTranslate\GoogleTranslate;


class GoogleTranslationService implements TranslationServiceInterface
{

    /**
     * @property GoogleTranslate $translate
     * @property string $source
     *
    */
    private GoogleTranslate $translate;
    private $source = "en";

    /**
     * @param GoogleTranslate $translate
    */
    
    public function __construct(GoogleTranslate $translate)
    {
        $this->translate = $translate;
    }

    /**
     * translate $text from "en" language to $target language
     * @param string $text
     * @param string $target
     * @return string 
     */
    public function translate(string $text,string $target) : string
    {
        return  $this->translate->setSource($this->source)->setTarget($target)->translate($text);
    }
    
}