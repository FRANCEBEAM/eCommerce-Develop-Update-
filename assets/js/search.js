$(document).ready(function() {

//Search product .searchInput
load_data();
	function load_data(query)
	{
		$.ajax({
			async: true,
			url:"livesearch.php",
			method:"post",
			data:{query:query},
			success:function(data){
				async = true,
				$('#item-list').html(data);
			}
		});
	}

	$('.searchInput').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data(search);
		}
	});
});
