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
						if(data.count_like == 0)
							like.html("<i class='fa fa-thumbs-up' aria-hidden='true'></i> Me gusta");
						else
							like.html("<i class='fa fa-thumbs-up' aria-hidden='true'></i> Me gusta"+" "+data.count_like);
					}
					else{
						if(data.count_like == 0)
							like.html("<i class='fa fa-thumbs-up' aria-hidden='true'></i> Me gusta");
						else
							like.html("<i class='fa fa-thumbs-o-up' aria-hidden='true'></i> Me gusta"+" "+data.count_like);
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
						if(data.count_like == 0)
							dislike.html("<i class='fa fa-thumbs-o-up' aria-hidden='true'></i> Me gusta");
						else
							dislike.html("<i class='fa fa-thumbs-o-up' aria-hidden='true'></i> Me gusta" +" "+data.count_like);
					}
					else {
						if(data.count_like == 0)
							dislike.html("<i class='fa fa-thumbs-up' aria-hidden='true'></i> Me gusta");
						else
							dislike.html("<i class='fa fa-thumbs-o-up' aria-hidden='true'></i> Me gusta"+" "+data.count_like);
					}	
					console.log(data);
				}
			});
		});

});

