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
// samey function
//function testAjaxProduct(str, id_block, id_block2, id_block3, id_block4) {
//    if (window.XMLHttpRequest) {
//        xmlhttp = new XMLHttpRequest();
//    }else{
//        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            //var result = JSON.parse(xmlhttp.responseText);
//            var result = eval('('+xmlhttp.responseText+')');
//            // alert(resul2.id_block);
//            document.getElementById(id_block).innerHTML = result.id_block;
//            document.getElementById(id_block2).innerHTML = result.id_block2;
//            document.getElementById(id_block3).innerHTML = result.id_block3;
//            document.getElementById(id_block4).innerHTML = result.id_block4;
//        }
//    };
//    xmlhttp.open("GET","filter_catalog.php?form="+str+"",true);
//    xmlhttp.send();
//}