/*
 * author: Benjamin Ihrig
 * system: ATS.net 2
 * bundle: AtemschutzNachweisBundle
 */

$.tablesorter.addParser({
	id: 'german_date',
	is: function(s) {
		return false;
	},
	format: function(s) {
		var offset = s.split(".");
		return parseInt((offset[2] + offset[1] + offset[0]));
	},
	type: 'numeric'
});

$(function() {
	$( "#atemschutzgeraetetraeger_accordion" ).accordion({
		heightStyle: 'content'
	});

	$( ".action_menu" ).menu();
	
	$( "#g26_table" ).tablesorter({
		headers: {
			2: {
				sorter: 'german_date'
			},
			3: {
				sorter: 'german_date'
			},
			4: {
				sorter: false
			}
		},
		sortList: [[3,1], [2,1]]
	});
	
	$( "#nachweis_table" ).tablesorter({
		headers: {
			0: {
				sorter: 'german_date'
			},
			4: {
				sorter: false
			}
		},
		sortList: [[0,1]]
	});
	
	$( "a.void_g26" ).each(function() {
		if($(this).parent().attr('class').indexOf("ui-state-disabled") == -1) {
			$(this).click(function(event) {
				event.preventDefault();
				var targetUrl = $(this).attr('href');
	
				var dialog = $(document.createElement('div'));
				dialog.html('Wollen Sie die G26 wirklich ungültig machen?');
				dialog.dialog({
					title: 'G26 ungültig machen',
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
		}
	});
	
	$( "a.delete_g26" ).each(function() {
		$(this).click(function(event) {
			event.preventDefault();
			var targetUrl = $(this).attr('href');

			var dialog = $(document.createElement('div'));
			dialog.html('Wollen Sie die G26 wirklich löschen?');
			dialog.dialog({
				title: 'G26 löschen',
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

	$( "a.delete_nachweis" ).each(function() {
		$(this).click(function(event) {
			event.preventDefault();
			var targetUrl = $(this).attr('href');

			var dialog = $(document.createElement('div'));
			dialog.html('Wollen Sie den Nachweis wirklich löschen?');
			dialog.dialog({
				title: 'Nachweis löschen',
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