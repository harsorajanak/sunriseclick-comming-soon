const baseUrl = 'admin/services/';

(function ($) {
    "use strict";
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    $.ajax({
        type: "GET",
        url: baseUrl+'getHomeDetails.php',
        success: function(data)
        {
            var res = $.parseJSON(data);
            if(res.status){
                <!--Countdown configuration-->
                $('.cd100').countdown100({
                    endtimeYear: res.data.count_year,
                    endtimeMonth: res.data.count_month,
                    endtimeDate: res.data.count_date,
                    endtimeHours: res.data.count_hours,
                    endtimeMinutes: res.data.count_minutes,
                    endtimeSeconds: res.data.count_seconds,
                    timeZone: ""
                });
                /*social media links*/
                $("#fb").attr("href", res.data.fb_url);
                $("#ytb").attr("href", res.data.ytb_url);
                $("#twt").attr("href", res.data.twt_url);

                /*heading*/
                $("#heading1").html(res.data.heading1);
                $("#heading2").attr(res.data.heading2);

                /*contactdetails*/
                $("#contact-email").html(res.data.email);
                $("#contact-email").attr("href",res.data.email);
                $("#contact-phone").text(res.data.phone);
                $("#contact-phone").attr("href",res.data.phone);
                $("#contact-working-time").html(res.data.working_time);
                $("#contact-working-days").html(res.data.working_days);
                $("#contact-off-days").html(res.data.off_days);

            }
        }
    });



    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }




    $("#subscribe").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                var res = $.parseJSON(data);
                if(res.status){
                    Toast.fire({
                        type: 'success',
                        title: ' &nbsp; &nbsp;'+ res.message
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' &nbsp; &nbsp;'+ res.message
                    })
                }
            }
        });
    });

})(jQuery);

function openNav() {
    document.getElementById("contact-us-nav").style.width = "100%";
}

function closeNav() {
    document.getElementById("contact-us-nav").style.width = "0%";
}