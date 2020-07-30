<?php /*
Template Name: Mindbody API Tests
*/ ?>

<?php

?>

<?php

function my_custom_stuff(){
  ?>

  <script type="text/javascript">

    jQuery( document ).ready(function( $ ) {

    });

  </script>

  <style type="text/css">
    form {
      display: flex;
      justify-content: flex-start;
      padding: 2rem 0;
    }

    form p {
      margin-right: 1rem;
    }

    p.login-submit {
      margin-top: 26px;
    }
  </style>


<h2> Login </h2>

  <form name="mbologinform" id="mbologin" action="<?php echo site_url(); ?>/mindbody-tests2" method="post">

			<p class="login-email">
				<label for="email">Email Address</label>
				<input type="text" name="email" id="mbo_email" class="input" value="" size="20" autocomplete="off">
			</p>

			<p class="login-submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="Log In">
			</p>

		</form>


  <?php
}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'my_custom_stuff');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
