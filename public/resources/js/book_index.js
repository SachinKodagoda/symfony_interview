$(document).ready(function(){
    $(".rating").rating('disable');
    $('.ui.dropdown').dropdown();
    setTimeout(function() {
        $('.hide_me_in').fadeOut('fast');
    }, 3000);
});