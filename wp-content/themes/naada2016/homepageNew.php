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
      <div class="greenbox">
        <h3><?php the_field('sell_box_1_title'); ?></h3>
      </div>
      <a class="naada-button orange-button medium" href="http://clients.mindbodyonline.com/ws.asp?studioid=6387&amp;stype=41&amp;prodid=155">Sign Up</a>
      <?php the_field('sell_box_1_text');?>
    </div>
    <div class="sell">
      <div class="greenbox app">
        <h3><?php the_field('sell_box_2_title'); ?></h3>
        </div>
        <a class="naada-button orange-button medium" href="/mobile-app">Get the App</a>
        <?php the_field('sell_box_2_text');?>
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

      </div>
      <div class="block right">
        Whether you are a yoga teacher in training, an instructor with years of experience or just interested in taking your yoga practice to the next level, these online yoga courses could be a perfect fit.
      </div>
      <div class="clear"></div>
      <a class="button orange-button medium" href="/online-yoga-education/">See Our Online Yoga Courses</a>
      <div class="downArrow"></div>
      <div class="clear"></div>
    </div>
  </section><!-- ONline Course Section -->

  <div class="homeContentWrap online-courses">
    <div class="online-carousel">
      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2017/02/ayurveda-course-thumbnail.jpg" alt="A Year of Ayurveda with Matthew Remski" /></div>
        <div class="courseInfo">
          <h2><a href="/a-year-of-ayurveda-with-matthew-remski">A Year of Ayurveda</a></h2>
          <span class="trainer-name">with <a href="/yoga-teacher-training/meet-the-faculty/#remski">Matthew Remski</a></span>
        </div>
        <a class="button orange-button small" href="/a-year-of-ayurveda-with-matthew-remski">Course Info</a>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2014/06/sound-yoga-course.jpg" alt="Sound Yoga with Ann Dyer" /></div>
        <div class="courseInfo">
          <h2><a href="/sound-yoga-with-ann-dyer">Sound Yoga</a></h2>
          <span class="trainer-name">with <a href="/yoga-teacher-training/meet-the-faculty/#dyer">Ann Dyer</a></span>
        </div>
        <a class="button orange-button small" href="/sound-yoga-with-ann-dyer">Course Info</a>
      </div>

      <div>
        <div class="courseImage"><img src="http://www.naada.ca/wp-content/uploads/2016/01/therapy-course.jpg" alt="Yoga Therapy with Dr. Baxter Bell" /></div>
        <div class="courseInfo">
          <h2><a href="/product/yoga-as-therapy-with-dr-baxter-bell">Yoga Therapy</a></h2>
          <span class="trainer-name">with <a href="/yoga-teacher-training/meet-the-faculty/#baxter">Dr. Baxter Bell</a></span>
        </div>
        <a class="button orange-button small" href="/product/yoga-as-therapy-with-dr-baxter-bell">Course Info</a>
      </div>

      <div>
        <div class="courseImage"><img src="http://www.naada.ca/wp-content/uploads/2016/01/pranayama-course.jpg" alt="Pranayama Course with Richard Rosen" /></div>
        <div class="courseInfo">
          <h2><a href="/pranayama-with-richard-rosen/">Pranayama</a></h2>
          <span class="trainer-name">with <a href="/yoga-teacher-training/meet-the-faculty/#rosen">Richard Rosen</a></span>
        </div>
        <a class="button orange-button small" href="/pranayama-with-richard-rosen/">Course Info</a>
      </div>

      <div>
        <div class="courseImage"><img src="/wp-content/uploads/2015/12/YogaforWomen.jpg" alt="Yoga for Women with Mary Paffard" /></div>
        <div class="courseInfo">
          <h2><a href="/product/yoga-for-women-with-mary-paffard">Yoga for Women</a></h2>
          <span class="trainer-name">with <a href="/yoga-teacher-training/meet-the-faculty/#mary">Mary Paffard</a></span>
        </div>
        <a class="button orange-button small" href="/product/yoga-for-women-with-mary-paffard">Course Info</a>
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
