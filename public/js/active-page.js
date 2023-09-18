$(function () {
    let urlArr = window.location.href.split('/');

    let prefix = urlArr[3] ?? null;
    let page = null;

    if (prefix) {
        page = urlArr[4] ?? null;
    }

    if (! page) {
        page = 'home';
    }

    $('#customer-navbar li.active').removeClass('active');
    $('#customer-navbar #page-' + page).addClass('active');
});
