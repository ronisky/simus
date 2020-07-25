<?php
error_reporting(0);
function kirim_email($email, $subject, $message)
{
    $ci = get_instance();
    $ci->load->library('email');
    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.hostinger.co.id',
        'smtp_user' => 'info@ronisky.com',
        'smtp_pass' => 'nQdeo|0K',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
    ];
    $ci->email->initialize($config);
    $ci->email->from('info@ronisky.com', "Museum Monumen Perjuangan Rakyat Jawa Barat");
    $ci->email->to("$email");
    $ci->email->subject("$subject");
    $ci->email->message("$message");
    $ci->email->send();
}
