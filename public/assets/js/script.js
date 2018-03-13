/**
 * Created by Vitalik on 17.08.2016.
 */

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
// Отправка форми AJAX
$("#sendFormSearchTariffSelectOption").on('click',
    function(){
        sendFormSearchTariffSelectOption('resultPostTariffForm', 'formSearchTariffSelectOption', '/search-tariff-select-option' );
        return false;
    }
);

function sendFormSearchTariffSelectOption(result_id, form_id, url) {
    jQuery.ajax({
        url:     url, //Адрес подгружаемой страницы
        type:     "GET", //Тип запроса
        dataType: "html", //Тип данных
        data: jQuery("#"+form_id).serialize(),
        success: function(response) { //Если все нормально
            var res = jQuery.parseJSON(response);
            var listOperator="", listOperator2 = "", costs = "";
            var select_1_1 = "", select_1_2 = "", select_1_3 = "";
            var select_2_1 = "", select_2_2 = "", select_2_3 = "";
            var select_3_1 = "", select_3_2 = "", select_3_3 = "";
            var select_4_1 = "", select_4_2 = "", select_4_3 = "";
            var select_5_1 = "", select_5_2 = "";
            var select_6_1 = "", select_6_2 = "";
            var select_7_1 = "", select_7_2 = "";

            $("div#list_operator_div").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#list_operator_div_2").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#costs-div").removeClass("has-error").find("span").html("<strong></strong>");

            $("div#select_1_1").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_1_2").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_1_3").removeClass("has-error").find("span").html("<strong></strong>");

            $("div#select_2_1").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_2_2").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_2_3").removeClass("has-error").find("span").html("<strong></strong>");

            $("div#select_3_1").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_3_2").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_3_3").removeClass("has-error").find("span").html("<strong></strong>");

            $("div#select_4_1").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_4_2").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_4_3").removeClass("has-error").find("span").html("<strong></strong>");

            $("div#select_5_1").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_5_2").removeClass("has-error").find("span").html("<strong></strong>");

            $("div#select_6_1").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_6_2").removeClass("has-error").find("span").html("<strong></strong>");

            $("div#select_7_1").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#select_7_2").removeClass("has-error").find("span").html("<strong></strong>");


            // $("div#message-div").removeClass("has-error").find("span").html("<strong></strong>");

            if(is_object(res.message))
            {
                var key, obj = res.message;
                for (key in obj)
                {
                    switch (key)
                    {
                        case 'list_operator':
                            listOperator += obj[key];
                            $("#list_operator_div").addClass("has-error").find("span").html("<strong>"+listOperator+"</strong>");
                            break;
                        case 'list_operator_2':
                            listOperator2 += obj[key];
                            $("#list_operator_div_2").addClass("has-error").find("span").html("<strong>"+listOperator2+"</strong>");
                            break;
                        case 'costs':
                            costs += obj[key];
                            $("#costs-div").addClass("has-error").find("span").html("<strong>"+costs+"</strong>");
                            break;

                        case 'select_1_1':
                            select_1_1 += obj[key];
                            $("#select_1_1").addClass("has-error").find("span").html("<strong>"+select_1_1+"</strong>");
                            break;
                        case 'select_1_2':
                            select_1_2 += obj[key];
                            $("#select_1_2").addClass("has-error").find("span").html("<strong>"+select_1_2+"</strong>");
                            break;
                        case 'select_1_3':
                            select_1_3 += obj[key];
                            $("#select_1_3").addClass("has-error").find("span").html("<strong>"+select_1_3+"</strong>");
                            break;

                        case 'select_2_1':
                            select_2_1 += obj[key];
                            $("#select_2_1").addClass("has-error").find("span").html("<strong>"+select_2_1+"</strong>");
                            break;
                        case 'select_2_2':
                            select_2_2 += obj[key];
                            $("#select_2_2").addClass("has-error").find("span").html("<strong>"+select_2_2+"</strong>");
                            break;
                        case 'select_2_3':
                            select_2_3 += obj[key];
                            $("#select_2_3").addClass("has-error").find("span").html("<strong>"+select_2_3+"</strong>");
                            break;
                        // select-option row 3
                        case 'select_3_1':
                            select_3_1 += obj[key];
                            $("#select_3_1").addClass("has-error").find("span").html("<strong>"+select_3_1+"</strong>");
                            break;
                        case 'select_3_2':
                            select_3_2 += obj[key];
                            $("#select_3_2").addClass("has-error").find("span").html("<strong>"+select_3_2+"</strong>");
                            break;
                        case 'select_3_3':
                            select_3_3 += obj[key];
                            $("#select_3_3").addClass("has-error").find("span").html("<strong>"+select_3_3+"</strong>");
                            break;
                        // select-option row 4
                        case 'select_4_1':
                            select_4_1 += obj[key];
                            $("#select_4_1").addClass("has-error").find("span").html("<strong>"+select_4_1+"</strong>");
                            break;
                        case 'select_4_2':
                            select_4_2 += obj[key];
                            $("#select_4_2").addClass("has-error").find("span").html("<strong>"+select_4_2+"</strong>");
                            break;
                        case 'select_4_3':
                            select_4_3 += obj[key];
                            $("#select_4_3").addClass("has-error").find("span").html("<strong>"+select_4_3+"</strong>");
                            break;

                        // select-option row 5
                        case 'select_5_1':
                            select_5_1 += obj[key];
                            $("#select_5_1").addClass("has-error").find("span").html("<strong>"+select_5_1+"</strong>");
                            break;
                        case 'select_5_2':
                            select_5_2 += obj[key];
                            $("#select_5_2").addClass("has-error").find("span").html("<strong>"+select_5_2+"</strong>");
                            break;
                        // select-option row 6
                        case 'select_6_1':
                            select_6_1 += obj[key];
                            $("#select_6_1").addClass("has-error").find("span").html("<strong>"+select_6_1+"</strong>");
                            break;
                        case 'select_6_2':
                            select_6_2 += obj[key];
                            $("#select_6_2").addClass("has-error").find("span").html("<strong>"+select_6_2+"</strong>");
                            break;
                        // select-option row 7
                        case 'select_7_1':
                            select_7_1 += obj[key];
                            $("#select_7_1").addClass("has-error").find("span").html("<strong>"+select_7_1+"</strong>");
                            break;
                        case 'select_7_2':
                            select_7_2 += obj[key];
                            $("#select_7_2").addClass("has-error").find("span").html("<strong>"+select_7_2+"</strong>");
                            break;
                    }
                }
            }
            else
            {
                console.log('AJAX is success! form is valid');
            }

            if (res.html) {
                $("#"+result_id).fadeOut();
                $("div#"+result_id).html(res.html).fadeIn(1000);
            }

        },
        error: function(response) { //Если ошибка
            console.log('error AJAX');
            // document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
        }
    });
}

