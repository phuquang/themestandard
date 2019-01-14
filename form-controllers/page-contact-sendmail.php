<?php
use phuquang\Validation\QNP_Mailer;

$Mailer = new QNP_Mailer();

$Mailer->setFrom('admin@cybridge.jp', 'Admin');
$Mailer->setTo('user@cybridge.jp', 'Admin');
$Mailer->setSubject('Subject');
$Mailer->setMailData($Validate->getAllData());
$Mailer->setMailTemplate(dirname(__FILE__) . '/../template-emails/page-contact-user.tpl');
$Mailer->send();