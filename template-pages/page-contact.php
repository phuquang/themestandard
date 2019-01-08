<?php
include_once get_parent_theme_file_path('form-controllers/page-contact-controller.php');

if($form_status === ""){
    include_once get_parent_theme_file_path('template-parts/content-contact.php');
}
if($form_status === "confirm"){
    include_once get_parent_theme_file_path('template-parts/content-contact-confirmation.php');
}
?>