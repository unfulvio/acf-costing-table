## Costing Table field for Advanced Custom Fields

This [WordPress](http://www.wordpress.org/) plugin extends [Advanced Custom Fields](http://www.advancedcustomfields.com) 5.x+ with a new field called "Costing Table".

Used by the author's for personal projects and company projects in the travel industry that require tabular data calculations for determining the cost of travel packages products, similar to that of a spreadsheet, but inside WordPress and using Advanced Custom Fields framework.
Field data is stored as an object and redistributed across the backend table cells via javascript. By retrieving the field using `get_field( $field_name, $post_id )` function which ships witch ACF, it will return an object with table calculations and totals.

To install copy to WordPress plugins directory and then activate from the plugins dashboard inside your WordPress admin area. Advanced Custom Fields needs to be installed and activated first.

No support or documentation is offered for this plugin. It is not designed to work with Advanced Custom Fields version 3.x or 4.x.
