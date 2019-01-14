Index
<form action="/contact/" method="post" status="<?php echo $form_status ?>">
    <input type="text" name="form_session" value="<?php echo !empty($form_session_name) ? $form_session_name : $Validate->post('form_session') ?>">
    <input type="text" name="form_token" value="<?php echo !empty($form_token_value) ? $form_token_value : $Validate->post('form_token') ?>">
    <?php if ( $Validate->hasErrors() ): ?>
    <div style="color:red;">
        <?php foreach ( $Validate->errors as $error_field_name => $error ) {
            echo '<p id="error-'.$error_field_name.'">'.array_shift($error[0]).'</p>';
        } ?>
    </div>
    <?php endif; ?>
    <p>fullname: <input type="text" name="fullname" value="<?php echo $Validate->post('fullname') ?>"></p>
    <p>namekana: <input type="text" name="namekana" value="<?php echo $Validate->post('namekana') ?>"></p>
    <button type="submit" name="submit" value="confirm">Submit</button>
</form>