/*
 * author: Benjamin Ihrig
 * system: ATS.net 2
 * bundle: AtemschutzCoreBundle
 */

$(function() {
	$( ".action_menu" ).menu();
	
	$( "#organisation_table" ).tablesorter({
		headers: {
			6: {
				sorter: false
			}
		},
		sortList: [[0,0]]
	});
	
	$( "a.delete" ).each(function() {
		$(this).click(function(event) {
			event.preventDefault();
			var targetUrl = $(this).attr('href');

			var dialog = $(document.createElement('div'));
			dialog.html('Wollen Sie die Organisation wirklich löschen?');
			dialog.dialog({
				title: 'Organisation löschen',
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