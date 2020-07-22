$(document).ready(function(){
    $(".rating").rating('disable');
    $("#add_btn").click(function () {
        var cartval = parseInt($("#item_to_cart").html(),10);
        if(cartval >= 0 ){
            $("#item_to_cart").html(cartval + 1);
        }
    })

    $("#minus_btn").click(function () {
        var cartval = parseInt($("#item_to_cart").html(),10);
        if(cartval > 0 ){
            $("#item_to_cart").html(cartval - 1);
        }
    })

    $("#add_me_to_cart").click(function () {
        console.log("hi");
        var cartval = parseInt($("#item_to_cart").html(),10);
        $("#book_counter").val(cartval);
        $("#cart_form").submit();
    })
});