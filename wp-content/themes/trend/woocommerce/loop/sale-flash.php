<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>
	<div class="product-badge absolute rotate45"> 
		<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale rotate45_back">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
	</div>
<?php endif; ?>
