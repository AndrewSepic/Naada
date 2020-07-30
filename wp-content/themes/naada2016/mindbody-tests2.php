<?php /*
Template Name: Mindbody API Tests2
*/ ?>

<?php

// Membership ID's
// Staff Membership = 31
// Monthly Active = 3

function my_custom_stuff(){
//

  $apiUrl = 'https://api.mindbodyonline.com/public/v6/client/clients?SearchText=' . $_POST['email']; // calling single client based on email
  //$apiUrl = 'https://api.mindbodyonline.com/public/v6/client/clients'; // call All clients
  //$userTokenApi = 'https://api.mindbodyonline.com/public/v6/usertoken/issue';

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

  $pretty = json_decode( $body );?>

  <script type="text/javascript">
    // pass MBO array to a JavaScript variable
    var response = <?php echo $body; ?>;

    jQuery( document ).ready(function( $ ) {

      var client = response.Clients;
      console.log(client);
      console.log(client[0].FirstName);
      var msgText = document.getElementById('clientMsg');
      var msgMsg = document.getElementById('clientMsgContent');

      // Check to see if response returned client
      if ( client.length > 0 ) {
        console.log('We\'ve got a client!');
        msgText.textContent = "Hi " + client[0].FirstName;

        // Check on Membership Status
        if ( client[0].Gender == 'Female' ) {
          msgMsg.textContent = 'You are a female, thus you are granted access to the Classes on Demand';
        }
        else {
          msgMsg.textContent = 'We\'re sorry, your membership status does not qualify for access to Classes On Demand';
        }

      }
      else {
        console.log('Shit, We didn\'t find a client');
        msgText.textContent = 'We\'re sorry but that email is not registered to an account';
      }


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


<span> Response: <?php if ( $responseCode = 200) {
    echo $responseCode . ' We\'ve got the array successfully';
  }
  elseif ( $responseCode > 399 ) {
    echo $responseCode . ' <span style="color: red;">Houston, there\'s been a problem</span>';
  }

  ?> </span>

  <h3 id="clientMsg"></h3>
  <p id="clientMsgContent"></p>

<?php

  // echo '<pre>';
  //   var_dump($pretty);
  // echo '</pre>';



  ?>



  <?php
}
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'my_custom_stuff');
  //* This file handles pages, but only exists for the sake of child theme forward compatibility.
  genesis();
?>
