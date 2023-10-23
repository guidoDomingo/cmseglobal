<?php

namespace App\Exceptions;

use ErrorException;
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ErrorException) {
            // Aquí puedes redirigir o mostrar un mensaje de error amigable.
            // Puedes usar return view('errors.custom_error') para mostrar una vista personalizada.
            $error = $exception;
            return response()->view('errors_app', ['error_message' => $error ], 500);


            //return redirect()->back()->with('error', 'Ocurrió un error.');
        }

        // Resto de tu manejo de excepciones...

        return parent::render($request, $exception);
    }


}