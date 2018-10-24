var filter_year;
var records;
// these functions is used for the game
function check1() {
    var ans1 = 1916;
    var text;
    //getting input from question 1
    var myselect1 = document.getElementById("test1");
    var index1 = myselect1.selectedIndex;
    var value1 = myselect1.options[index1].value;
    // compare the in put the correct answer
    if (value1 == ans1) {
        text = "correct answer"
    } else {
        text = "your answer is not correct "
    }
    document.getElementById("demo1").innerHTML = text;
}
// this function is used for question 2
function check2() {
    var ans2 = 1915;
    //getting input from question 2
    var myselect2 = document.getElementById("test2");
    var index2 = myselect2.selectedIndex;
    var value2 = myselect2.options[index2].value;
    // compare the in put the correct answer
    if (value2 == ans2) {
        text = "correct answer"
    } else {
        text = "your answer is not correct "
    }
    document.getElementById("demo2").innerHTML = text;

}
// this function is used for question 3
function check3() {
    var ans3 = 1922;
    //getting input from question 3
    var myselect3 = document.getElementById("test3");
    var index3 = myselect3.selectedIndex;
    var value3 = myselect3.options[index3].value;
    // compare the in put the correct answer
    if (value3 == ans3) {
        text = "correct answer"
    } else {
        text = "your answer is not correct "
    }
    document.getElementById("demo3").innerHTML = text;
}
//this function is used for question 4
function check4() {
    var ans4 = 1925;
    //getting input from question 4
    var myselect4 = document.getElementById("test4");
    var index4 = myselect4.selectedIndex;
    var value4 = myselect4.options[index4].value;
    // compare the in put the correct answer
    if (value4 == ans4) {
        text = "correct answer"
    } else {
        text = "your answer is not correct "
    }
    document.getElementById("demo4").innerHTML = text;
}
//function implement validator


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
//function for audios
var audio;
var playlist;
var tracks;
var current;

init();

function init() {
    current = 0;
    audio = $('audio');
    playlist = $('#playlist');
    tracks = playlist.find('li a');
    len = tracks.length - 1;
    audio[0].volume = 1;
    audio[0].play();
    // audio will be played after user click
    playlist.find('a').click(function(e) {
        e.preventDefault();
        link = $(this);
        current = link.parent().index();
        run(link, audio[0]);
    });
    audio[0].addEventListener('ended', function(e) {
        current++;
        if (current == len) {
            current = 0;
            link = playlist.find('a')[0];
        } else {
            link = playlist.find('a')[current];
        }
        run($(link), audio[0]);
    });
}

function run(link, player) {
    player.src = link.attr('href');
    par = link.parent();
    par.addClass('active').siblings().removeClass('active');
    audio[0].load();
    audio[0].play();
}