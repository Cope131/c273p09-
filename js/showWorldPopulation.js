
$(document).ready(function () {
    
    $("#worldTable").hide();
    
    var data = [];
    var labels = [];
    
    $.ajax({
        type: "GET",
        url: "getStatistics.php",
        cache: false,
        dataType: "JSON",
        success: function (response) {
            console.log(response);

            if (!response.isEmpty) {
                var statistics = response.statistics;

                for (statistic of statistics) {
                    console.log(statistics);
                    data.push(statistic.population);
                    labels.push(`${statistic.country}`);
                }
            }
            console.log(data);
            console.log(labels);
            
            showBarChart();

        },
        error: function (obj, textStatus, errorThrown) {
            console.log(obj);
            console.log("Error " + textStatus + ": " + errorThrown);
        }
    });


    function showBarChart() {
        var barChart = new Chart($("#barChart"), {
            type: 'horizontalBar',
            data: {
                datasets: [{
                            data: data,
                            backgroundColor: "lightblue",
                            label: 'Population'
                        }],
                labels: labels
            },
            options: {
                responsive: true
            }
        });
    }

});
