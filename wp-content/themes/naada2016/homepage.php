<?php /*
Template Name: Naada Homepage
*/ ?>

<?php
add_action( 'genesis_after_header', 'naada_videoBanner', 10 );
function naada_videoBanner() {
  ?>
  <div class="videoBanner">

    <!-- Calls our Call out Widget -->
    <?php dynamic_sidebar("video_callout"); ?>

    <!-- Video -->
    <video id="naadaFootage" autoplay="autoplay" muted loop poster="http://naada.staging.wpengine.com/wp-content/themes/naada2016/vid/still.jpg">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/vid/VideoBanner3-HD.mp4" type="video/mp4">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/vid/WebMVideo1.webm" type="video/webm">


      Your browser doesn't support HTML5 video. Here's a <a href="#">link</a> to download the video.
      </video>
    </div>
  <?php
}
?>

<?php
//* This file handles pages, but only exists for the sake of child theme forward compatibility.
genesis();
?>
