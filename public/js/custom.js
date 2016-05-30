$(document).ready(function() {
    $('#alertDiv').not('.alert-important').delay(4000).slideUp(500);
    navbarItemsHighlighter();
    if ($('#locationMismatchData').val() != null) {
        locationMismatchHandler();
    }
});
function navbarItemsHighlighter(){
    $(document).ready(function(){
        if(this.location.pathname=='/'){
            $('a[href="'+this.location.pathname+'"]').addClass('activeHome');
        }
        else{
            $('a[href="'+this.location.pathname+'"]').parent().addClass('active');
        }
    });
}
function locationMismatchHandler(){
    $(document).ready(function() {
                var polledData = JSON.parse($('#locationMismatchData').val());
                var optionToBeSelected = polledData[0].optionToBeSelected;
                var locationMismatch = polledData[1].locationMismatch;
                var countriesPollsApplicableOn = polledData[2].countriesPollsApplicableOn;
                var countryISOCodesPollsApplicableOn = polledData[3].countryISOCodesPollsApplicableOn;
                $('#' + optionToBeSelected).prop("checked", true);
                if (locationMismatch == 'unMatched') {
                    var title = 'This Poll is running only in the following location(s):';
                    swal({
                            html: true,
                            title: '',
                            text: title + '<br><b>' + countriesPollsApplicableOn + '</b><br><br>' + 'Please share your location'
                        },
                        function () {
                            getLocation(countryISOCodesPollsApplicableOn);
                        });
                }
    });
}
function getLocation(countryISOCodesPollsApplicableOn) {
    navigator.geolocation.getCurrentPosition(function(position) {
    showPosition(position, countryISOCodesPollsApplicableOn)
    });
}
function showPosition(position,countryISOCodesPollsApplicableOn) {
    //window.location = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&key=AIzaSyDG7HXkS2d9iByi2gbFwlOUnaLM8Job2MY';
    var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    resolveTheClientLocAndResubmit(myLatlng,countryISOCodesPollsApplicableOn);
}
function resolveTheClientLocAndResubmit(myLatlng,countryISOCodesPollsApplicableOn) {
    var notMatched = true;
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': myLatlng },
        function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var country = "";
                    for (var i = 0; i < results[0].address_components.length; i++) {
                        var addr = results[0].address_components[i];
                        if (addr.types[0] == 'country'){
                            country = addr.short_name;
                            for (var j = 0; j < countryISOCodesPollsApplicableOn.length; j++) {
                               if(country==countryISOCodesPollsApplicableOn[j]){
                                   $("#resolvedClientLocation").val(country);
                                   notMatched = false;
                               }
                            }
                            if(notMatched){
                                swal({ html:true, title:'You can\'t vote', text:'Your location is not mataching with any of the locaions this poll is runningg on',type:'error'})}
                            else
                                $("#updateThePollData").submit();
                        }

                        //else if (addr.types[0] == 'street_address') // address 1
                        //    address = address + addr.long_name;
                        //else if (addr.types[0] == 'establishment')
                        //    address = address + addr.long_name;
                        //else if (addr.types[0] == 'route')  // address 2
                        //    address = address + addr.long_name;
                        //else if (addr.types[0] == 'postal_code')       // Zip
                        //    zip = addr.short_name;
                        //else if (addr.types[0] == ['administrative_area_level_1'])       // State
                        //    state = addr.long_name;
                        //else if (addr.types[0] == ['locality'])       // City
                        //    city = addr.long_name;
                    }
                }
            }
        });
}


function confirmDel(){
    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this poll again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: true,   closeOnCancel: true },
        function(isConfirm){   if (isConfirm) {
            //window.open('/articles/'+$('#articleId').val()+'/delete');
            window.location = '/polls/'+$('#pollId').val()+'/delete';
            swal("Deleted!", "Your Poll has been deleted.", "success");   }
        else {     swal("Cancelled", "Your Poll is safe :)", "error");   } });
}
