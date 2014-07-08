(function($){

	/**
	 * Fired upon initialization of ACF field
	 *
	 * @since	1.0.0
	 *
	 * @param	jQuery selection 	$table		the jQuery element which contains the ACF field
	 */
	function initialize_field( $costing_table_field ) {

		// table elements
		var	table = $costing_table_field.find('.acf-costing_table'),
			thead = $(table).find('thead'),
			tbody = $(table).find('tbody'),
			tfoot = $(table).find('tfoot'),
			totals = $(tfoot).find('.acf-costing_totals');

		// add day row
		$('.acf-costing_table-add_day').on('click', function() {

			var row = '',
				counter = $(tbody).find('tr').length + 1;
			// row cells html
			row += '<tr class="costing_day costing_day_' + counter + '">';
				row += '<td class="day_count">' 	+ counter + '</td>';
				row += '<td class="day_base">       <input type="number" class="day_' + counter + '_base" /></td>';
				row += '<td class="day_staff">      <input type="number" class="day_' + counter + '_staff" /></td>';
				row += '<td class="day_tour_1">     <input type="number" class="day_' + counter + '_tour_1" /></td>';
				row += '<td class="day_tour_2">     <input type="number" class="day_' + counter + '_tour_2" /></td>';
				row += '<td class="day_tour_3">     <input type="number" class="day_' + counter + '_tour_3" /></td>';
				row += '<td class="day_tour_4">     <input type="number" class="day_' + counter + '_tour_4" /></td>';
				row += '<td class="day_tour_5-6">   <input type="number" class="day_' + counter + '_tour_5-6" /></td>';
				row += '<td class="day_tour_7-8">   <input type="number" class="day_' + counter + '_tour_7-8" /></td>';
				row += '<td class="day_tour_9-12">  <input type="number" class="day_' + counter + '_tour_9-12" /></td>';
				row += '<td class="day_tour_13-24"> <input type="number" class="day_' + counter + '_tour_13-24" /></td>';
				row += '<td class="day_tour_25-39"> <input type="number" class="day_' + counter + '_tour_25-39" /></td>';
				row += '<td class="day_meals">      <input type="number" class="day_' + counter + '_meals" /></td>';
				row += '<td class="day_tickets">    <input type="number" class="day_' + counter + '_tickets"  /></td>';
				row += '<td class="day_misc">       <input type="number" class="day_' + counter + '_misc" /></td>';
			row += '</tr>';

			$(tbody).append(row);

			if (counter > 1) {

				var prev = counter -1,
					prevRow = $('.costing_day_' + prev),
					newRow = $('.costing_day_' + counter),
					numCols = $(newRow).find('td').length -1;

				// copies the values of old row cells inputs into new ones appended
				for (var i = 0 ; i <= numCols ; i++) {

					newRow.find('td input').eq(i).val(prevRow.find('td input').eq(i).val());

				}

			}
			++counter;

		}); // add day

		// remove day row
		$('.acf-costing_table-remove_day').on('click', function() {

			$(tbody).find('tr:last').remove();

		}); // remove day

		/**
		 * Calculate costs
		 * Calculates costing table inputs and fills table tfoot input cells
		 *
		 * @since	1.0.0
		 */
		function ACF_costing_table_calculate() {

			var cells = $(tbody).find('tr'),
				inputs = $(cells).find('input');

			// get all the inputs in tbody rows
			inputs.each(function() {

				// assign 0 to empty or invalid inputs
				if ( $(this).val() == "" || isNaN($(this).val()) ) {
					$(this).val('0');
				}

			});

			// costing data
			var base = 0, staff = 0,
				tour_1 = 0, tour_2 = 0, tour_3 = 0, tour_4 = 0, tour_5to6 = 0, tour_7to8 = 0, tour_9to12 = 0, tour_13to24 = 0, tour_25to39 = 0,
				meals = 0, tickets = 0, misc = 0;

			$(cells).find( 'td.day_base input'			).each(function(){ base 		+= Number($(this).val()) });
			$(cells).find( 'td.day_staff input'			).each(function(){ staff 		+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_1 input'		).each(function(){ tour_1 		+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_2 input'		).each(function(){ tour_2 		+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_3 input'		).each(function(){ tour_3 		+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_4 input'		).each(function(){ tour_4 		+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_5-6 input'		).each(function(){ tour_5to6 	+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_7-8 input'		).each(function(){ tour_7to8 	+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_9-12 input'	).each(function(){ tour_9to12 	+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_13-24 input'	).each(function(){ tour_13to24 	+= Number($(this).val()) });
			$(cells).find( 'td.day_tour_25-39 input'	).each(function(){ tour_25to39 	+= Number($(this).val()) });
			$(cells).find( 'td.day_meals input'			).each(function(){ meals 		+= Number($(this).val()) });
			$(cells).find( 'td.day_tickets input'		).each(function(){ tickets 		+= Number($(this).val()) });
			$(cells).find( 'td.day_misc input'			).each(function(){ misc 		+= Number($(this).val()) });

			// fill target inputs in table footer with calculations
			$(totals).find( '.base_total_var'   ).val( parseFloat( meals + tickets + misc ) );
			$(totals).find( '.base_total_1'     ).val( parseFloat( base + staff + tour_1 ) );
			$(totals).find( '.base_total_2'     ).val( parseFloat( base + staff + tour_2 ) );
			$(totals).find( '.base_total_3'     ).val( parseFloat( base + staff + tour_3 ) );
			$(totals).find( '.base_total_4'     ).val( parseFloat( base + staff + tour_4 ) );
			$(totals).find( '.base_total_5-6'   ).val( parseFloat( base + staff + tour_5to6 ) );
			$(totals).find( '.base_total_7-8'   ).val( parseFloat( base + staff + tour_7to8 ) );
			$(totals).find( '.base_total_9-12'  ).val( parseFloat( base + staff + tour_9to12 ) );
			$(totals).find( '.base_total_13-16' ).val( parseFloat( base + staff + tour_13to24 ) );
			$(totals).find( '.base_total_17-20' ).val( parseFloat( base + staff + tour_13to24 ) );
			$(totals).find( '.base_total_21-24' ).val( parseFloat( base + staff + tour_13to24 ) );
			$(totals).find( '.base_total_25-34' ).val( parseFloat( base + staff + tour_25to39 ) );
			$(totals).find( '.base_total_35-39' ).val( parseFloat( base + staff + tour_25to39 ) );

		}

		/**
		 * Make costing table JSON
		 * Creates the JSON object to store all the field data in one single ACF value
		 *
		 * @since	1.0.0
		 */
		function ACF_costing_table_make_json() {

			// JSON keys to populate rows (per_day) or obtain final costing prices (finals)
			var keys = {};
				keys.finals = [];
				keys.per_day = [];
			var costing = {};
				costing.per_day = [];
				costing.finals = {};
			// table row data
			var days = $(tbody).find('tr');
			// the hidden input where the ACF field value will be stored
			var output = $costing_table_field.find('.acf-costing_table-output input');

			tfoot.find('tr').eq(1).find('th').each(function(i,th) {

				var $th = $(th);
				keys.finals.push($th.data('field'));

			});

			tfoot.find('tr').last().find('th input').each(function(i,input) {

				var $input = $(input);
				costing.finals[keys.finals[i]] = $input.val();

			});

			thead.find('tr').last().find('th').each(function(i,th) {

				var $th = $(th);
				if ( i > 0 ) {
					keys.per_day.push($th.data('field'));
				}

			});

			days.each(function(i,tr) {

				var obj = {};
				$(tr).find('td input').each(function(i,input) {

					var $input = $(input);
					obj[keys.per_day[i]] = $input.val();

				});

				costing.per_day.push(obj);

			});

			output.val(JSON.stringify(costing));
		}

		// calculate costings trigger on button click
		$( '.acf-costing_table-calc' ).on( 'click', function() {

			ACF_costing_table_calculate();
			ACF_costing_table_make_json();

		});

		// fire the json builder function also in the event an admin manually edits the totals inputs
		totals.find( 'input' ).on( 'change', function() {

			 ACF_costing_table_make_json();

		});

	}

	// ACF stuff
	if( typeof acf.add_action !== 'undefined' ) {

		/**
		 * Event triggered when page is loaded or new DOM elements are created by ACF
		 *
		 * @param	jQUery selection 	$el		the jQuery element which contains the ACF fields
		 *
		 * @since	1.0.0
		 */
		acf.add_action('ready append', function( $el ){

			// search $el for fields of type 'costing_table'
			acf.get_fields( { type : 'costing_table' }, $el ).each( function() {

				initialize_field( $(this) );

			});

		});

	}
	
})(jQuery);