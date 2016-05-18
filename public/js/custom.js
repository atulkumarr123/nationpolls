$(document).ready(function() {
    $('#alertDiv').not('.alert-important').delay(4000).slideUp(500);
});
$(document).ready(function(){
    if(this.location.pathname=='/'){
        $('a[href="'+this.location.pathname+'"]').addClass('activeHome');
    }
    else{
        $('a[href="'+this.location.pathname+'"]').parent().addClass('active');
    }
});
