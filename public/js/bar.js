/**
 * Created by Atul on 5/14/2016.
 */
$(function () {
    var polledData = JSON.parse($('#polledData').val());
    var arrayPolledData = [];
    for(var i in polledData)
        arrayPolledData.push([i, polledData[i]]);
    $('#barChart').npcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            //text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Percentage(%)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>{point.y:.1f} %</b>'
        },
        series: [{
            name: 'Population',
            data: arrayPolledData,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]

    });
    //var chart = $('#barChart').npcharts();
    //alert(stringPolledData);
    //chart.series[0].setData([['Yes',2],['No',5],['It was always there',23],]);
    //$('#barChart').npcharts().redraw();
                            //[['Yes',2],['No',5],['It was always there',23],]
});

