<?php
error_reporting(0);
function kirim_email($email, $subject, $message)
{
    $ci = get_instance();
    $ci->load->library('email');
    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.hostinger.co.id',
        'smtp_user' => 'museummonpera@ronisky.com',
        'smtp_pass' => 'a5[AFwN~OWPA',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
    ];
    $ci->email->initialize($config);
    $ci->email->from('monpera@ronisky.com', "Museum Monumen Perjuangan Rakyat Jawa Barat");
    $ci->email->to("$email");
    $ci->email->subject("$subject");
    $ci->email->message("$message");
    $ci->email->send();
}
