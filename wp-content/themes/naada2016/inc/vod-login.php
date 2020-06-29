<?php
  //check tha the user is logged in
  if ( is_user_logged_in() ){
		$current_user = wp_get_current_user();
		echo '<p>Welcome ' . $current_user->first_name . ' | <a href="' . wp_logout_url(home_url()) .  '">Logout</a></p>';

  }
  else {
		?><h3 class="login-leadin">Login to access Classes on Demand content</h3><?php
		wp_login_form();
  }
