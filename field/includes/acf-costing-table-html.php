<?php if ( isset( $field ) ) : ?>

	<div id="<?php echo $field['id'] ?>" class="costing_table">

		<?php

		// prepare saved data
		$data = (array) json_decode( $field['value'] );
		$days = isset( $data['per_day'] ) ? $data['per_day'] : '';
		$totals = isset( $data['finals'] ) ? $data['finals'] : '';

		?>

		<div class="acf-costing_table-buttons">
			<ul>
				<li><a class="acf-costing_table-add_day acf-button button" title="<?php _e( 'Add day', 'acf-costing_table' ); ?>">+</a>
				</li>
				<li>
					<a class="acf-costing_table-remove_day acf-button button" title="<?php _e( 'Remove last row', 'acf-costing_table' ); ?>">&ndash;</a>
				</li>
				<li>
					<a class="acf-costing_table-calc acf-button button button-primary" title="<?php _e( 'Warning! Any existing values will be overwritten!', 'acf-costing_table' ); ?>"><?php _e( 'Calculate', 'acf-costing_table' ); ?></a>
				</li>
			</ul>
		</div>

		<table class="acf-costing_table widefat acf-input-table">

			<thead>
				<tr>
					<th><small>#</small></th>
					<th colspan="2"><small><?php _e( 'Fixed costs', 'acf-costing_table' ); ?></small></th>
					<th colspan="9"><small><?php _e( 'Transportation costs per group of people', 'acf-costing_table' ); ?></small></th>
					<th colspan="3"><small><?php _e( 'Costs per individual', 'acf-costing_table' ); ?></small></th>
				</tr>
				<tr>
					<th data-field="day"><?php _e( 'Day', 'acf-costing_table' ); ?></th>
					<th data-field="base"><?php _e( 'Guides', 'acf-costing_table' ); ?></th>
					<th data-field="staff"><?php _e( 'Staff', 'acf-costing_table' ); ?></th>
					<th data-field="1">1</th>
					<th data-field="2">2</th>
					<th data-field="3">3</th>
					<th data-field="4">4</th>
					<th data-field="5">5-6</th>
					<th data-field="7">7-8</th>
					<th data-field="9">9-12</th>
					<th data-field="13">13-24</th>
					<th data-field="25">25-39</th>
					<th data-field="meals"><?php _e( 'Meals', 'acf-costing_table' ); ?></th>
					<th data-field="tickets"><?php _e( 'Entrances', 'acf-costing_table' ); ?></th>
					<th data-field="misc"><?php _e( 'Misc', 'acf-costing_table' ); ?></th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th colspan="15"><small><?php _e( 'Totals', 'acf-costing_table' ) ?></small></th>
				</tr>
				<tr>
					<th data-field="per_person" colspan="3"><?php _e( 'Per person', 'acf-costing_table' ); ?></th>
					<th data-field="1">1</th>
					<th data-field="2">2</th>
					<th data-field="3">3</th>
					<th data-field="4">4</th>
					<th data-field="5">5-6</th>
					<th data-field="7">7-8</th>
					<th data-field="9">9-12</th>
					<th data-field="13">13-16</th>
					<th data-field="17">17-20</th>
					<th data-field="21">21-24</th>
					<th data-field="25">25-34</th>
					<th data-field="35">34-39</th>
				</tr>
				<tr class="acf-costing_totals">
					<?php

					$base_var = isset( $totals->per_person ) ? $totals->per_person : '';
					$base_1 = isset( $totals->{strval('1')} ) ? $totals->{strval('1')} : 0;
					$base_2 = isset( $totals->{strval('2')} ) ? $totals->{strval('2')} : 0;
					$base_3 = isset( $totals->{strval('3')} ) ? $totals->{strval('3')} : 0;
					$base_4 = isset( $totals->{strval('4')} ) ? $totals->{strval('4')} : 0;
					$base_5 = isset( $totals->{strval('5')} ) ? $totals->{strval('5')} : 0;
					$base_7 = isset( $totals->{strval('7')} ) ? $totals->{strval('7')} : 0;
					$base_9 = isset( $totals->{strval('9')} ) ? $totals->{strval('9')} : 0;
					$base_13 = isset( $totals->{strval('13')} ) ? $totals->{strval('13')} : 0;
					$base_17 = isset( $totals->{strval('17')} ) ? $totals->{strval('17')} : 0;
					$base_21 = isset( $totals->{strval('21')} ) ? $totals->{strval('13')} : 0;
					$base_25 = isset( $totals->{strval('25')} ) ? $totals->{strval('25')} : 0;
					$base_35 = isset( $totals->{strval('35')} ) ? $totals->{strval('35')} : 0;

					?>
					<th colspan="3"><input type="number" class="base_total_var" value="<?php echo $base_var; ?>"></th>
					<th><input type="number" class="base_total_1" min="0" value="<?php echo $base_1; ?>" /></th>
					<th><input type="number" class="base_total_2" min="0" value="<?php echo $base_2; ?>" /></th>
					<th><input type="number" class="base_total_3" min="0" value="<?php echo $base_3; ?>" /></th>
					<th><input type="number" class="base_total_4" min="0" value="<?php echo $base_4; ?>" /></th>
					<th><input type="number" class="base_total_5-6" min="0" value="<?php echo $base_5; ?>" /></th>
					<th><input type="number" class="base_total_7-8" min="0" value="<?php echo $base_7; ?>" /></th>
					<th><input type="number" class="base_total_9-12" min="0" value="<?php echo $base_9; ?>" /></th>
					<th><input type="number" class="base_total_13-16" min="0" value="<?php echo $base_13; ?>" /></th>
					<th><input type="number" class="base_total_17-20" min="0" value="<?php echo $base_17; ?>" /></th>
					<th><input type="number" class="base_total_21-24" min="0" value="<?php echo $base_21; ?>" /></th>
					<th><input type="number" class="base_total_25-34" min="0" value="<?php echo $base_25; ?>" /></th>
					<th><input type="number" class="base_total_35-39" min="0" value="<?php echo $base_35; ?>" /></th>
				</tr>
			</tfoot>

			<tbody>
				<?php

				if ( is_array( $days ) ) :

					$count = 1;
					foreach ( $days as $day => $value ) :

						$row = '<tr class="costing_day costing_day_' . $count . '">';
							$row .= '<td class="day_count">' . $count . '</td>';
							$row .= '<td class="day_base">		<input type="number" class="day_' . $count . '_base" 	value="' . $value->base .'"></td>';
							$row .= '<td class="day_staff">		<input type="number" class="day_' . $count . '_staff" 	value="' . $value->staff . '"></td>';
							$row .= '<td class="day_tour_1">	<input type="number" class="day_' . $count . '_tour_1" 	value="' . $value->{strval('1')} . '"></td>';
							$row .= '<td class="day_tour_2">	<input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('2')} . '"></td>';
							$row .= '<td class="day_tour_3">	<input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('3')} . '"></td>';
							$row .= '<td class="day_tour_4">	<input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('4')} . '"></td>';
							$row .= '<td class="day_tour_5-6">	<input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('5')} . '"></td>';
							$row .= '<td class="day_tour_7-8">	<input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('7')} . '"></td>';
							$row .= '<td class="day_tour_9-12">	<input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('9')} . '"></td>';
							$row .= '<td class="day_tour_13-24"><input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('13')} . '"></td>';
							$row .= '<td class="day_tour_25-39"><input type="number" class="day_' . $count . '_tour_2" 	value="' . $value->{strval('25')} . '"></td>';
							$row .= '<td class="day_meals">		<input type="number" class="day_' . $count . '_meals" 	value="' . $value->meals . '"></td>';
							$row .= '<td class="day_tickets">	<input type="number" class="day_' . $count . '_tickets" value="' . $value->tickets . '"></td>';
							$row .= '<td class="day_misc">		<input type="number" class="day_' . $count . '_misc" 	value="' . $value->misc . '"></td>';
						$row .= '</tr>';

						echo $row;
						$count++;

					endforeach;

				endif;

				?>
			</tbody>

		</table>

		<div class="acf-costing_table-output">
			<input type="hidden" id="<?php echo $field[ 'name' ]; ?>" name="<?php echo $field[ 'name' ]; ?>" value="<?php echo esc_attr( $field[ 'value' ] ); ?>" />
		</div>

	</div>

<?php endif; ?>