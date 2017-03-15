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
        type:     "POST", //Тип запроса
        dataType: "html", //Тип данных
        data: jQuery("#"+form_id).serialize(),
        success: function(response) { //Если все нормально
            var res = jQuery.parseJSON(response);
            var listOperator="", listOperator2 = "", costs = "";
            $("div#list_operator_div").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#list_operator_div_2").removeClass("has-error").find("span").html("<strong></strong>");
            $("div#costs-div").removeClass("has-error").find("span").html("<strong></strong>");

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
                            $("#list_operator_div")
                                .addClass("has-error")
                                .find("span")
                                .html("<strong>"+listOperator+"</strong>");
                            break;
                        case 'list_operator_2':
                            listOperator2 += obj[key];
                            $("#list_operator_div_2")
                                .addClass("has-error")
                                .find("span")
                                .html("<strong>"+listOperator2+"</strong>");
                            break;
                        case 'costs':
                            costs += obj[key];
                            $("#costs-div")
                                .addClass("has-error")
                                .find("span")
                                .html("<strong>"+costs+"</strong>");
                            break;
                    }
                }
            }
            else
            {
                console.log('AJAX is success ne object');
            }

        },
        error: function(response) { //Если ошибка
            console.log('error AJAX');
            // document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
        }
    });
}

// AJAX обработка випадного списка с тарифами
function showOperators(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","operators/"+str,true);
        xmlhttp.send();
    }
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
            var nameError="", emailError = "", messageError="";
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
                    }
                }
            }
            else
            {
                $("#"+form_id).trigger("reset");
                location.reload();
            }
        },
        error: function(response) { //Если ошибка
            document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
        }
    });
}

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