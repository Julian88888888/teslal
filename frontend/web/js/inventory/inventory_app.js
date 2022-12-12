function update_catalogue() {
	$.ajax('/getcars', 
	{
	    // dataType: 'json', // type of response data
	    // timeout: 500,     // timeout milliseconds
	    success: function (data,status,xhr) {
	    	$('.tds-loader').removeClass('tds-loader--show');
	    	$('.results-container ').html(data);
	    },
	    error: function (jqXhr, textStatus, errorMessage) {
	    }
	});
}

update_catalogue();