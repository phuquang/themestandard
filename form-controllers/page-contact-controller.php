<?php
// starts new or resumes existing session
session_start();

// regenerates SESSIONID to prevent hijacking
session_regenerate_id(true);

include_once get_parent_theme_file_path('inc/libraries/Form/init.php');

// Sử dụng được Validate
// Tạo được valid ở controlller
// form status
$Validate = new QNP_Form();

// Set form status is first
$form_status = '';

if ( $Validate->methodIsGet() ) {
    $form_name = $salt = 'contact';
    $form_id = rand(10000,99999);
    $form_session_name = 'form_' . $form_name . '_' . $form_id;
    $form_token_name = 'form_' . $form_name . '_' . $form_id . '_csrf';
    $form_token_value = md5(mt_rand(1,1000000) . $salt);;
    // Set session for form
    $_SESSION[$form_session_name] = time();
    $_SESSION[$form_token_name] = $form_token_value;
}

// Method is POST
if ( $Validate->methodIsPost() ) {

    // Not form session
    if ( empty($Validate->post('form_session')) ) {
        $Validate->redirect('/contact');
    }

    // form token not match
    if ($_SESSION[$Validate->post('form_session') . '_csrf'] !== $Validate->post('form_token') ) {
        $Validate->redirect('/contact');
    }

    // form due
    if ( strtotime('+1 day', $_SESSION[$Validate->post('form_session')]) < time() ) {
        $Validate->redirect('/contact');
    }

    // Validator
    include_once get_parent_theme_file_path('form-controllers/page-contact-validator.php');


    // First submit and Validate not errors
    if ( $Validate->post('submit') === 'confirm' && $Validate->notErrors() ) {
        // Set form status is confirm
        $form_status = 'confirm';
    }

    // Second submit and Validate not errors
    if ( $Validate->post('submit') === 'done' && $Validate->notErrors() ) {
        // Set form status is done
        $form_status = 'complete';

        // include_once "send_mail.php";
        include_once get_parent_theme_file_path('form-controllers/page-contact-sendmail.php');
        // $Validate->redirect('/contact/thank');

        // Rremove this form session
        unset($_SESSION[$Validate->post('form_session')]);

        // Remove all session
        session_destroy();
    }

    // Back submit
    if ( $Validate->post('submit') === 'back' ) {
        // Set form status is rollback to first
        $form_status = '';
    }

}


theme_debug(
    array(
        'Session' => $_SESSION,
        'Form' => $Validate,
    )
);
