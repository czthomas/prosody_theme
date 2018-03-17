jQuery(document).ready(function($){

    // Set the width of #utils and then resize as necessary
    /*function utilSize () {
        var contentWidth = $('.poem-home').width();
        $('#utils').width(contentWidth + 10);
    }
    utilSize();
    $(window).resize( function() {
        utilSize();
    });*/

    // Accordion for the sidebar
    $( '#accordion' ).accordion({
        icons: { "header": "ui-icon-triangle-1-e", "activeHeader": "ui-icon-triangle-1-s"},
        activate: function (e, ui) {
            localStorage.setItem('accordion-active', $(this).accordion( "option", "active"));
        },
        active: +localStorage.getItem('accordion-active')
    });

    // Tabs for the Instructions page
    $( '#tabs' ).tabs();
});
