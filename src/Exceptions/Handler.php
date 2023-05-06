<?php
namespace Pqe\Admin\Exceptions;

use Pqe;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler {
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [ //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register() {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */

    public function report(Throwable $exception) {
        if ($this->shouldReport($exception)) {
            $this->sendEmail($exception); // sends an email
        }
        return parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
    /*
     * Sends an email to the developer about the exception.
     *
     * @param \Exception $exception
     * @return void
     */
    // TODO
    public function sendEmail(Throwable $exception) {
        /*
         * // sending email
         * $email = new Email();
         * $email->from = 'anydevice@pqe.eu';
         * $email->to = 'a.badii@pqegroup.com';
         * if (isset($GLOBALS['logChannel'])) {
         * $channel = $GLOBALS['logChannel'];
         * switch ($channel) {
         * case 'hubspot' :
         * // $email->cc = 'g.stori@pqegroup.com';
         * $email->subject = 'Hubspot Exception';
         * break;
         * case 'infinity' :
         * $email->subject = 'Zucchetti Infinity Exception';
         * break;
         * case 'hrzhrms' :
         * $email->subject = 'Zucchetti HR-HRMS Exception';
         * break;
         * case 'edms' :
         * $email->subject = 'EDMS Exception';
         * break;
         * default:
         * $email->subject = $channel . ' Exception';
         * break;
         * }
         * } else {
         * $email->subject = 'Generic Exception';
         * }
         * $email->body = $exception->getMessage();
         * $email->createEmail();
         */
    }
}
