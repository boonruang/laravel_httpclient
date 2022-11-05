<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */    

    // public function render($request, Exception $exception)
    // {
    //     if ($exception instanceof ClientException) {
    //         return $this->handleClientException($exception, $request);
    //     }

    //     return parent::render($request, $exception);
    // }   


    /**
     * Handle correctly the exceptions when sending requests
     * @return \Illuminate\Http\Response
     */

    protected function handleClientException($exception, $request)
    {
        $code = $exception->getCode();

        $response = json_decode($exception->getResponse()->getBody()->getContents());
        $errorMessage = $response->error;

        switch ($code) {
            case Response::HTTP_UNAUTHORIZED:
                $request->session()->invalidate();

                if ($request->user()) {
                    Auth::logout();

                    return redirect()
                        ->route('welcome')
                        ->withErrors(['message' => 'The authentication failed. Please login again.']);
                }

                abort(500, 'Error authenticating the request. Try again later.');

            default:
                // return redirect()->back()->withErrors(['message' => $errorMessage]);
                break;
        }
    }

}
