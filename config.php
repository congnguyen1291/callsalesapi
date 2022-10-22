<h3>Config</h3>
<form method="post" action="options.php">
    <?php settings_fields('callsales-settings-group'); ?>
    <table class="form-table">
        <tr>
            <th>URL</th>
            <td><input style="width: 500px" placeholder="Add url" type="text" name="callsales_url_api" value="<?php echo get_option('callsales_url_api'); ?>" /></td>
        </tr>
        <tr>
            <th>Tooken</th>
            <td><input style="width: 500px" placeholder="Add tooken" type="text" name="callsales_tooken" value="<?php echo get_option('callsales_tooken'); ?>" /></td>
        </tr>
        <tr style="margin: 10px 0; border-top: 1px solid #c4c4c4;"></tr>

        <tr>
            <th>Field phone</th>
            <td><input style="width: 500px" placeholder="[explame-field]" type="text" name="callsales_phone" value="<?php echo get_option('callsales_phone'); ?>" /></td>
        </tr>
        <tr>
            <th>Field name</th>
            <td><input style="width: 500px" placeholder="explame-field" type="text" name="callsales_fullname" value="<?php echo get_option('callsales_fullname'); ?>" /></td>
        </tr>
        <tr>
            <th>Field email</th>
            <td><input style="width: 500px" placeholder="explame-field" type="text" name="callsales_email" value="<?php echo get_option('callsales_email'); ?>" /></td>
        </tr>
        <tr>
            <th>Field message</th>
            <td><input style="width: 500px" placeholder="explame-field" type="text" name="callsales_message" value="<?php echo get_option('callsales_message'); ?>" /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
    <p><a class="button button-primary" target="_blank" style="margin-right: 100px;background: green !important;border-color: green;" href="https://callsales.vn">Đăng ký Callsales CRM</a><a class="button button-primary" target="_blank" href="https://callsales.vn/huong-dan">Hướng dẫn sử dụng Callsales </a></p>
</form>