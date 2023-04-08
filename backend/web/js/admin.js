

// if($('#car-model').val()) {
// 	updateSelect($('#car-model').val());
// }

$('#car-model').on('change', function() {
	updateSelect($(this).val())
});

$('#car-modification').on('change', function() {
	if($('#car-model').val() == 'model_y') {
		if($(this).val() == 'performance') {
			var opts = '';

			$.each({5: 5, 7:7}, function(key, val) {
				opts += '<option value="'+key+'">'+val+'</option>';
			});

			$('select#car-seats').html(opts);
			$('select#car-seats').removeAttr('disabled');
		} else {
			$('select#car-seats').html('');
			$('select#car-seats').val('');
			$('select#car-seats').attr('disabled', true);
		}
	}
})

$('#car-price_usd').on('change', function() {
	$('#car-price_rub').val(Math.ceil(usd_course * $(this).val()));
});

$('#car-price_nds_usd').on('change', function() {
	$('#car-price_nds_rub').val(Math.ceil(usd_course * $(this).val()));
});

$('#car-cash_usd').on('change', function() {
	$('#car-cash_rub').val(Math.ceil(usd_course * $(this).val()));
});

$('#car-leasing_usd').on('change', function() {
	$('#car-leasing_rub').val(Math.ceil(usd_course * $(this).val()));
});

function updateSelect(model_val) {
	$.each(data[model_val]['fields'], function(key, val) {
		var opts = '';
		if(data[model_val]['fields'][key] == "disabled") {
			$('select#car-'+key).html('');
			$('select#car-'+key).val('');
			$('select#car-'+key).attr('disabled', true);
		} else {	
			$.each(data[model_val]['fields'][key], function(key, val) {
				opts += '<option value="'+key+'">'+val+'</option>';
			});
			
			$('select#car-'+key).html(opts);
			$('select#car-'+key).removeAttr('disabled');
		}
	});
}