/**
 * Created by Vitalik on 17.08.2016.
 */

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
// Отправка форми AJAX
function AjaxFormRequestSelectTariff(result_id, error_id, form_id,url) {
    jQuery.ajax({
        url:     url, //Адрес подгружаемой страницы
        type:     "POST", //Тип запроса
        dataType: "html", //Тип данных
        data: jQuery("#"+form_id).serialize(),
        success: function(response) { //Если все нормально
            var res = jQuery.parseJSON(response);
            if(res.error==0){
                document.getElementById(result_id).innerHTML = res.message;
                $('.popuporderform').remove();
            } else {
                document.getElementById(error_id).innerHTML = res.message;
            }

        },
        error: function(response) { //Если ошибка
            document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
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
    // console.log('here');
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
                // alert('ошибок нет');
                // var login = $("input[name='login']").val();
                // var server = $("input[name='server']").val();
                // var html = "<tr>" +
                //     "<td>"+login+"</td>" +
                //     "<td>********</td>" +
                //     "<td>"+server+"</td>" +
                //     "<td><img src='images/site-bg/no.png'></td>" +
                //     "</tr>";
                //
                // $("#your_table_account > tbody:last").append(html);
                //
                // $("#"+result_id).show();
                // document.getElementById(result_id).innerHTML = result;
                // // $("form#"+form_id).remove();
                // $("form#"+form_id)[0].reset();
                // // $(".form-accoun-input").val("");
                // setTimeout(function(){$("#"+result_id).fadeOut('fast')},3000)
            }
        },
        error: function(response) { //Если ошибка
            document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
        }
    });
}

// is object?
function is_object(mixed_var){
    if(mixed_var instanceof Array) {
        return false;
    } else {
        return (mixed_var !== null) && (typeof( mixed_var ) == 'object');
    }
}