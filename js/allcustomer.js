/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function toCustomerPage(obj1) {
    $("<link>")
            .attr({rel: "stylesheet",
                type: "text/css",
                href: "../../css/allcustomer.css"
            })
            .appendTo("head");
    $.post("../market/setCustomer.php", {}, function (data) {
        document.getElementById('content').innerHTML = data;
        // $('#right').html(data);
    });
}