<?php

namespace Pqe\Admin\Exceptions;

use Pqe\Admin\Logging\PqeLog;
use Pqe\Admin\Models\Email;
use Pqe\Admin\Utils\Dates;
use Throwable;

class ExceptionMail {

    public static function sendEmail(Throwable $exception, $errorCode, $references) {
        // exception 429
        if ($errorCode == '429') {
           return;
        }
        // sending email
        $env = config('app.env');
        $email = new Email();
        $email->from = 'anydevice@pqe.eu';
        $email->to = 'a.badii@pqegroup.com';
        $email->subject = 'Generic Exception - ' . ucfirst($env);
        if ($exception->getCode() == '23000') {
            $trace = $exception->getTraceAsString();
        } else {
            $trace = null;
        }
        if (!is_array($references)) {
            $email->body = '
                        <html>
                          <body>
                            <p style="font-family:calibri;"> Error ' . $errorCode .
                '</p><br> <p style="font-family:calibri;"> Message: ' . $exception->getMessage() .
                '</p><br> <p style="font-family:calibri;"> Position: ' . $exception->getFile() . ': ' .
                $exception->getLine() . '</p><br> <p style="font-family:calibri;"> References: ' . $references .
                '</p><br> <p style="font-family:calibri;"> References: ' . $trace .
                '</p><br> <p style="font-family:calibri;">Regards</p>
                          </body>
                        </html>';
        }

        $email->subject = self::getSubject($GLOBALS['logChannel'], $env);
        if ($errorCode == '429') {
           $email->subject .= " - 429";
        }
        if (isset($GLOBALS['logChannel']) && $GLOBALS['logChannel'] == 'infinity-invoice') {
            $email->bcc = 'k.gerelchimeg@pqegroup.com';
            $body = '<html><body>
                            <h2 style="color: red; margin: 15px 50px;">Infinity Payment To Suite Error! for this Invoices:</h2>
                            <table style="margin: 25px 50px; font-size: 0.9em;
                                    font-family: sans-serif; min-width: 400px;">
                            <thead style="background-color: #279DDA;color: #ffffff; text-align: left;">
                                <tr>
                                    <th style="padding: 6px 15px;">Invoice #</th>
                                    <th style="padding: 6px 15px;">Due Date</th>
                                    <th style="padding: 6px 15px;">ZCS ID</th>
                                    <th style="padding: 6px 15px;">Error</th>
                                </tr>
                            </thead><tbody>';

            foreach ($references as $reference) {
                if ($reference['scadenza']) {
                    $scadenza = $reference['scadenza'];
                    $scadenza = Dates::getDataFromHrzYmd($scadenza);
                    $error = 'No Invoice Found with this due date in Suite';
                } else {
                    $scadenza = 'Not Set';
                    $error = 'No Invoice Found in Suite';
                }
                PqeLog::debug($reference);
                if ($reference['SEZDOC'] !== '') {
                    $sezDoc = '/' . $reference['SEZDOC'];
                } else {
                    $sezDoc = '';
                }
                $body .= '  <tr>
                                <td style="padding: 6px 15px; border-bottom: 1px solid #dddddd;">' .  $reference['TIPODOC'] . ': ' . $reference['NUMDOC'] . $sezDoc .  '</td>
                                <td style="padding: 6px 15px; border-bottom: 1px solid #dddddd;">' . $scadenza .  '</td>
                                <td style="padding: 6px 15px; border-bottom: 1px solid #dddddd;">' . $reference['zcs_id'] .  '</td>
                                <td style="padding: 6px 15px; border-bottom: 1px solid #dddddd;">' . $error .  '</td>
                            </tr>';
            }
            $body .= '</tbody></thead></table></body></html>';
            $email->body = $body;
        }

        $email->createEmail();
    }

    public static function getSubject($channel, $env) {
        $subject = 'Generic Exception' . ucfirst($env);
                
        switch ($channel) {
            case 'hubspot' :
            case 'hubspot_scl' :
            case 'hubspot_wo' :
                $subject = 'Hubspot Exception - ' . ucfirst($env);
                break;
            case 'infinity' :
                $subject = 'Zucchetti Infinity Exception - ' . ucfirst($env);
                break;
            case 'hrzhrms' :
                $subject = 'Zucchetti HR-HRMS Exception - ' . ucfirst($env);
                break;
            case 'suitehrz' :
                $subject = 'Zucchetti Suite-HR Exception - ' . ucfirst($env);
                break;
            case 'jobdiva' :
                $subject = 'JobDiva Suite Exception - ' . ucfirst($env);
                break;
            case 'edms' :
                $subject = 'EDMS Exception - ' . ucfirst($env);
                break;
            case 'projects' :
                $subject = 'Teams Exception - ' . ucfirst($env);
                break;
            case 'infinity-invoice' :
                $subject = 'Infinity Payment To Suite - ' . ucfirst($env);
                break;
            case 'projects' :
                $subject = 'Teams Exception - ' . ucfirst($env);
                break;
            case 'pandora' :
                $subject = 'Pandora Expenses Exception - ' . ucfirst($env);
                break;
            case 'msteams' :
                $subject = 'MS Teams Images Exception - ' . ucfirst($env);
                break;
            default :
                if (isset($channel)) {
                    $subject = ucfirst($channel) . ' Exception - ' . ucfirst($env);
                } else {
                    $subject = 'Generic Exception' . ucfirst($env);
                }
                break;
        }
        return $subject;
    }
}

