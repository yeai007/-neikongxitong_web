
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {

});

function Print() {
    $("#invoice_content").print({
        //Use Global styles
        globalStyles: true,
        //Add link with attrbute media=print
        mediaPrint: false,
        //Custom stylesheet
        stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",
        //Print in a hidden iframe
        iframe: false,
        //Don't print this
        noPrintSelector: ".avoid-this",
        title: " ",
        //Add this at top
        // prepend: "Hello World!!!<br/>",
        //Add this on bottom
        append: "<br/>Buh Bye!",
        //Log to console when printing is done via a deffered callback
        deferred: $.Deferred().done(function () {
            console.log('Printing done', arguments);
        })

    });
}

function Download() {

    $("#invoice_content").tableExport(
            {
                consoleLog: true,
                type: 'excel',
                ignoreColumn: [],
                ignoreRow: []
            }
    );
}
