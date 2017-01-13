$(document).ready(function(){
	var settings = {
	  "async": true,
	  "crossDomain": true,
	  "url": "https://api.themoviedb.org/3/configuration?api_key=%3C%3C0f83568cb022f28816a16308dcc1371c%3E%3E",
	  "method": "GET",
	  "headers": {},
	  "data": "{}"
	}

	$.ajax(settings).done(function (response) {
	  console.log(response);
	});

	var genres=$('#genres').text();
	console.log(genres);
});