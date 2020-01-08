$(".project-tile").hover(function() {
    $(this).addClass("hoverJQuery");
}, function()
{
    $(this).removeClass("hoverJQuery");
    $(this).css("transform","");
});

function erraticMovement()
{ // -10 -> 10
    let x = Math.random() * (10 - -10) + -10;
    let y = Math.random() * (10 - -10) + -10;
    $(".hoverJQuery").css("transform","translate(" + x + "px" + "," + y + "px)");
    window.setTimeout(erraticMovement, 20);
}

erraticMovement();
