(function () {
    let submit = document.querySelectorAll("form.wpcf7-form");
    console.log(submit);
    for (let i = 0; i < submit.length; i++) {
        submit[i].addEventListener("submit", () => {
            data_value = getDataCallsales()

            if (data_value['callsales_fullName'] != '' && data_value['callsales_phone'] != '') {
                (function ($) {
                    $.ajax({
                        type: "post",
                        dataType: "html",
                        url: '/wp-admin/admin-ajax.php',
                        data: {
                            action: "form_register",
                            fullName: data_value['callsales_fullName'],
                            phone: data_value['callsales_phone'],
                            message: data_value['callsales_message'],
                            base_url: window.location.hostname
                        },
                        context: this,
                        beforeSend: function () {
                            // console.log('test');
                        },
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log('error');
                        }
                    })

                })(jQuery)
            }

        })
    }

})()

