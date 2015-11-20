<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! WC()->cart->coupons_enabled() ) {
	return;
}

$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
//wc_print_notice( $info_message, 'notice' );
?>
<div class="form-holder-addon">
	<div class="heading-holder" id="show-coupon-form">
		<h2>Coupon Code</h2>
		<i class="fa fa-bars showcoupon"></i>
		<div class="clearfix"></div>
	</div>

	<div class="checkout-form-holder">
		<form class="checkout_coupon_form" method="post">

			<p class="form-row form-row-first">
				<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
			</p>

			<p class="form-row form-row-last">
				<input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
			</p>

			<div class="clear"></div>
		</form>
	</div>
</div>
<script type="text/javascript">
	jQuery('.showcoupon').click(function(){
		jQuery('.checkout_coupon_form').toggle();
	})
</script>