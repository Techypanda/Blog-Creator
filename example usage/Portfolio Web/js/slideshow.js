const PHOTOCOUNT = 23;
const TIMER = 15000;
async function animate()
{
    let img = $("#slideshow");
    img.fadeOut(5000, function(){
        img.attr("src",pickRandomImg());
        img.fadeIn(5000, function() {
            animate(); // I did this as a cleaner alternative to the previous attempts.
        });
    });
    //window.setTimeout(animate, TIMER);
}
function pickRandomImg()
{
    return "./imgs/" + (Math.floor(Math.random() * (PHOTOCOUNT)) + 1) + ".jpeg";
}

$("#slideshow").attr("src",pickRandomImg()); // Start off with a random img.
animate();
