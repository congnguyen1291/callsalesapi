<?php

add_action('wp_ajax_nopriv_form_register', 'form_register');
add_action('wp_ajax_form_register', 'form_register');
function form_register()
{
    $api_url = get_option('callsales_url_api');
    $tooken = get_option('callsales_tooken');

    $fullName = (isset($_POST['fullName'])) ? esc_attr($_POST['fullName']) : '';
    $phone = (isset($_POST['phone'])) ? esc_attr($_POST['phone']) : '';
    $email = (isset($_POST['email'])) ? esc_attr($_POST['email']) : '';
    $message = (isset($_POST['message'])) ? esc_attr($_POST['message']) : '';
    $base_url = (isset($_POST['base_url'])) ? esc_attr($_POST['base_url']) : '';
    $data = array(
        'phone' => $phone,
        'fullname' => $fullName,
        'email' => $email,
        'information' => $message,
        'url' => $base_url,
        "utm_source" => $base_url
    );
    $data_json = json_encode($data);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url . '/api/add_lead_api',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        // CURLOPT_POSTFIELDS => '{"phone":"09086064271111", "psid":0, "photos":"", "title":"tesf", "information":"Gọi liền", "company":"", "fullname":"cdc", "utm_source":"callsales.vn", "utm_campaign":"ads", "url":""}',
        CURLOPT_POSTFIELDS =>  $data_json,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $tooken,
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response . $data_json;

    die();
}
