<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Translation\TranslateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Services\Translation\TranslationService;

class TranslationController extends Controller
{
   /**
     * @property TranslationService $service
     *
     */
    private TranslationService $service;

    /**
     * @param TranslationService $service
     */
    public function __construct(TranslationService $service)
    {
        $this->service = $service;
    }

    /**
     * translate $request->text to $request->target language
     * will translate to "my" language, if $request->target is not set
     * @param TranslateRequest $request
     * @return JsonResponse
     */
    public function index(TranslateRequest $request) : JsonResponse
    {
        try {
            $dataKey = $this->service->getDataKey();// get name for response  
            $dataValue = $this->service->translate($request->text,$request->target);// get value for response 
            return response()->success($dataKey,$dataValue);
        } catch (\Exception $e) {
            return response()->error($e->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }
}
