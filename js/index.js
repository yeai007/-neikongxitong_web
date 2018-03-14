/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('.inactive').click(function () {
        var className = $(this).parents('li').parents().attr('class');
        if ($(this).siblings('ul').css('display') == 'none') {
            if (className == "yiji") {
                $(this).parents('li').siblings('li').children('ul').parent('li').children('a').removeClass('inactives');
                $(this).parents('li').siblings('li').children('ul').slideUp(100);
                $(this).parents('li').children('ul').children('li').children('ul').parent('li').children('a').removeClass('inactives');
                $(this).parents('li').children('ul').children('li').children('ul').slideUp(100);
            }
            $(this).addClass('inactives');
            $(this).siblings('ul').slideDown(100);
        } else {
            $(this).removeClass('inactives');
            $(this).siblings('ul').slideUp(100);
        }
    });
    $('.inactive').on({
        mouseout: function () {
            $(this).css("background-color", "rgba(248, 248, 248, 1)");
        },
        mouseover: function () {
            $(this).css("background-color", "#E9E9E4");
        }
    });
});

function toPage(obj) {
    // document.getElementById('right').innerHTML = obj;
}