

$('#context').change(function(event){
	var context = event.target.value;
	$.get('/contribute/context_id/' + context, function(data){
		$('#category').empty();
		$.each(data, function(index,category){
			$('#category').append('<option value='+ category.id+'>' + category.catName+'</option>');
		});
	});
});
