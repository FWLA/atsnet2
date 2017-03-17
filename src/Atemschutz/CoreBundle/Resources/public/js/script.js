/*
 * author: Benjamin Ihrig
 * system: ATS.net 2
 * bundle: AtemschutzCoreBundle
 */

$(function() {
	$( "#user_button" )
		.button()
		.click(function() {
		})
		.next()
			.button({
				text: false,
				icons: {
					primary: "ui-icon-triangle-1-s"
				}
			})
			.click(function() {
				var menu = $( this ).parent().next().show().position({
					my: "right top",
					at: "right bottom",
					of: this
				});
				$( document ).one( "click", function() {
					menu.hide();
				});
				return false;
			})
			.parent()
				.buttonset()
					.next()
						.hide()
						.menu();
	
	$( ".inline a" ).each(function() {
		var disabled = ($(this).attr("data-disabled") == "true");
		$(this).button({
			disabled: disabled
		});
	});
	$( ".inline a" ).tooltip({
			track: true
	});

	$( "input[type=submit]" ).button();

	$( "#menu>ul" ).menu();
});