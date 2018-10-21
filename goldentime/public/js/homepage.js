var filter_year;
var records;
// this function is used for the game
function check()
{
	//getting input from question 1
  var myselect1=document.getElementById("test1");
  var index1=myselect.selectedIndex ;
  var value1 = myselect.options[index].value;
  //getting input from question 2
  var myselect2=document.getElementById("test2");
  var index2=myselect2.selectedIndex ;
  var value2 = myselect2.options[index].value;
  //getting input from question 3
  var myselect3 = document.getElementById("test3");
  var index3 = myselect3.selectedIndex;
  var value3 = myselect3.options[index].value;
  //getting input from question 4
  var myselect4 = document.getElementById("test4");
  var index4 = myselect4.selectedIndex;
  var value4 = myselect4.options[index].value;
  // compare the in put the correct answer
  if(value == 2016){
	alert("great, it is year " + value);
  }else{
	alert("no, it is year 2016");
  }
}
//function check-result
function ResultCheck(value1,value2,value3,value4){
  var ans1 = 1916;
  var ans2 = 1915;
  var ans3 = 1922;
  var ans4 = 1925;
  if(value1 == ans1 && value2 == ans2 && value3 == ans3 && value4 == ans4){
    $("#showModal").click(function() {
  $(".modal").addClass("is-active");
    });

    $(".modal-close").click(function() {
       $(".modal").removeClass("is-active");
    });
  }
}
//=================================================================================================================================================
function getYear(year) {
    if (year) {
        return year.match(/\d{4}/); // This is regex (https://en.wikipedia.org/wiki/Regular_expression)
    }
}

function iterateRecords() {
    var temp_array = new Array();
    $("#list").html("");
    $.each(records, function(recordKey, recordValue) {

        var recordTitle = recordValue["dc:title"];
        var recordYear = getYear(recordValue["dcterms:temporal"]);
        var recordImage = recordValue["1000_pixel_jpg"];
        var recordDescription = recordValue["dc:subject"];

        // declare a variable to make a filter
        if (recordTitle && recordYear == filter_year && recordImage && recordDescription) {
            $("#list").append(
                $('<div>').addClass("columns").append(
                    $('<div>').addClass("column"),
                    $('<div>').addClass("frame").append(
                        $('<img>').attr("src", recordImage).addClass("img-setup"),
                        $('<p>').append(recordTitle).addClass("text-frame"),
                        console.log(recordImage), //we use this to test images in the console
                    ),
                    $('<div>').addClass("column"),
                )
            );

        }
        return recordKey < 100; //we loop the record for less than 100 times and then break
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
            records = data.result.records;
        }
    });

});

//-------------------------------------------------------------------------------------------------------
//below is the funtion for slider
var sheet = document.createElement('style'),
    $rangeInput = $('.range input'),
    prefs = ['webkit-slider-runnable-track', 'moz-range-track', 'ms-track'];

document.body.appendChild(sheet);

var getTrackStyle = function(el) {
    var curVal = el.value,
        val = (curVal - 1) * 16.666666667,
        style = '';

    // Set active label
    $('.range-labels li').removeClass('active selected');

    var curLabel = $('.range-labels').find('li:nth-child(' + curVal + ')');

    curLabel.addClass('active selected');
    curLabel.prevAll().addClass('selected');
    // get year from labels
    filter_year = curLabel.text();

    iterateRecords();


    // Change background gradient
    for (var i = 0; i < prefs.length; i++) {
        style += '.range {background: linear-gradient(to right, #595959 0%, #595959 ' + val + '%, #fff ' + val + '%, #fff 100%)}';
        style += '.range input::-' + prefs[i] + '{background: linear-gradient(to right, #595959 0%, #595959 ' + val + '%, #595959 ' + val + '%, #595959 100%)}';
    }

    return style;
}

$rangeInput.on('input', function() {
    sheet.textContent = getTrackStyle(this);
});

// Change input value on label click
$('.range-labels li').on('click', function() {
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
