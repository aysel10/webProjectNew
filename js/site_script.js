$(window).scroll(function () {
if ($(window).scrollTop() >= 750) {
$('.navbar').css('background','black');
$('.navbar-nav>li>a').css('color','darkorange');
    $('.navbar-default').css( 'border-bottom', 'transparent');
} else {
$('.navbar').css('background','transparent');
    $('.navbar-nav>li>a').css('color','white');
     $('.navbar-default').css( 'border-bottom', '1px solid white');
}
});