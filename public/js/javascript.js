
$(document).ready(function() {
	var popupBtn = $("#login-open"),
		popupModul = $("#popup-login");

    popupBtn.click(function(e) { // ouvrir Popup
		e.preventDefault();
		popupModul.addClass('open');
    }); 
	popupModul.click(function(e) { // fermer Popup
		if( $(e.target).is(popupModul) ) {
			popupModul.removeClass('open');
		}
	});
});