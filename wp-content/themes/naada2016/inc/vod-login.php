<?php
  //Check that the user is logged in/ has been verified and has cookies set
  if ( isset( $_COOKIE['isAuthorized'] ) ){

    $current_user = $_COOKIE['clientName'];

		echo '<p>Welcome ' . $current_user . ' | <a class="mboLogOut" href="#">Logout</a></p>';

    ?>
    <script>
    jQuery( document ).ready(function( $ ) {
      $('a.mboLogOut').on('click', function(){
        Cookies.remove('isAuthorized');
        Cookies.remove('clientName');
        location.reload();
      })
    });
    </script>

  <?php
  }
  else {
		?><h3 class="login-leadin">Login with your MindBody email to access Classes on Demand</h3>
    <form name="mbologinform" id="mbologin" action="<?php echo site_url(); ?>/mindbody-auth" method="post">

  			<p class="login-email">
  				<input type="text" name="email" id="mbo_email" class="input" value="" placeholder="Email" size="30" autocomplete="off">
  			</p>

  			<p class="login-submit">
  				<input type="submit" name="submit" id="submit" class="button button-primary" value="Log In">
  			</p>
        <a href="https://company.mindbodyonline.com"><img src="<?php echo get_stylesheet_directory_uri();?>/images/MB-powered-by-logo-primary-radiance-@2x.png" alt="Powered by Mindbody"/></a>

  		</form>
      <?php
  }
  ?>
