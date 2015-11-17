<?php
/***************** SHOPSTYLER CART HOOKS AND ACTIONS **********************
 *  apply to shop page
 *  callback shopstyler-hooks.php
 *  
 *  Author: Antonio Nardone
 *  
 *******************************************************************************/
 //remove cross sell display
 remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' , 10 );
 //remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
    
 add_action ( 'woocommerce_before_cart_totals' , 'woo_set_coupon' , 10 );
 //add_action( 'woocommerce_cart_collaterals', 'woo_set_coupon' , 10 );
 
 function woo_set_coupon(){
  if ( WC()->cart->coupons_enabled() ) {
    echo '<div class="coupon">
            <table class="cart-coupon-table">
              <tr>
                <td align="right">
                <label for="coupon_code">Coupon</label>
                
                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Code"/>
                <input type="submit" class="button" name="apply_coupon" value="Apply" />
                </td>
              </tr>
            </table>';
		do_action( 'woocommerce_cart_coupon' );
    echo '</div>';
  }
} 