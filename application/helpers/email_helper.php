<?php
error_reporting(0);
function kirim_email($email, $subject, $message)
{

    $ci = get_instance();
    $ci->load->library('email');
    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'simusmonpera@gmail.com',
        'smtp_pass' => 'monpera2020',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
    ];
    $ci->email->initialize($config);
    $ci->email->from('simusmonpera@gmail.com', "Museum Monumen Perjuangan Rakyat Jawa Barat");
    $ci->email->to("$email");
    $ci->email->subject("$subject");
    $ci->email->message("$message");
    $ci->email->send();
}
