<?php /*
Template Name: Clinic
*/ ?>

<?php
add_action( 'genesis_after_header', 'naada_clinicBanner', 10 );
function naada_clinicBanner() {
  ?>
  <div class="clinicBanner" style="background-image: url('<?php the_field('hero_image');?>');'">

    <div class="clinicCallout">
      <!-- Calls our Call out Widget -->
      <h1> <?php the_field('hero_title'); ?></h1>
      <h3> <?php the_field('hero_description');?></h3>
      <a href="/therapeutic-clinic/clinic-appointments/" class="naada-button orange-button large">Book An Appointment</a>
    </div>
  </div>
  <?php
}

?>

<?php

function my_custom_stuff(){
  ?>
    <div class="centerWrap">
      <h2>How Does It Work?</h2>
      <p class="howItWorks"><?php the_field('how_does_it_work_text'); ?></p>
    </div>

    <div class="centerWrap">
        <h2>Treatments</h2>
      <p><?php the_field('treatments_text'); ?></p>
    </div>


    <div class="servicesWrap">
      <div class="serviceBlock">
        <div class="serviceLeft" style="background-image: url('<?php the_field('osteo_image');?>');'">
          <h2>Osteopathy</h2>
        </div><!-- serviceLeft -->
        <div class="serviceRight">
          <p><?php the_field('osteopath_text'); ?></p>
          <a href="/therapeutic-clinic/osteopathy-appointments/" class="naada-button orange-button medium">Book An Appointment</a> <a href="/therapeutic-clinic/our-therapists/" class="naada-button orange-hollow medium">Meet Our Osteopaths</a>
        </div><!-- serviceRight -->
      </div><!-- serviceBlock -->


      <div class="serviceBlock">
        <div class="serviceLeft" style="background-image: url('<?php the_field('yoga_therapy_image');?>');'">
          <h2>Yoga Therapy</h2>
        </div><!-- serviceLeft -->
        <div class="serviceRight">
          <p><?php the_field('yoga_therapy_text'); ?></p>
          <a href="/therapeutic-clinic/yoga-therapy-appointments/" class="naada-button orange-button medium">Book An Appointment</a> <a href="/therapeutic-clinic/our-therapists/" class="naada-button orange-hollow medium">Meet Our Therapists</a>
        </div><!-- serviceRight -->
      </div><!-- serviceBlock -->

      <div class="serviceBlock">
        <div class="serviceLeft" style="background-image: url('<?php the_field('massage_therapy_image');?>');'">
          <h2>Massage Therapy</h2>
        </div><!-- serviceLeft -->
        <div class="serviceRight">
          <p><?php the_field('massage_therapy_text'); ?></p>
          <a href="/therapeutic-clinic/massage-therapy-appointments/" class="naada-button orange-button medium">Book An Appointment</a> <a href="/therapeutic-clinic/our-therapists/" class="naada-button orange-hollow medium">Meet Our Therapists</a>
        </div><!-- serviceRight -->
      </div><!-- serviceBlock -->

      <div class="serviceBlock">
        <div class="serviceLeft" style="background-image: url('<?php the_field('sauna_image');?>');'">
          <h2 class="sauna">Infared Sauna</h2>
        </div><!-- serviceLeft -->
        <div class="serviceRight">
          <p><?php the_field('sauna_text'); ?></p>
          <!-- <a href="/therapeutic-clinic/clinic-appointments/" class="naada-button orange-button medium">Book An Appointment</a> <a href="/therapeutic-clinic/our-therapists/" class="naada-button orange-hollow medium">Meet Our Osteopaths</a> -->
        </div><!-- serviceRight -->
      </div><!-- serviceBlock -->

    </div><!-- servicesWrap -->

    <!-- <div class="testimonialWrap">
      <div class="testimonial">
        <div class="pic"><img src="<?php// the_field('author_pic'); ?>" alt="author pic"/></div>
        <p><?php //the_field('testimonial_text'); ?></p>
      </div>
      <p class="author">~<?php// the_field('testimonial_author'); ?></p>
    </div> -->
<?php
}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'my_custom_stuff');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
