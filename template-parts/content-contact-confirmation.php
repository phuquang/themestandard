Confirm
<form action="/contact/" method="post" status="<?php echo $form_status ?>">
    <input type="text" name="form_session" value="<?php echo !empty($form_session_name) ? $form_session_name : $Validate->post('form_session') ?>">
    <input type="text" name="form_token" value="<?php echo !empty($form_token_value) ? $form_token_value : $Validate->post('form_token') ?>">
    <p><input type="text" name="fullname" value="<?php echo $Validate->post('fullname') ?>" readonly></p>
    <p><input type="text" name="namekana" value="<?php echo $Validate->post('namekana') ?>" readonly></p>
    <table>
        <tr>
            <td>fullname:</td>
            <td><?php echo $Validate->post('fullname') ?></td>
        </tr>
        <tr>
            <td>namekana:</td>
            <td><?php echo $Validate->post('namekana') ?></td>
        </tr>
    </table>
    <button type="submit" name="submit" value="back">Back</button>
    <button type="submit" name="submit" value="done">Done</button>
</form>