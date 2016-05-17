$(document).ready(function(){
    if(this.location.pathname=='/'){
        $('a[href="'+this.location.pathname+'"]').addClass('activeHome');
    }
    else{
        $('a[href="'+this.location.pathname+'"]').parent().addClass('active');
    }
});
