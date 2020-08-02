<?php /*
Template Name: Mindbody Auth 2
*/ ?>

<?php

// Membership ID's
// Staff Membership = 31
// Monthly Active = 3

function my_custom_stuff(){
//

  // Call to get active clients memberships based on ID
  $apiUrl = 'https://api.mindbodyonline.com/public/v6/client/activeclientmemberships?clientId=' . $_POST['client_id'];

  $args = array(
    'headers' => array(
      'Content-Type' => 'application/json',
      'SiteId' => '6387',
      'Api-Key' => '7bba39594b4d460293abdfd64c8eea48',
      'Authorization' => '9f5d2815786541138c977a9a5267720d12d14b7b86ca4b20b2fc1585e37eb093'
    )
  );

  $request = wp_remote_get($apiUrl, $args);
  $responseCode = wp_remote_retrieve_response_code( $request );
  $body = wp_remote_retrieve_body($request);

  if ( is_wp_error( $request ) ) {
    return false; // Bail Early
  }

  $pretty = json_decode( $body );
  //echo '<pre>';
  //echo $body;
  //echo '</pre>';

  ?>

  <script type="text/javascript">

    // pass MBO array to a JavaScript variable
    // Needs to happen at page load (not in document ready)
    var response = <?php echo $body; ?>;

    jQuery( document ).ready(function( $ ) {

      var clientMembership = response.ClientMemberships[0].MembershipId;
      $('button.orange-button').hide();

      var clientName = localStorage.getItem('clientName');
      var msgText = document.getElementById('clientMsg');
      var msgMsg = document.getElementById('clientMsgContent');

      console.log(clientName);
      msgText.textContent = clientName + ',';
      // Check on Membership Status
      if ( clientMembership == 12 || clientMembership == 3  ) {
        msgMsg.textContent = 'Thank you! Your membership has been verfied and you have access to Classes on Demand';
        Cookies.set('clientName', clientName, {expires: 7});
        Cookies.set('isAuthorized', true);
        $('a.button.orange-button').fadeIn('slow');
      }
      else {
        msgMsg.textContent = 'We\'re sorry, your membership status does not qualify for access to Classes On Demand';
      }


   });

  </script>

<h4>Mindbody Authentication</h4>

  <div class="responseWrap">
    <h3 id="clientMsg"></h3>
    <p id="clientMsgContent"></p>
    <a class="button orange-button small" href="<?php echo site_url();?>/vod">Browse Classes on Demand</a>
    <a class="mbo" href="https://company.mindbodyonline.com"><img src="<?php echo get_stylesheet_directory_uri();?>/images/MB-powered-by-logo-primary-radiance-@2x.png" alt="Powered by Mindbody"/></a>
  </div>

  <?php


}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'my_custom_stuff');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
