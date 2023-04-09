<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {

        /**
         * Form a success response.
         *
         * [
         *     code: int,
         *     response: [
         *          msg: string,
         *          payload: array
         *      ]
         * ]
         *
         * @param string $msg
         * @param object $payload
         * @param int $code
         *
         * @return \Illuminate\Http\Response
         */
        Response::macro('success', function (string $msg, $payload = null, int $code = 200) {
            $success = [
                'code' => $code,
                'response' => [
                    'msg' => $msg,
                    'payload' => $payload,
                ],
            ];

            return Response::make($success)->setStatusCode($code);
        });

        /**
         * Form a error response.
         *
         * [
         *     code: int,
         *     errors: [
         *          display: {
         *              title: string,
         *              msg: string
         *          },
         *          api_errors: array,
         *          debug: string
         *     ]
         * ]
         *
         * @param string $title
         * @param string $msg
         * @param string $code
         * @param array $debug
         *
         * @return \Illuminate\Http\Response
         */
        Response::macro('error', function (string $title, string $msg, int $code = 500, string $debug = null, array $errors = null) {
            $error = [
                'code' => $code,
                'error' => [
                    'display' => [
                        'title' => $title,
                        'msg' => $msg,
                    ],
                    'api_errors' => $errors,
                    'debug' => $debug,
                ],
            ];

            return Response::make($error)->setStatusCode($code);
        });
    }

    public function register()
    {
    }
}
