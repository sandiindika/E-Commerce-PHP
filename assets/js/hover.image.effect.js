// Effect slide hover image
$( document ).ready(function() {
    $('.thumbnaill').hover(
        function(){
            $(this).find('.captionn').slideDown(450); //.fadeIn(250)
        },
        function(){
            $(this).find('.captionn').slideUp(450); //.fadeOut(205)
        }
    ); 
});