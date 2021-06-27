<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.phpautoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mailgun.org', 587))
  ->setUsername('amina@mehic.me')
  ->setPassword('Privateemailpass00')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['amina@mehic.me' => 'Amina'])
  ->setTo(['mehicamina7@gmail.com'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);

print_r($result);
?>