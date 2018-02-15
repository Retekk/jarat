$(document).ready(function(){
	var h = $(window).height();
	var fh = $("#mainfooter").height();
	var nh = $("#mainheader").height();
	
	var ih = h-(fh);
	
	$("#maincontent").css("min-height", ih+"px");
	$("#main-menu-container").css("min-height", ih+"px");
});