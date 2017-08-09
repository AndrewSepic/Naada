<?php /*
Template Name: Homepage New
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

function homepage_Output(){
  ?>
  <div class="homeContentWrap">
    <h3 class="schedule">Today's Schedule</h3>
    <a class="fullSched" href="/schedule">FULL SCHEDULE</a>
    <div class="horz-sched"><?php echo do_shortcode( '[hc-hmw snippet="Homepage-Horizontal-Schedule"]');?>'</div>
    <div class="sell">
      <div class="greenbox first">
        <h3><?php the_field('sell_box_1_title'); ?></h3>
      </div>
      <p>
        <a class="naada-button orange-button medium" href="">See Schedule</a>
      </p>
      <p><?php the_field('sell_box_1_text');?></p>
    </div>
    <div class="sell">
      <div class="greenbox second">
        <h3><?php the_field('sell_box_2_title'); ?></h3>
        </div>
        <p>
          <a class="naada-button orange-button medium" href="http://clients.mindbodyonline.com/ws.asp?studioid=6387&amp;stype=41&amp;prodid=155">Sign Up</a>
        </p>
        <p><?php the_field('sell_box_2_text');?></p>
    </div>

    <hr />

    <h3>Upcoming Courses</h3>
    <div class="naada-carousel">
      <div id="healCodeLoading"><?php echo do_shortcode( '[hc-hmw snippet="Homepage-Events-Carousel"]');?></div>
    </div>
  </div><!-- .homeContentWrap -->

  <section class="module parallax parallax-1">
    <div class="parallaxContent">
      <h2><?php the_field('parallax1_section_title');?></h2>
      <div class="block left">
        <?php the_field('parallax1_left_col');?>
      </div>
      <div class="block right">
        <?php the_field('parallax1_right_col');?>
      </div>
      <div class="clear"></div>
      <a class="button orange-button medium" href="/therapeutic-clinic/">More About the Clinic</a>
      <div class="downArrow"></div>
      <div class="clear"></div>
    </div>
  </section><!-- ONline Course Section -->

  <div class="homeContentWrap online-courses">
    <div class="online-carousel">
      <div>
        <div class="courseImage"><?php the_field('carousel_item_1_pic');?></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('carousel_item_1_link');?>"><?php the_field('carousel_item_1');?></a></h2>
        </div>
        <a class="button orange-button small" href="<?php the_field('carousel_item_1_link');?>">Book Appointment</a>
      </div>

      <div>
        <div class="courseImage"><?php the_field('carousel_item_2_pic');?></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('carousel_item_2_link');?>"><?php the_field('carousel_item_2');?></a></h2>
        </div>
        <a class="button orange-button small" href="<?php the_field('carousel_item_2_link');?>">Book Appointment</a>
      </div>

      <div>
        <div class="courseImage"><?php the_field('carousel_item_3_pic');?></div>
        <div class="courseInfo">
          <h2><a href="<?php the_field('carousel_item_3_link');?>"><?php the_field('carousel_item_3');?></a></h2>
        </div>
        <a class="button orange-button small" href="<?php the_field('carousel_item_3_link');?>">Book Appointment</a>
      </div>

    </div>
  </div>

  <!-- NYTT Parallax Section -->
  <section class="module parallax parallax-2">
    <div class="parallaxContent">
    <h2>Naada Yoga Teacher Training</h2>
      <div class="block left">
        Naada Yoga Teacher Training unites an internationally recognized faculty in a unique concept of open learning and education. NYTT teachers have worked closely together to develop programs that will empower you to see yoga as a living and evolving practice so that all of yoga’s multifaceted aspects – can better serve you, your students, and your community.
      </div>
      <div class="block right">
        NYTT programs enable you to dive deeply into the study and practice of yoga. All teacher training courses are offered on a part-time and weekend basis. Programs are modular, so you can complete them at your own pace. We offer a 200hr, 300hr, 500hr and 1000hr certifications.
      </div>
      <div class="clear"></div>
      <a class="button orange-button medium" href="/yoga-teacher-training">Learn More About NYTT</a>
      <div class="downArrow"></div>
      <div class="clear"></div>
    </div>
  </section>

  <!-- NYTT Programs Section -->
  <div class="homeContentWrap nytt-programs">
    <div class="nytt-carousel">
      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-200hr-web.jpg" alt="200 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/200-hour-foundation/">200 HR Foundation</a></h2>
        </div>
        <a class="button orange-button small" href="/yoga-teacher-training/200-hour-foundation/">Program Info</a>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-300hr-web.jpg" alt="300 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/300-hour-advanced/">300 HR Advanced</a></h2>
        </div>
        <a class="button orange-button small" href="/yoga-teacher-training/300-hour-advanced/">Program Info</a>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-500hr-web.jpg" alt="500 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/500-hour-certification/">500 HR Certification</a></h2>
        </div>
        <a class="button orange-button small" href="/yoga-teacher-training/500-hour-certification/">Program Info</a>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2016/02/nytt-1000hr-web.jpg" alt="1000 HR Yoga Teacher Training" /></div>
        <div class="courseInfo">
          <h2><a href="/yoga-teacher-training/300-hour-therapeutics/">300 HR Therapeutics</a></h2>
        </div>
        <a class="button orange-button small" href="/yoga-teacher-training/300-hour-therapeutics/">Programs Info</a>
      </div>
    </div>
  </div>
<?php
}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'homepage_Output');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
