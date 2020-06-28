<?php /*
Template Name: VOD Archive
*/ ?>

<?php
// Add something after nav?
//add_action( 'genesis_after_header', 'naada_clinicBanner', 10 );

function output_vod() {

	// Create Filters ?>
	<div id="vod-filters">
		<h2>Filters <span class="arrow down-default"></span></h2>
		<div class="filters-wrap">
			<?php foreach( $GLOBALS['my_query_filters'] as $key => $name ):

				// get the field's settings without attempting to load a value
				$field = get_field_object($key, false, false);
				//var_dump($field);
				// set value if available
				if( isset($_GET[ $name ]) ) {
					//echo 'something isset';
					$field['value'] = explode(',', $_GET[ $name ]);
				}

				// create filter
				?>
				<div class="filter" data-filter="<?php echo $name; ?>">
					<h4><?php echo $name; ?></h4>

					<?php create_field( $field );

					?>

				</div>

			<?php endforeach; ?>
			<a id="applyFilters" class="button green-button">Apply Filters</a>
		</div><!-- /.filters-wrap -->

	</div>

	<script type="text/javascript">
	(function($) {
		// Toggle Filters
		$('#vod-filters h2').on('click', function(){
			$('.filters-wrap').toggle('slow').css('display', 'flex');
			$('#vod-filters h2 span').toggleClass('up-green');
		});

		// change
		$('#vod-filters').on('change', 'input[type="radio"]', function(){

			// vars
			var url = '<?php echo home_url('vod'); ?>';
				args = {};

			// loop over filters
			$('#vod-filters .filter').each(function(){

				// vars
				var filter = $(this).data('filter'),
					vals = [];

				// find checked inputs
				$(this).find('input:checked').each(function(){
					vals.push( $(this).val() );
				});
				// append to args
				args[ filter ] = vals.join(',');
			});

			// update url
			url += '?';

			// loop over args
			$.each(args, function( name, value ){
				url += name + '=' + value + '&';
			});

			// remove last &
			url = url.slice(0, -1);
			// reload page
			$('a#applyFilters').on('click', function(){
				window.location.replace( url );
			});


		});

	})(jQuery);
	</script>
	<?php


	// THe loop
	if ( have_posts() ) {
		while ( have_posts() ) {

			the_post(); ?>
			<a class="vod card" href="<?php the_permalink();?>">
				<article>
					<div class="image">
						<?php $vod_image = get_field('vod_image');?>
						<img src="<?php echo $vod_image['url'];?>" alt="<?php echo $vod_image['alt'];?>"/>
					</div>

					<div class="vod-content">
						<?php
						$level = get_field( 'level' );
						$length = get_field( 'length' );
						$instructor = get_field( 'instructor' );
						$language = get_field( 'language' );?>

						<div class="vod-header">
							<h2 class="entry-title"><?php echo the_title(); ?></h2>
							<?php
								if ( $level ) {
									echo '<div class="level '. $level . '">' . $level . '</div>';
								}?>
						</div>

						<div class="vod-meta">
							<?php
							if ( $instructor ) { ?>
								<div class="instructor-image <?php echo $instructor; ?>"></div>
								<div class="instructor">Instructor: <span><?php echo $instructor;?></span> </div>
							<?php }
							if ( $length ) {
								echo '<div class="lengthlang">' . $length . ' mins | ' . $language . '</div>';
							}?>
						</div>

					</div>

				</article>
			</a>

			<?php
		} // end while
	} // end if
}

//* Add 'one-half' class to Entry Header to float it left
add_filter( 'genesis_attr_entry-header', 'sk_genesis_attributes_entry_header' );
/**
 * Add attributes for entry header element.
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function sk_genesis_attributes_entry_header( $attributes ) {
	$attributes['class'] = 'entry-header one-half first';
	return $attributes;
}

/* Add 'one-half' class to Entry Content to float it right
add_filter( 'genesis_attr_entry-content', 'sk_genesis_attributes_entry_content' );
/**
 * Add attributes for entry content element.
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function sk_genesis_attributes_entry_content( $attributes ) {
	$attributes['class'] = 'entry-content one-half';
	return $attributes;
}

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove standard post content output.
remove_action( 'genesis_post_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action('genesis_loop', 'genesis_do_loop');

//add_action( 'genesis_entry_content', 'genesis_page_archive_content' );
add_action( 'genesis_loop', 'output_vod' );

//* Display values of custom fields (those that are not empty)
add_action( 'genesis_entry_header', 'vod_filters' );

// Display featured image
//add_action('genesis_entry_content', 'vod_featured_image');
/**
 * This function outputs sitemap-esque columns displaying all pages,
 * categories, authors, monthly archives, and recent posts.
 *
 * @since 1.6
 */
function genesis_page_archive_content() {

	$heading = ( genesis_a11y( 'headings' ) ? 'h2' : 'h4' );

	genesis_sitemap( $heading );

}

genesis();

?>
