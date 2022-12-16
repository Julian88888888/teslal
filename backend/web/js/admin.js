var data = {
	'model_s': {
		'fields': {
			'modification': {
				'model_s': 'Long Range', 
				'plaid': 'Plaid'
			},
			'body_color': {
				'white': 'Белый', 
				'black': 'Черный', 
				'dark_grey': 'Темно-серый', 
				'light_grey': 'Светло-серый', 
				'red': 'Красный',
				'blue': 'Синий'
			},
			'interior_color': {
				'grey': 'Серый', 
				'black': 'Черный', 
				'white': 'Белый', 
				'brown': 'Бежевый'
			},
			'year': {
				'2016': 2016,
				'2017': 2017,
				'2018': 2018,
				'2019': 2019,
				'2020': 2020,
				'2021': 2021,
				'2022': 2022,
				'2023': 2023
			}
		}
	},
	'model_x': {
		'fields': {
			'modification': {
				'model_x': 'Long Range', 
				'plaid': 'Plaid'
			},
			'body_color': {
				'white': 'Белый', 
				'black': 'Черный', 
				'dark_grey': 'Темно-серый', 
				'light_grey': 'Светло-серый', 
				'red': 'Красный',
				'blue': 'Синий'
			},
			'interior_color': {
				'grey': 'Серый', 
				'black': 'Черный', 
				'white': 'Белый', 
				'brown': 'Бежевый',
				'tan': 'Коричневый'
			},
			'year': {
				'2016': 2016,
				'2017': 2017,
				'2018': 2018,
				'2019': 2019,
				'2020': 2020,
				'2021': 2021,
				'2022': 2022,
				'2023': 2023
			}
		}
	},
	'model_y': {
		'fields': {
			'modification': {
				'long_range': 'Long Range', 
				'performance': 'Performance'
			},
			'body_color': {
				'white': 'Белый', 
				'black': 'Черный', 
				'light_grey': 'Серый',
				'red': 'Красный',
				'blue': 'Синий'
			},
			'interior_color': {
				'black': 'Черный', 
				'white': 'Белый'
			},
			'year': {
				'2020': 2020,
				'2021': 2021,
				'2022': 2022,
				'2023': 2023
			}
		}
	},
	'model_3': {
		'fields': {
			'modification': {
				'real_wheel_drive': 'Rear-Wheel drive',
				'long_range_awd': 'Long Range AWD', 
				'performance': 'Performance'
			},
			'body_color': {
				'white': 'Белый', 
				'black': 'Черный', 
				'dark_grey': 'Темно-серый', 
				'light_grey': 'Светло-серый', 
				'red': 'Красный',
				'blue': 'Синий'
			},
			'interior_color': {
				'black': 'Черный', 
				'white': 'Белый'
			},
			'year': {
				'2017': 2017,
				'2018': 2018,
				'2019': 2019,
				'2020': 2020,
				'2021': 2021,
				'2022': 2022,
				'2023': 2023
			}
		}
	},
	'cybertruck': {
		'fields': {
			'modification': {
				'single_motor': 'Single motor', 
				'dual_motor': 'Dual motor',
				'tri_motor': 'Tri motor',
				'four_motor': 'Four motor'
			},
			'body_color': {
				'grey': 'Серый',
			},
			'interior_color': {
				'black': 'Черный', 
			},
			'year': {
				'2022': 2022,
				'2023': 2023
			}
		}
	},
	'roadster': {
		'fields': {
			'modification': "disabled",
			'body_color': {
				'red': 'Красный',
			},
			'interior_color': {
				'white': 'Белый'
			},
			'year': {
				'2022': 2022,
				'2023': 2023
			}
		}
	}
}

if($('#car-model').val()) {
	updateSelect($('#car-model').val());
}

$('#car-model').on('change', function() {
	updateSelect($(this).val())
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