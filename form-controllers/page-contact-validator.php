<?php
// Create custom validate
$Validate->_test = function($field, $message) use ($Validate) {
    if ( $field->value ) {
        $Validate->addError($field->name, 'test', $message[0]);
    }
};

$Validate->name('fullname', '氏名')
        // ->required('message required')
        // ->test('message test')
        // ->hiragana('message hiragana')
        ;

$Validate->name('namekana', 'フリガナ')
        ->max('message max',10)
        ->required('message required')
        ;
