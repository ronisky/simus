<?php
error_reporting(0);
function kirim_email($email, $subject, $message)
{

    $ci = get_instance();
    $ci->load->library('email');
    // 'protocol'  => 'smtp',
    // 		'smtp_host' => 'ssl://smtp.googlemail.com',
    // 		'smtp_user' => 'simusmonpera@gmail.com',
    // 		'smtp_pass' => 'monpera2020',
    // 		'smtp_port' => 465,
    // 		'mailtype'  => 'html',
    // 		'charset'   => 'utf-8',
    // 		'newline'   => "\r\n"
    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.hostinger.co.id',
        'smtp_user' => 'email@ronisky.com',
        'smtp_pass' => 'Monpera2020',
        'smtp_port' => 587,
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1',
        'newline'   => "\r\n"
    ];
    // $config['protocol'] = "smtp";
    // $config['smtp_host'] = "smtp.hostinger.co.id";
    // $config['smtp_crypto'] = "ssl";
    // $config['smtp_port'] = 465;
    // $config['smtp_user'] = "email@ronisky.com";
    // $config['smtp_pass'] = 'SimusApp2020';
    // $config['charset'] = "utf-8'";
    // $config['mailtype'] = "html";
    // $config['newline'] = "\r\n";
    $ci->email->initialize($config);
    $ci->email->from('email@ronisky.com', "Museum Monumen Perjuangan Rakyat Jawa Barat");
    $ci->email->to("$email");
    $ci->email->subject("$subject");
    $ci->email->message("$message");
    $ci->email->send();

    // $ci->load->library('mailer');
    // $sendmail = array(
    //     'email_penerima' => $email,
    //     'subjek' => $subject,
    //     'content' => $message,
    // );
    // $ci->mailer->send($sendmail);
}
