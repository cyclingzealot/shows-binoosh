<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>    
<script type="text/javascript">                                         
var displayedUrl  = '';
 $(document).ready(function() {
	refresh();
	window.setInterval(refresh, 500);
 });
function refresh() {
	$.get("http://localhost/shows-binoosh/fetchThis.txt", function(data){
		var currentUrl = data;
		if(currentUrl != displayedUrl) {
			displayedUrl = currentUrl;
			$("#main").attr("src", displayedUrl);
			
		}
		displayLastRefresh();
	});
}

function displayLastRefresh() {
	var d = new Date();
	tstr = d.getHours() +':'+ d.getMinutes() +':'+ d.getSeconds();
	$('#feedback').text("Last refresh check: " + tstr);
}
	

function output(string) {
	var d = new Date();
	tstr = d.getHours() +':'+ d.getMinutes() +':'+ d.getSeconds();
	$('body').append("<p>"+ tstr + ": " +string+"</p>");
}
 </script>      
</head>
<body>
<div id="entier">
<?php
	$imagePath = file_get_contents('fetchThis.txt');
	echo "<img src=\"$imagePath\" id=\"main\">";
?>
<div id="feedback"></div>
</div>
</body>
</html>
