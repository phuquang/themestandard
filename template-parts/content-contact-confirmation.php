Confirm
<form action="/contact/" method="post" status="<?php echo $form_status ?>">
    <input type="text" name="form_session" value="<?php echo !empty($form_session_name) ? $form_session_name : $Validate->post('form_session') ?>">
    <input type="text" name="form_token" value="<?php echo !empty($form_token_value) ? $form_token_value : $Validate->post('form_token') ?>">
    <table>
        <?php foreach ($Validate->fields as $key => $field) : ?>
            <tr>
                <td><?php echo $field->label ?></td>
                <td>
                    <?php echo $field->value ?>
                    <?php $Validate->hiddenInput($field->name) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button type="submit" name="submit" value="back">Back</button>
    <button type="submit" name="submit" value="done">Done</button>
</form>