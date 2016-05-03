jQuery(document).ready(function ($) {
	var infoModal = $('.request-info-modal');
	var siteContainer = $('.site-container');
	var modalContainer = $('.modal-container');
	var closeModalBtn = modalContainer.find('.close-info-modal, .close-info-modal-mobile');
	var callToAction = $('.call-to-action');
	var calMth = $('.calendar-month');
	var bedroomOpt = $('.bedroom-option');

	var currentDate = new Date().toDateString();
	var dateVals = currentDate.split(' ');
	var month = dateVals[1];

	var calYear = $('.calendar-year').find('input');
	var currentYear = parseInt(dateVals[3]);

	calYear.val(currentYear.toString());
	bedroomOpt.first().attr('checked', 'checked').addClass('selected');

	calMth.find('label').each(function () {
		var parentListItem = $(this).parent('li');

		if ($(this).html() === month.toLowerCase()) {
			parentListItem.addClass('selected');
			parentListItem.find('input[type=radio]').attr('checked', 'checked');
		}
	});

	callToAction.on('click', function (event) {
		infoModal.addClass('get-info');
		modalContainer.addClass('get-info');
		siteContainer.addClass('show-modal');
	});

	closeModalBtn.on('click', function () {
		infoModal.removeClass('get-info');
		modalContainer.removeClass('get-info');
		siteContainer.removeClass('show-modal');
	});

	calMth.on('click', function () {
		calMth.removeClass('selected');
		$(this).addClass('selected');
	});

	bedroomOpt.on('click', function () {
		bedroomOpt.removeClass('selected');
		$(this).addClass('selected');
	});

	$('.previous-year').on('click', function () {
		currentYear -= 1;
		calYear.val(currentYear.toString());
	});

	$('.next-year').on('click', function () {
		currentYear += 1;
		calYear.val(currentYear);
	});

	$('.subcription-form').on('submit', function () {
		$('input[type=text]').val("");
		calYear.val(currentYear.toString());
	});
});