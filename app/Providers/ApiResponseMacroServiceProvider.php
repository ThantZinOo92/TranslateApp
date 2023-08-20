<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Http\Response;

class ApiResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

     /**
     * Bootstrap services.
     */
    public function boot() :void
    {
        /**
         * success response macro for api  
         * @param string $dataKey
         * @param mixed $dataValue
         * @param int $status
         */
        FacadeResponse::macro('success', function (string $dataKey,$dataValue,int $status = Response::HTTP_OK) {
            return FacadeResponse::json([
                        'success'  => true,
                        'error' => null,
                        $dataKey => $dataValue,
                    ],$status);
        });

        /**
         * error response macro for api
         * @param string $error
         * @param int $status
         */
        FacadeResponse::macro('error', function (string $error,int $status = Response::HTTP_BAD_REQUEST) {
            return FacadeResponse::json([
                    'success' => false,
                    'error'  => $error,
                ], $status);
        });
    }
}
