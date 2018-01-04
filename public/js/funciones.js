$(document).ready(function(){

	let test = $(".like").text();	

	//click event 
	$(".like").click(function(event){

		event.preventDefault();

		let link = $(this);
		let url = link.attr('href');
		console.log(url)

		$.get(url, function(data){
			console.log(data.likes);
			link.text(data.likes);
		});
	});

});

