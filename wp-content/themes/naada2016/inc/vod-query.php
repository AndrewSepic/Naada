<?php
// array of filters (field key => field name)
$GLOBALS['my_query_filters'] = array(
	//'field_5eed6c96d918c'	=> 'level',
	'field_5eed6d09d918d'	=> 'length',
	'field_5eed6d40d918e' => 'instructor',
	'field_5eed6d75d918f' => 'language'
);


// action
add_action('pre_get_posts', 'vod_pre_get_posts', 10, 1);

function vod_pre_get_posts( $query ) {

	// bail early if is in admin
	if( is_admin() ) return;


	// bail early if not main query
	// - allows custom code / plugins to continue working
	if( !$query->is_main_query() ) return;

	// get meta query
	$meta_query = $query->get('meta_query');
	$meta_query = array();


	// loop over filters
	foreach( $GLOBALS['my_query_filters'] as $key => $name ) {

		// continue if not found in url
		if( empty($_GET[ $name ]) ) {

			continue;

		}

		// get the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = explode(',', $_GET[ $name ]);

		// Log if you are on the VOD page
		if (is_post_type_archive('vod')):
		//	echo '<pre>' . var_export($value, true) . '</pre>';
		endif;

			// Append to meta query
    	$meta_query[] = array(
							'key'		=> $name,
	            'value'		=> $value,
	            'compare'	=> 'IN'
					);

	}

	// update meta query
	$query->set('meta_query', $meta_query);

	// Log if you are on the VOD page
	if (is_post_type_archive('vod')):
	//	echo '<pre>' . var_export($meta_query, true) . '</pre>';
	endif;


}


//Function to display featured Image
function vod_featured_image() {
  $vod_image = get_field('vod_image');

  if ( $vod_image ): ?>
    <img src="<?php echo $vod_image['url'];?>" class="vod-image" alt="<?php echo $vod_image['alt'];?>"/>
  <?php endif;
}
