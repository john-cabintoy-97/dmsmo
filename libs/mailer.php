<?php

require __DIR__ . '/../inc/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer extends PHPMailer
{
    private $mail;
    private $username = 'kingzaradbiroin@gmail.com';
    private $password = 'afhwejookddkvzjt';

    public function __construct()
    {
        try {

            $this->mail = new PHPMailer();
            //Server settings

            // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $this->mail->isSMTP();
            $this->mail->Host       = 'smtp.gmail.com';
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->username;
            $this->mail->Password   = $this->password;
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $this->mail->Port       = 465;
            $this->mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ];
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendEmail($recipient, $subject, $msgWithHtml, $msgWithNoHtml = '')
    {
        try {
            $this->mail->setFrom($this->username, 'DMSMO'); // send from
            $this->mail->addAddress($recipient);
            $this->mail->addReplyTo($this->username, 'Information');

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $msgWithHtml;
            $this->mail->AltBody = $msgWithNoHtml;
            if ($this->mail->send()) {
                echo "send";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendEmailMulti($recipients, $subject, $msgWithHtml, $msgWithNoHtml = '')
    {
        try {
            $this->mail->setFrom($this->username, 'DMSMO'); // send from
            $this->mail->addReplyTo($this->username, 'Information');

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $msgWithHtml;
            $this->mail->AltBody = $msgWithNoHtml;
            foreach ($recipients as $recipient) {
                $this->mail->addAddress($recipient);
                if (!$this->mail->send()) {
                    return false;
                } else {
                    return true;
                }
                $this->mail->clearAddresses();
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function emailResetTemplate($code)
    {
        $templates = <<<EOF
        <!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style type="text/css" rel="stylesheet" media="all">
                @media only screen and (max-width: 600px) {
        
                    .email-body_inner,
                    .email-footer {
                        width: 100% !important;
                    }
                }
        
                @media only screen and (max-width: 500px) {
                    .button {
                        width: 100% !important;
                    }
                }
            </style>
        </head>
        
        <body dir="ltr"
            style="height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%;">
            <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0"
                style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; margin: 0; padding: 0; background-color: #fff;"
                bgcolor="#F2F4F6">
                <tr>
                    <td align="center"
                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                        <table class="email-content" width="100%" cellpadding="0" cellspacing="0"
                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; margin: 0; padding: 0;">
                        
                            <tr>
                                <td class="email-masthead"
                                    style=" background-color: #14261C;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; padding: 25px 0; text-align: center;"
                                    align="center">
                                    <a class="email-masthead_name" href="#" target="_blank"
                                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; font-size: 16px; font-weight: bold; color: #ffff; text-decoration: none; text-shadow: 0 1px 0 white;">
                                        DMSMO
                                    </a>
                                </td>
                            </tr>
                            <!-- Email Body -->
                            <tr>
                                <td class="email-body" width="100%"
                                    style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"
                                    bgcolor="#FFF">
                                    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"
                                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 570px; margin: 0 auto; padding: 0;">
                                        <!-- Body content -->
                                        <tr>
                                            <td class="content-cell"
                                                style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; padding: 35px;">
        
                                                <h1
                                                    style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                    RESET OTP CODE, </h1>
                                                <!-- Dictionary -->
                                                <!-- Table -->
                                                <!-- Action -->
        
                                                <p
                                                    style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                    Please use the verification code below:</p>
        
                                                <![if !mso]>
                                                <table class="body-action" align="center" cellpadding="0" cellspacing="0"
                                                    style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; margin: 30px auto; padding: 0; text-align: center;"
                                                    width="100%">
                                                    <tr>
                                                        <td align="center"
                                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                            <span class="button" 
                                                                style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; display: inline-block; width: 200px; border-radius: 3px; color: #fff; font-size: 15px; line-height: 45px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none; mso-hide: all; background-color: #14261C;">
                                                                $code
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <![endif]>
                                                    <p
                                                    style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                    If you didn't request this. you can ignore this email or let us know.</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
            
                                <tr>
                                    <td
                                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                        <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 570px; margin: 0 auto; padding: 0; text-align: center;">
                                            <tr>
                                                <td class="content-cell"
                                                    style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; padding: 35px;">
                                                    <p class="sub center"
                                                        style="margin-top: 0; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; color: #AEAEAE; font-size: 12px; text-align: center;">
                                                        Copyright © 2023 DMSMO. All rights reserved.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            
        </html>
        EOF;

        return $templates;
    }

    public function emailTemplate($no, $particular, $remarks, $filename, $link)
    {
        $templates = <<<EOF
        <!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <style type="text/css" rel="stylesheet" media="all">
                    @media only screen and (max-width: 600px) {
            
                        .email-body_inner,
                        .email-footer {
                            width: 100% !important;
                        }
                    }
            
                    @media only screen and (max-width: 500px) {
                        .button {
                            width: 100% !important;
                        }
                    }
                </style>
            </head>
            
            <body dir="ltr"
                style="height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%;">
                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0"
                    style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; margin: 0; padding: 0; background-color: #fff;"
                    bgcolor="#F2F4F6">
                    <tr>
                        <td align="center"
                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                            <table class="email-content" width="100%" cellpadding="0" cellspacing="0"
                                style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; margin: 0; padding: 0;">
            
                                <tr>
                                    <td class="email-masthead"
                                        style=" background-color: #14261C;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; padding: 25px 0; text-align: center;"
                                        align="center">
                                        <a class="email-masthead_name" href="#" target="_blank"
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; font-size: 16px; font-weight: bold; color: #ffff; text-decoration: none; text-shadow: 0 1px 0 white;">
                                            DMSMO
                                        </a>
                                    </td>
                                </tr>
                                <!-- Email Body -->
                                <tr>
                                    <td class="email-body" width="100%"
                                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"
                                        bgcolor="#FFF">
                                        <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 570px; margin: 0 auto; padding: 0;">
                                            <!-- Body content -->
                                            <tr>
                                                <td class="content-cell"
                                                    style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; padding: 35px;">
                                                <h4 style="color: #111;">Document Management System of Memorandum Order</h4>
                                                    <p
                                                        style="margin-top: 0; color: #111; font-size: 16px; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                        Control No: <strong>$no</strong></p>
                                                    </p>
                                                    <p
                                                        style="margin-top: 0; color: #111; font-size: 16px; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                        Particulars: <br> <strong>$particular</strong></p>
                                                    <p
                                                        style="margin-top: 0; color: #111; font-size: 16px; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                        Remarks: <br> <strong>$remarks</strong></p>
                                                    <p
                                                        style="margin-top: 0; color: #111; font-size: 16px; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                                        Filename: <Strong>$filename</Strong></p>
                                                    <a href='$link' class="button" target="_blank"
                                                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; display: inline-block; width: 200px; border-radius: 3px; color: #fff; font-size: 15px; line-height: 45px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none; mso-hide: all; background-color: #14261C;">
                                                        Download
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    
                                    </td>
                                </tr>
            
                                <tr>
                                    <td
                                        style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;">
                                        <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; width: 570px; margin: 0 auto; padding: 0; text-align: center;">
                                            <tr>
                                                <td class="content-cell"
                                                    style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; padding: 35px;">
                                                    <p class="sub center"
                                                        style="margin-top: 0; line-height: 1.5em; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box; color: #AEAEAE; font-size: 12px; text-align: center;">
                                                        Copyright © 2023 DMSMO. All rights reserved.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            
            </html>

        EOF;

        return $templates;
    }
}
