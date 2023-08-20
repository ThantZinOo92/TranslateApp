<?php

namespace App\Services\Translation;

interface TranslationServiceInterface
{
    function translate(string $text, string $target) : string;
}