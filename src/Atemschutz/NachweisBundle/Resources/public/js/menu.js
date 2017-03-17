/*
 * author: Benjamin Ihrig
 * system: ATS.net 2
 * bundle: AtemschutzNachweisBundle
 */

$(function() {
	
	$( "a#menu_report_nachweis" ).click(function(event) {
		event.preventDefault();
		var target = $(this).attr('href');
		var dialog = $(document.createElement('div'));
		
		dialog.dialog({
			title: 'Nachweis Suchen',
			autoOpen: false,
			modal: true,
			buttons: {
				'Nachweis Suchen': function() {
					var f = $(this).children('form').get(0);
					document.body.appendChild(f);
					$(f).submit();
					document.body.removeChild(f);
					$(this).dialog('close');
				},
				'Abbrechen': function() {
					$(this).dialog('close');
				}
			}
		});
		
		dialog.load(target).dialog('open');
	});
	
	$( "a#menu_report_year" ).click(function(event) {
		event.preventDefault();
		var target = $(this).attr('href');
		var dialog = $(document.createElement('div'));
		
		dialog.dialog({
			title: 'Jahresstatistik',
			autoOpen: false,
			modal: true,
			buttons: {
				'Statistik berechnen': function() {
					var f = $(this).children('form').get(0);
					document.body.appendChild(f);
					$(f).submit();
					document.body.removeChild(f);
					$(this).dialog('close');
				},
				'Abbrechen': function() {
					$(this).dialog('close');
				}
			}
		});
		
		dialog.load(target).dialog('open');
	});
});