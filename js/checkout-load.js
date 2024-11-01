// checkout-load.js

(function($) {
    setInterval(function() {
	var $radioButtons = jQuery(document).find(".wc-shipping-method.wcPlus-wc-shipping-method ul#shipping_method li input:checked");
	    $radioButtons.each(function() {
	        jQuery(".wc-shipping-method.wcPlus-wc-shipping-method ul#shipping_method li").removeClass("shipping-detail-box active-shipping")
	        jQuery(this).parent().toggleClass("shipping-detail-box active-shipping", this.checked);
	    });
	}, 500);

    setTimeout(function(){
            jQuery(function() {
            jQuery('.autocomplete-container label[for="billing_address_1"], .autocomplete-container label[for="shipping_address_1"]').text('Street Address (Search) *');
            });
            jQuery("form.woocommerce-checkout input, .wcplus-myaccount-main .form-row input, .form-row select").each(function(){
            var data = jQuery(this).val();
             //console.log(data);
            if(data !== ""){
                jQuery(this).parents('p').addClass("active");
            }
        });
        }, 1000);

    jQuery(document).ready(function($) {
    jQuery('.show_popup_buttondsd').on('click', function(e) {
        e.preventDefault(); 
        jQuery.ajax({
            type: 'POST',
            url: "'.admin_url('admin-ajax.php').'",
            data: {
                action: 'woocommerce_checkout'
            },
            success: function(response) { 
                var hasErrors = jQuery(response).find('.woocommerce-error').length > 0;
                if (hasErrors) {
                    var errorMessage = 'There are errors in the checkout form. Please review and correct them.';
                    alert(errorMessage);
                } else {
                     var result = jQuery(response).find('[name="result"]').val();
                     if (result === "success") {
                     }else{

                     }
                }
            },
            error: function(error) {
                console.error("Error triggering WooCommerce checkout:", error);
            }
        });
    });
});

        setTimeout(function(){ var payment_method = jQuery("[name=payment_method]:checked").attr("id");
            jQuery("."+payment_method).addClass('active-payment');
        jQuery('[name=payment_method]').on('click', function () { 
            var id = jQuery(this).attr("id");
            jQuery(".wc_payment_method").removeClass('active-payment');
            jQuery("."+id).addClass('active-payment');
        });}, 2000);

        setTimeout(function(){ jQuery(".checkout_coupon_code").keyup(function(){
      var valuse = jQuery(this).val();
      jQuery(".checkout_coupon_val").val(valuse);
    });
    jQuery(document).on('click','.checkout_apply_coupon', function() {
     var code = jQuery( '.checkout_coupon_val').val();
     var button = jQuery( this );
     data = {
         action: 'pluswc_ajax_apply_coupon_base',
         coupon_code: code
     };
     button.html( 'wait.');
     jQuery.post( wc_checkout_params.ajax_url, data, function( returned_data ) { 
         if (returned_data.success){
             setTimeout(function(){
             jQuery(document.body).trigger('update_checkout');
                 button.html( 'Apply');
             }, 400); 
         } else {
             if(jQuery("div").hasClass("woocommerce-NoticeGroup")){
                jQuery(".errorshow").empty().html('<span style="color:red !important;" role="alert">'+returned_data.message+'</span>');
             }else{ 
                jQuery(".errorshow").empty().html('<span style="color:red !important;" role="alert">'+returned_data.message+'</span>');
             }
             setTimeout(function(){
                jQuery(".errorshow").empty();
             }, 3000);
         }
     })
 }); 
}, 2000);

setInterval(function() {

	jQuery(".custom-login-form p.login-username input").keyup(function () {
        jQuery(".custom-login-form p.login-username").addClass("active");
    });
    jQuery(".custom-login-form p.login-password input").keyup(function () {
        jQuery(".custom-login-form p.login-password").addClass("active");
    });
}, 500);

})(jQuery);
