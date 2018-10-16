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

//-------------------------------------------------------------------------------------------------------
//below is the funtion for slider
var sheet = document.createElement('style'),
  $rangeInput = $('.range input'),
  prefs = ['webkit-slider-runnable-track', 'moz-range-track', 'ms-track'];

document.body.appendChild(sheet);

var getTrackStyle = function (el) {
  var curVal = el.value,
      val = (curVal - 1) * 16.666666667,
      style = '';

  // Set active label
  $('.range-labels li').removeClass('active selected');

  var curLabel = $('.range-labels').find('li:nth-child(' + curVal + ')');

  curLabel.addClass('active selected');
  curLabel.prevAll().addClass('selected');

  // Change background gradient
  for (var i = 0; i < prefs.length; i++) {
    style += '.range {background: linear-gradient(to right, #595959 0%, #595959 ' + val + '%, #fff ' + val + '%, #fff 100%)}';
    style += '.range input::-' + prefs[i] + '{background: linear-gradient(to right, #595959 0%, #595959 ' + val + '%, #595959 ' + val + '%, #595959 100%)}';
  }

  return style;
}

$rangeInput.on('input', function () {
  sheet.textContent = getTrackStyle(this);
});

// Change input value on label click
$('.range-labels li').on('click', function () {
  var index = $(this).index();

  $rangeInput.val(index + 1).trigger('input');

});
//------------------------------------------------------------------------------------------
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
