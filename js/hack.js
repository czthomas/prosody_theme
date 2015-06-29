$(document).ready(function(){

    $('#rhyme').prev().hide();

    var contentWidth = $('.poem-home').width();
    $('#utils').width(contentWidth + 10);

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

});
