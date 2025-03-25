<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();	
	}

    public function index()
    {   
        //composer require phpmailer/phpmailer 먼저 실행
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        try {
            // SMTP 설정
            $mail->isSMTP();
            $mail->Host = 'smtp.naver.com'; // SMTP 서버를 입력
            $mail->SMTPAuth = true;
            $mail->Username = ''; // 이메일 계정
            $mail->Password = ''; // 이메일 비밀번호
            $mail->SMTPSecure = 'tls'; // tls 또는 ssl
            $mail->Port = 587; // 포트 번호

            $mail->setFrom('보내는 이메일', '보낼 이름');
            $mail->addAddress('받는 이메일');

            // 이메일 내용 설정
            $mail->isHTML(true);
            $mail->Subject = '메일 제목';
            $mail->Body    = '메일 텍스트';

            $mail->CharSet = 'UTF-8';

            // 이메일 전송
            $mail->send();
            echo 'Email sent successfully.';
        } catch (Exception $e) {
            echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}