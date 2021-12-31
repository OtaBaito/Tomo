<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Inertia\Inertia;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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

        });
    }

	/**
 	 * Prepare exception for rendering.
 	 *
 	 * @param  \Throwable  $e
 	 * @return \Throwable
 	 */
	public function render($request, Throwable $e)
	{
		$response = parent::render($request, $e);

		if ($request->is('api/*')) {
			return response()->json([
				'message' => 'Record not found.'
			], 404);
		}

		if ((env('APP_ENV') != 'local') && !env('APP_DEBUG')) {
			if (in_array($response->status(), [500, 503])) {
				return Inertia::render('ServerError', ['status' => $response->status()])
					->toResponse($request)
					->setStatusCode($response->status());
			}
			
			if (in_array($response->status(), [404, 403, 419])) {
				return Inertia::render('Error', ['status' => $response->status()])
					->toResponse($request)
					->setStatusCode($response->status());
			}
		}

		return $response;
	}
}
