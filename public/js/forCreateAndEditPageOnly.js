$(document).ready(function() {
    $('#category').select2({
        placeholder: 'Choose a category',
        minimumResultsForSearch: -1,
    });

    $('#options').select2({
        placeholder: 'Add atleast 2 options',
        tags: true,
        minimumInputLength: 1,
    });
    $('form').on('submit', function () {
        var minimum = 2;
        if ($("#options").select2('data').length >= minimum) {
            return true;
        } else {
            $('#validateOptions').show();
            return false;
        }
    })

    $('#geoloc').select2({
        placeholder: 'Choose a Geo Location',
        minimumResultsForSearch: -1,
    });
    showDivAndConstructSelect2();
});

function showDivAndConstructSelect2() {
    if ($('#geoloc').val() == '2') {
        $('#countryDiv').show();
        $('#countries').select2({
            placeholder: 'Enter Country/Countries',
            ajax: {
                dataType: 'json',
                url: 'http://nationpolls.com/countries',
                delay: 400,
                data: function (params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                },
            }
        });
}
        else{
        $('#countryDiv').hide();
        //$('#countries').val('');
    }
}
