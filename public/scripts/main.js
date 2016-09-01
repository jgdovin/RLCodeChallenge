var starRating = $('#actualRating').html() / 5;
$('.starbox').starbox({
	average: starRating,
	changeable: false
});
$(".review-boxes .description").html(function(index, currentText) {
	if(currentText.length > 100) {
		return currentText.substr(0, 100) + '... \n\n <a href="#" data-toggle="tooltip" title="' + currentText + '">Read More</a>';
	}
	return currentText;
});
//lets enable tooltips for the read more sections
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});