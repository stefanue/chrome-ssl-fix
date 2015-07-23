<?php
/*
Plugin Name: Chrome SSL Fix
Plugin URI: http://www.wdc.me/chrome-ssl-fix.zip
Description: Fixes the problem with Chrome v44 forcing SSL on WordPress websites. Please deactivate when Chrome updates to v45
Version: 1.0
Author: Stefan Vasiljevic
Author URI: http://www.wdc.me
*/
if ( ! defined( 'ABSPATH' ) ) exit;


function my_admin_notice() {
    ?>
    <div class="updated">
        <p style="float:left;"><?php _e( 'Wow, now your website works again. Please consider making a donation. Thank you!', 'my-text-domain' ); ?></p>
        
        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right; margin: .5em 0; padding: 2px;">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WQKZ8N7D4AZYY">
<table>
<tr><td><input type="hidden" name="on0" value="Select donation amount">Select the amount you wish to donate:</td></tr><tr><td><select name="os0">
	<option value="Buy me a beer">Buy me a beer $5.00 USD</option>
	<option value="Buy me a coffe">Buy me a coffe $10.00 USD</option>
	<option value="Keep me in shape">Keep me in shape $20.00 USD</option>
	<option value="Keep me focused">Keep me focused $50.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<div style="clear:both"></div>

</div>
    <?php
}
//Add a little donate form :)
add_action( 'admin_notices', 'my_admin_notice' );

if ( ! class_exists( 'WDC_Google_Chrome_44_SSL_Fix' ) ) :
	class WDC_Google_Chrome_44_SSL_Fix {
		function __construct() {
			 if (!is_ssl()) {
			 //Fixes the issue with mixed requests
				$_SERVER['HTTPS'] = false;
			}
		}
	}
	new WDC_Google_Chrome_44_SSL_Fix;
endif;
?>
