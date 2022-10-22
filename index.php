<?php

/**
 * Plugin Name: Callsales
 * Description: Client can post data from form7 plugin to Callsales CRM or an other CRM.
 * Version: 1.0
 * Author: Melink
 * Author URI: https://melink.vn
 * Developer: Melink
 * Copyright: © 2022 Automattic
 */


require_once __DIR__ . '/post_data.php';
require_once __DIR__ . '/setting.php';

function load_js_callsales()
{
?>
    <script>
        function getDataCallsales(form) {
            return {
                'callsales_phone': document.querySelector(form + " [name=<?php echo get_option('callsales_phone'); ?>]").value,
                "callsales_fullName": document.querySelector(form + " [name=<?php echo get_option('callsales_fullname'); ?>]").value,
                'callsales_message': document.querySelector(form + " [name=<?php echo get_option('callsales_message'); ?>]").value,
                'callsales_email': document.querySelector(form + " [name=<?php echo get_option('callsales_email'); ?>]").value
            }
        }
    </script>
    <script>
        (function() {
            let submit = document.querySelectorAll("form.wpcf7-form");
            for (let i = 0; i < submit.length; i++) {
                submit[i].addEventListener("submit", (e) => {
                    let form = e.target.className += " callsales-" + i;

                    data_value = getDataCallsales('.callsales-' + i)
                    console.log(data_value);
                    if (data_value['callsales_fullName'] != '' && data_value['callsales_phone'] != '') {
                        (function($) {
                            $.ajax({
                                type: "post",
                                dataType: "html",
                                url: '/wp-admin/admin-ajax.php',
                                data: {
                                    action: "form_register",
                                    fullName: data_value['callsales_fullName'],
                                    email: data_value['callsales_email'],
                                    phone: data_value['callsales_phone'],
                                    message: data_value['callsales_message'],
                                    base_url: window.location.hostname
                                },
                                context: this,
                                beforeSend: function() {
                                    // console.log('test');
                                },
                                success: function(response) {
                                    // console.log(response);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    // console.log('error');
                                }
                            })

                        })(jQuery)
                    }

                })
            }

        })()
    </script>
<?php
    // echo '<script src="/wp-content/plugins/callsales/assets/app.js"></script>';
}
add_action('wp_footer', 'load_js_callsales');
