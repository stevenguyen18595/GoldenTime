function getYear(year) {
    if (year) {
        return year.match(/[\d]{1}/); // This is regex (https://en.wikipedia.org/wiki/Regular_expression)
    }
}

function iterateRecords(data) {
    var temp_array = new Array();
    console.log(data);
    $.each(data.result.records, function(recordKey, recordValue) {

        var recordTitle = recordValue["dc:title"];
        var recordYear = getYear(recordValue["dcterms:temporal"]);
        var recordImage = recordValue["150_pixel_jpg"];
        var recordDescription = recordValue["dc:subject"];

        // declare a variable to make a filter
        var filter_title = "Australia (ship)";
        if (recordTitle == filter_title && recordYear && recordImage && recordDescription) {
            $("#list").append(
                $('<div>').addClass("columns").append(
                    $('<div>').addClass("column"),
                    $('<div>').addClass("frame").append(
                        $('<img>').attr("src", recordImage).addClass("img-setup"),
                    ),
                    $('<div>').addClass("column"),
                )
            );

        }
    });


}
// function to connect with QSL dataset api
$(document).ready(function() {

    var data = {
        resource_id: "9913b881-d76d-43f5-acd6-3541a130853d",
        limit: 2650
    }

    $.ajax({
        url: "https://data.gov.au/api/3/action/datastore_search",
        data: data,
        dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
        cache: true,
        success: function(data) {
            iterateRecords(data);
        }
    });

});
//below is the funtion for slider
function createColor(step) {
    $(".ui-slider-range").css("background-color", grey);
}
// do something with slider
$(function() {
    $("#timeline").slider({
        disabled: false, // Can be true to disable
        value: 10,
        min: 0,
        step: 100,
        max: 100,
        change: createColor,
        slide: function(event, ui) {
            createColor(ui.value);
        }
    });
});
//function make scroll to top button
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}