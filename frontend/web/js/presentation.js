$('.orderCar .getPresentation').click(function(e) {
	var url_params = '?model='+$('input[name=price]:checked').data('model')+'&modification='+$('input[name=price]:checked').data('modification')+'&body_color='+$('input[name=paint]:checked').data('state')+'&interior_color='+$('input[name=Interior]:checked').data('state')+'&disks='+$('input[name=wheels]:checked').data('size');
	url_params += '&cash_usd='+$('.tabPrices__currency.usd span').text().replace(/[^0-9]/gi, '');
	url_params += '&cash_rub='+$('.tabPrices__currency.ruble span').text().replace(/[^0-9]/gi, '');
	$('.orderCar .getPresentation').attr("href", '/presentationdesign'+url_params);
	return true;
})

// function updateHref() {
// 	console.log(tabPricesRuble.textContent)
// 	var url_params = '?model='+$('input[name=price]:checked').data('model')+'&modification='+$('input[name=price]:checked').data('modification')+'&body_color='+$('input[name=paint]:checked').data('state')+'&interior_color='+$('input[name=Interior]:checked').data('state')+'&disks='+$('input[name=wheels]:checked').data('size');
// 	url_params += '&price_usd='+$('.tabPrices__currency.usd span').text().replace(/[^0-9]/gi, '');
// 	url_params += '&price_rub='+$('.tabPrices__currency.ruble span').text().replace(/[^0-9]/gi, '');
// 	$('.orderCar .getPresentation').attr("href", '/presentationdesign'+url_params)
// }

// updateHref();

// $('input[name=price], input[name=paint], input[name=Interior], input[name=wheels]').on('click', updateHref);
// $('.tabPrices__currency.ruble span, .tabPrices__currency.usd span').on('change', updateHref);
