/* 
 * Based on Twitter Bootstrap code
 */

// fix sub nav on scroll
var $win = $(window)
    , $nav = $('.sidebar-nav')
    , navTop = $('.sidebar-nav').length && $('.sidebar-nav').offset().top - 40
    , isFixed = 0

processScroll()

$win.on('scroll', processScroll)

function processScroll() {
    var i, scrollTop = $win.scrollTop()
    if (scrollTop >= navTop && !isFixed) {
    isFixed = 1
    $nav.addClass('sidebar-nav-fixed')
    $nav.addClass('span2')
    } else if (scrollTop <= navTop && isFixed) {
    isFixed = 0
    $nav.removeClass('sidebar-nav-fixed')
    $nav.removeClass('span2')
    }
}