<?php
$Mailer = QNP_Mailer();

$Mailer->setFrom('admin@cybridge.jp', 'Admin');
$Mailer->setTo('user@cybridge.jp', 'Admin');
$Mailer->setSubject('Subject');
$Mailer->setMailTemplate(get_parent_theme_file_path('template-emails/page-contact-user.tpl'));
$Mailer->send();