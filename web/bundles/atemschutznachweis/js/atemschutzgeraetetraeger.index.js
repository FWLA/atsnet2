/*
 * author: Benjamin Ihrig
 * system: ATS.net 2
 * bundle: AtemschutzNachweisBundle
 */

$(function() {
	
	$( ".action_menu" ).menu();
	
	$( "#atsgt_table" ).tablesorter({
		headers: {
			4: {
				sorter: false
			},
			5: {
				sorter: false
			}
		},
		sortList: [[0,0], [1,0]]
	});

	$( "a.status" ).each(function() {
		$(this).click(function(event) {
			event.preventDefault();
			var targetUrl = $(this).attr('href');

			var f = $(document.createElement('form'));
			f.attr('action', targetUrl);
			f.attr('method', 'post');
			f.submit();
		});
	});
	
	$( "a.delete_confirm" ).each(function() {
		$(this).click(function(event) {
			event.preventDefault();
			var targetUrl = $(this).attr('href');

			var dialog = $(document.createElement('div'));
			dialog.html('Wollen Sie den Atemschutzgeräteträger wirklich löschen?');
			dialog.dialog({
				title: 'Atemschutzgeräteträger löschen',
				modal: true,
				resizable: false,
				draggable: false,
				closeOnEscape: true,
				width: 500,
				buttons: {
					'Ja': function() {
						var f = document.createElement('form');
						$(f).attr('action', targetUrl);
						$(f).attr('method', 'post');
						document.body.appendChild(f);
						$(f).submit();
						document.body.removeChild(f);
					},
					'Nein': function() {
						$(this).dialog('close');
					}
				}
			});
		});
	});
});