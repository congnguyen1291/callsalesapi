<?php
function callsales_create_menu()
{
    add_menu_page('Callsales', 'Callsales', 'administrator', 'callsales', 'callsales_settings_page');
    add_action('admin_init', 'register_setting_callsales');
}
add_action('admin_menu', 'callsales_create_menu');

function callsales_settings_page()
{
    require_once __DIR__ . '/config.php';
}

function register_setting_callsales()
{
    register_setting('callsales-settings-group', 'callsales_url_api');
    register_setting('callsales-settings-group', 'callsales_tooken');
    register_setting('callsales-settings-group', 'callsales_phone');
    register_setting('callsales-settings-group', 'callsales_fullname');
    register_setting('callsales-settings-group', 'callsales_email');
    register_setting('callsales-settings-group', 'callsales_message');
    register_setting('callsales-settings-group', 'callsales_form_id');
}
