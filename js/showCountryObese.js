$(document).ready(function () {
        
    $("#idCountry").on('change', displayResults);
    
    function displayResults() {
        $.ajax({
            type: "GET",
            url: "getCountryDetails.php",
            data: {
              id: $("#idCountry option:selected").val()  
            },
            cache: false,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                
                $("#obeseTable tbody").html("");
                if (!response.isEmpty) {
                    var statistics = response.statistics;
                    console.log(statistics);
                    
                    $("#obeseTable tbody").append(`<tr><td>${statistics.population}</td><td>${statistics.obese}</td></tr>`);
                }

            },
            error: function (obj, textStatus, errorThrown) {
                console.log(obj);
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        });
    }
    
    
});
