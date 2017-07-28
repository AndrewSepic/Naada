<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php printf( __( "Hi there. Your recent order with %s is complete. Your online course is ready and waiting! Visit the <a href=\"http://naada.ca/online-school/my-courses/\">My Courses</a> area at Naada, log in and begin.  If this is your first purchase of an online course at Naada, your login information was sent to you in a previous email. ", 'woocommerce' ), get_option( 'blogname' ) ); ?></p>
<p>Your order details are shown below for your reference:</p>
<p>-----------------------</p>
<p><?php printf( __("Bonjour. Votre dernière commande chez %s est complétée. Votre cours en ligne est prêt et vous attend! Visitez la section <a href=\"http://naada.ca/online-school/my-courses/\">Mes Cours</a> chez Naada, connectez-vous et commencez. Si c’est votre premier achat pour un cours en ligne chez Naada, les informations pour vous connecter vous ont été envoyées préalablement par courriel.", 'woocommerce'), get_option('blogname'));?></p>
<p>Voici un récapitulatif de votre commande pour référence :</p>
<?php

/**
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
