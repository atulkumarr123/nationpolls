$(document).ready(function() {
    $('#alertDiv').not('.alert-important').delay(4000).slideUp(500);
    navbarItemsHighlighter();
    locationMismatchHandler();
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
        if($('#locationMismatchData').val()!=null){
            var polledData = JSON.parse($('#locationMismatchData').val());
            var optionToBeSelected = polledData[0].optionToBeSelected;
            var locationMismatch = polledData[1].locationMismatch;
            var countriesPollsApplicableOn = polledData[2].countriesPollsApplicableOn;
            $('#'+optionToBeSelected).prop("checked", true);
            if(locationMismatch=='unMatched'){
                var title = 'This Poll is running only in the following locations:';
                swal({ html:true, title:'', text:title+'<br><b>'+countriesPollsApplicableOn+'</b><br><br>'+'Please share your location'},
                function(){
                    getLocation();
                });
            }
        }
    });
}
function getLocation() {
    var geolocation = navigator.geolocation;
    navigator.geolocation.getCurrentPosition(showPosition);
}
function showPosition(position) {
    //window.location = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&key=AIzaSyDG7HXkS2d9iByi2gbFwlOUnaLM8Job2MY';
    var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    getLatLongDetail(myLatlng);
}
function getLatLongDetail(myLatlng) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': myLatlng },
        function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = "", city = "", state = "", zip = "", country = "";
                    for (var i = 0; i < results[0].address_components.length; i++) {
                        var addr = results[0].address_components[i];
                        // check if this entry in address_components has a type of country
                        if (addr.types[0] == 'country')
                            country = addr.long_name;
                        else if (addr.types[0] == 'street_address') // address 1
                            address = address + addr.long_name;
                        else if (addr.types[0] == 'establishment')
                            address = address + addr.long_name;
                        else if (addr.types[0] == 'route')  // address 2
                            address = address + addr.long_name;
                        else if (addr.types[0] == 'postal_code')       // Zip
                            zip = addr.short_name;
                        else if (addr.types[0] == ['administrative_area_level_1'])       // State
                            state = addr.long_name;
                        else if (addr.types[0] == ['locality'])       // City
                            city = addr.long_name;
                    }
                    alert('City: '+ city + '\n' + 'State: '+ state + '\n' + 'Zip: '+ zip+ '\n' + 'country: '+ country);
                }
            }
        });
}
