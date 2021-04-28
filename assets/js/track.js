function onTrackClicked(number){
	var course_num = number;
	console.log(course_num);
	$.ajax({
        type: "POST",
        url: "update_track.php",
        data: {
            course_num: course_num,
        },
        success: function(result){}
    });
}

$(".track").on("click", function() {
    if ($(this).text().match("追蹤課程"))
        $(this).text("取消追蹤");
    else if ($(this).text().match("取消追蹤"))
        $(this).text("追蹤課程");
});

function onNoticeClicked(number){
    var course_num = number;
    console.log(course_num);
    $.ajax({
        type: "POST",
        url: "reset_unseen.php",
        data: {
            course_num: course_num,
        },
        success: function(result){}
    });
}