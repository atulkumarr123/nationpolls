$(document).ready(function(){
    var createdAt = moment($('#createdAt').val()).add('days', $('#pollDuration').val());
    $('#simple_timer').syotimer({
        year: createdAt.year(),
        month: createdAt.month()+1,// getMonth returns the value in the range of 0-11
        day: createdAt.date(),
        hour: createdAt.hours(),
        minute: createdAt.minutes(),
    });
    //$('#simple_timer').syotimer({
    //    year: 2016,
    //    month: 5,// getMonth returns the value in the range of 0-11
    //    day: 18,
    //    hour: 2,
    //    minute: 20,
    //});
});
