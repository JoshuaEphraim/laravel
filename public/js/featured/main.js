$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    showDomains();
    $('#header .lSide a.trigger').on('click', function(){
        $('#header .menu').slideToggle('fast');
        return false;
    });
});