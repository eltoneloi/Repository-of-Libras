
$('#typeAccount').change(function(event){
	var value = event.target.value;
	if(value == 'common'){
		$('#formChangeable').hide();
		$('#institution').val('notSet');
		$('#lattes').val('notSet');
		$('#opcoes option').each(function() {
	      // se localizar a frase, define o atributo selected
	      	if($(this).text() == "notSet") {
	        	$(this).attr('selected', true);
	      	}
    	});
    }
	else{
			$('#formChangeable').show();
			$('#lattes').val('');
			$('#institution').val('');
			$('#opcoes option').each(function() {
	      // se localizar a frase, define o atributo selected
		      	if($(this).text() == "notSet") {
		        	$(this).attr('selected', true);
		      	}
			});
		}
});


$(document).ready(function(){
	if($('#typeAccount').val == "common"){
		$('#formChangeable').hide();
		$('#institution').val('notSet');
		$('#lattes').val('notSet');
		$('#opcoes option').each(function() {
	      // se localizar a frase, define o atributo selected
	      	if($(this).text() == "notSet") {
	        	$(this).attr('selected', true);
	      	}
    	});
	}
});