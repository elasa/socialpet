$(document).ready(function(){
		
		$('.like').click(function(e){
			e.preventDefault();
			var like = $(this);
			var id = $(this).attr('id');
			var url = $(this).attr('href');
			var aux = like.text();

			$.ajax({
				url: url,
				type: 'get',
				data: {
					publication_id: id
				},
				success: function(data){
					if(data.token==0){
						like.text('No me gusta');
					}
					else{
						like.text('Me gusta');
					}
					console.log(data);
				}
			});
		});

		$('.dislike').click(function(e){
			e.preventDefault();
			var dislike = $(this);
			var id = $(this).attr('id');
			var url = $(this).attr('href');
			var aux = dislike.text();

			$.ajax({
				url: url,
				type: 'get',
				data: {
					publication_id: id
				},
				success: function(data){	
					if(data.token==1){
						dislike.text('Me gusta');
					}
					else {
						dislike.text('No me gusta');
					}
					console.log(data);
				}
			});
		});

});

