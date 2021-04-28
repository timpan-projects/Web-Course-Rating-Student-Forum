console.log("notice js imported");
var listOpened = false;

$(document).ready(function(){
	console.log($(".notice-num").text().length)
	if ($(".notice-num").text().length != 0){
		$(".notice-num").css("display", "block");
	}
});

$('.notice-btn').click(function(){
	if(listOpened){
		$('.notice-list').animate({height:'0'});
	}
	else{
		$('.notice-list').animate({height:'500'});
	}
	listOpened = !listOpened;
});