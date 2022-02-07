 	$(document).on('keyup','.search_new', function(){
    	if($(this).val()){
    		var _token	=	$('#csrfT').val();
    		$.ajax({
    			url		: 	$('#autocompleteUrl').val(),
    			method 	: 	"POST",
    			data 	: 	{query: $(this).val(), _token: _token},
    			success : 	function(data)
    			{
    				$('#suggestionList').fadeIn();
    				$('#suggestionList').html(data);
    			}
    		});
    	}
    	else{
    		$('#suggestionList').html('');
    	}
    });

    $(document).on('click','#suggestions li', function(){
    	$('#search_new').val($(this).text());
    	$('#suggestionList').html('');
    	//console.log($(this).text());
    	setTimeout(function(){ $(".btn-search").trigger("click"); }, 1000);
    });

	//archived event

	$(document).on('keyup','.search_arc', function(){
    	if($(this).val()){
    		var _token	=	$('#csrfT').val();
    		$.ajax({
    			url		: 	$('#autocompleteUrl').val(),
    			method 	: 	"POST",
    			data 	: 	{query: $(this).val(), _token: _token},
    			success : 	function(data)
    			{
    				$('#suggestionList').fadeIn();
    				$('#suggestionList').html(data);
    			}
    		});
    	}
    	else{
    		$('#suggestionList').html('');
    	}
    });

    $(document).on('click','#suggestions li', function(){
    	$('#search_arc').val($(this).text());
    	$('#suggestionList').html('');
    	//console.log($(this).text());
    	setTimeout(function(){ $(".btn-search").trigger("click"); }, 1000);
    });