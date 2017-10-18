$(document).ready(function(){

    // Set the width of #utils and then resize as necessary
    function utilSize () {
        var contentWidth = $('.poem-home').width();
        $('#utils').width(contentWidth + 10);
    }
    utilSize();
    $(window).resize( function() {
        utilSize();
    });

    // Tabs for poem resources and text
    $('#poem_resources').hide();
    $('#poem_text_tab').click(function(e){
        e.preventDefault();
        $('#poem_resources').hide();
        $('#poem_text').show();
    });
    $('#poem_resources_tab').click(function(e){
        e.preventDefault();
        $('#poem_text').hide();
        $('#poem_resources').show();
    });

    // Accordion for the sidebar
    $( '#accordion' ).accordion({
        icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus"},
        activate: function (e, ui) {
            localStorage.setItem('accordion-active', $(this).accordion( "option", "active"));
        },
        active: +localStorage.getItem('accordion-active')
    });

    // Tabs for the Instructions page
    $( '#tabs' ).tabs();

});
