<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die();
}

include_once get_parent_theme_file_path('inc/libraries/Form/trait.qnp_rules.php');
include_once get_parent_theme_file_path('inc/libraries/Form/trait.qnp_methods.php');
include_once get_parent_theme_file_path('inc/libraries/Form/trait.qnp_filters.php');
include_once get_parent_theme_file_path('inc/libraries/Form/trait.qnp_helpers.php');
include_once get_parent_theme_file_path('inc/libraries/Form/trait.qnp_errors.php');
include_once get_parent_theme_file_path('inc/libraries/Form/QNP_Mailer.php');
include_once get_parent_theme_file_path('inc/libraries/Form/QNP_Field.php');
include_once get_parent_theme_file_path('inc/libraries/Form/QNP_Form.php');