$("#send-form-guest-book").on('click',
    function(){
        sendFormGuestBook('resultSendForm', 'guest-book-form', '/guest-book-message' );
        return false;
    }
);
function sendFormGuestBook(result_id, form_id, url) {
    jQuery.ajax({
        url:     url, //Адрес подгружаемой страницы
        type:     "POST", //Тип запроса
        dataType: "html", //Тип данных
        data: jQuery("#"+form_id).serialize(),
        success: function(response) { //Если все нормально
            var res = jQuery.parseJSON(response);
            var nameError="", emailError = "", messageError="", captchaError="";
            $("div#username-div").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#email-div").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#message-div").removeClass("has-error").find("span").html("<strong></strong>");

            if(is_object(res.message))
            {
                var key, obj = res.message;
                for (key in obj)
                {
                    switch (key)
                    {
                        case 'username':
                            nameError += obj[key];
                            $("#username-div")
                                .addClass("has-error")
                                .find("span")
                                .html("<strong>"+nameError+"</strong>");
                            break;
                        case 'email':
                            emailError += obj[key];
                            $("#email-div")
                                .addClass("has-error")
                                .find("span")
                                .html("<strong>"+emailError+"</strong>");
                            break;
                        case 'message':
                            messageError += obj[key];
                            $("#message-div")
                                .addClass("has-error")
                                .find("span")
                                .html("<strong>"+messageError+"</strong>");
                            break;
                        case 'g-recaptcha-response':
                            captchaError += obj[key];
                            $("#g-recaptcha-response-div")
                                .addClass("has-error")
                                .find("span")
                                .html("<strong>"+captchaError+"</strong>");
                            break;
                    }
                }
            }
            else
            {
                $("#"+form_id).trigger("reset");
                $("#alert").append(res.success);
            }
        },
        error: function(response) { //Если ошибка
            document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
        }
    });
}

// тарифы по оператору
$('#show-operator-tariffs').on('change', function(e){
    location.href = 'http://'+location.hostname +'/tariffs/'+e.target.value;
    // alert(e.target.value);
});

// скрип для увеличение картинки
$(function(){
    $('.minimized').click(function(event) {
        var i_path = $(this).attr('src');
        $('body').append('<div id="overlay"></div><div id="magnify"><img src="'+i_path+'"><div id="close-popup"><i></i></div></div>');
        $('#magnify').css({
            left: ($(document).width() - $('#magnify').outerWidth())/2,
            // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
            top: ($(window).height() - $('#magnify').outerHeight())/2
        });
        $('#overlay, #magnify').fadeIn('fast');
    });

    $('body').on('click', '#close-popup, #overlay', function(event) {
        event.preventDefault();

        $('#overlay, #magnify').fadeOut('fast', function() {
            $('#close-popup, #magnify, #overlay').remove();
        });
    });
});

// смена списка операторов
$('#list_operator').on('change', function(e){
    var list_operator = e.target.value;

    if(list_operator == "")
        $('#list_operator_2').empty().attr('disabled', 'disabled');
    else
    {
        $('#list_operator_2').removeAttr('disabled');
        //ajax
        $.get('/select-value?list_operator=' + list_operator, function(data){
            //success data
            $('#list_operator_2').empty();
            $('select#list_operator_2').append('Please choose one');
            $.each(data, function(index, operatorObj){
                $('#list_operator_2').append('<option value="'+ operatorObj.id +'">'
                    + operatorObj.operator_name + '</option>');
            });
        });
    }
});

// is object?
function is_object(mixed_var){
    if(mixed_var instanceof Array) {
        return false;
    } else {
        return (mixed_var !== null) && (typeof( mixed_var ) == 'object');
    }
}