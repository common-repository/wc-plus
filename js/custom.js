jQuery(function() {
    
    // setTimeout(function(){ 
    //        jQuery("tr.woocommerce-shipping-totals.shipping").empty();
        
    //     }, 2000);

    // jQuery(".woocommerce-billing-fields__field-wrapper .card-link-div").insertAfter('#billing_email_field #billing_email');
        jQuery('#open_coupon').on('click', function() { 
            var popup_name = jQuery('[popup-open-mobile]').attr('popup-open-mobile');
            jQuery('[popup-name="' + popup_name + '"]').fadeToggle(300);
            jQuery("body").toggleClass('activeoverlay_mobile');
            jQuery(".cart-chekout-popup").toggleClass('active-icon-mobile');
            jQuery(".main-cart-box-wc-mobile").addClass('active');
        });

    jQuery('.wcPlus-wc-shipping-method ul#shipping_method li').click(function() {
        jQuery('.wcPlus-wc-shipping-method ul#shipping_method li').removeClass('shipping-active');
        jQuery(this).addClass('shipping-active');
    });
    jQuery(document).ready(function() {
        var checkedRadio = jQuery('.wcPlus-wc-shipping-method .shipping_method:checked');
        var initialValue = checkedRadio.val();
        checkedRadio.closest('li').addClass('shipping-active');
    });

    jQuery(".faq-block").click(function() {
        jQuery(".faq-block-inner").toggleClass('active');
    });
    jQuery(".customer-review").click(function() {
        jQuery(".customer-review-row").toggleClass('active');
    });

    jQuery('.set-shipping-btn').on('click', function () {
        jQuery(".different_data").attr('data-save', 'yes');
        jQuery(".different_data").removeClass('active');
        jQuery(".different_data").addClass('addshipping-active');
        jQuery("#editshipping").show();
        wcplus_show_shipping();
    });
    jQuery('#editshipping').on('click', function () {
        jQuery(".different_data").attr('data-save', 'no');
        jQuery(".different_data").addClass('active');
        jQuery(".different_data").removeClass('addshipping-active');
        jQuery("#editshipping").hide();
        //wcplus_show_shipping();
    });
     jQuery('[name=shipping_address]').on('click', function () {
        //var value = jQuery("[name=shipping_address]:checked").val();
        jQuery('.shipping-detail-box').removeClass('active-shipping');
        var id = jQuery(this).attr("id");
        var datasave = jQuery('.'+id).attr("data-save");
        jQuery( ".wc-plus-check_ship" ).prop( "checked", false );
        jQuery("."+id).addClass('active-shipping');
        jQuery(".adress-detail-content").removeClass("active");
        if(id == 'different_data'){
            if(datasave != 'yes'){ 
                jQuery("."+id).addClass("active");
            }
        }else{ 
            jQuery("."+id).addClass("active");
        }
        
        if(id == 'different_data'){
            jQuery( ".wc-plus-check_ship" ).prop( "checked", true );
            jQuery("#manuly-content").removeClass("active");
            jQuery("#search-form-cl").css("display","block");
        }
    });
    jQuery("#manuly").click(function(){
        jQuery("#manuly-content").addClass("active");
        jQuery("#search-form-cl").css("display","none");
    }); 
    jQuery("#manuly-search").click(function(){
        jQuery("#manuly-content").removeClass("active");
        jQuery("#search-form-cl").css("display","block");
    }); 
    jQuery("#manuly-billing").click(function(){
        jQuery("#manuly-content-billing").addClass("autofilled-active");
        jQuery("#search-form-cl-billing").css("display","none");
    });
    jQuery("#manuly-search-billing").click(function(){
        jQuery("#manuly-content-billing").removeClass("autofilled-active");
        jQuery("#search-form-cl-billing").css("display","block");
    });
    // Fisrtname validation
    let check_fname = true;
    function wc_plus_check_firstname() {
        var billing_first_name = jQuery("#billing_first_name").val();
        if(billing_first_name == ''){
            check_fname = false;
            jQuery("#billing_first_name_field").addClass('wc-error');
            jQuery("#billing_first_name_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_first_name_field").removeClass('wc-error');
            jQuery("#billing_first_name_field").removeClass('wc-error-active');
            check_fname = true;
        }
    }
    // Lastname validation
    let check_lname = true;
    function wc_plus_check_lastname() {
        var billing_last_name = jQuery("#billing_last_name").val();
        if(billing_last_name == ''){
            check_lname = false;
            jQuery("#billing_last_name_field").addClass('wc-error');
            jQuery("#billing_last_name_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_last_name_field").removeClass('wc-error');
            jQuery("#billing_last_name_field").removeClass('wc-error-active');
            check_lname = true;
        }
    }
    // Phone validation
    let check_phone = true;
    function wc_plus_check_phone() {
        var billing_phone = jQuery("#billing_phone").val();
        if(billing_phone == ''){
            check_phone = false;
            jQuery("#billing_phone_field").addClass('wc-error');
            jQuery("#billing_phone_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_phone_field").removeClass('wc-error');
            jQuery("#billing_phone_field").removeClass('wc-error-active');
            check_phone = true;
        }
    }
    // Email validation
    let check_email = true;
    function wc_plus_check_email() {
        var billing_email = jQuery("#billing_email").val();
        if(billing_email == ''){
            check_email = false;
            jQuery("#billing_email_field").addClass('wc-error');
            jQuery("#billing_email_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_email_field").removeClass('wc-error');
            jQuery("#billing_email_field").removeClass('wc-error-active');
            check_email = true;
        }
    }
    // Address 1 validation
    let check_addres_one = true;
    function wc_plus_check_address_one() {
        var billing_address_1 = jQuery("#billing_address_1").val();
        if(billing_address_1 == ''){
            check_addres_one = false;
            jQuery("#billing_address_1_field").addClass('wc-error');
            jQuery("#billing_address_1_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_address_1_field").removeClass('wc-error');
            jQuery("#billing_address_1_field").removeClass('wc-error-active');
            check_addres_one = true;
        }
    }
     // Address 2 validation
    // let check_addres_two = true;
    // function wc_plus_check_address_two() {
    //     var billing_address_2 = jQuery("#billing_address_2").val();
    //     if(billing_address_2 == ''){
    //         check_addres_two = false;
    //         jQuery("#billing_address_2_field").addClass('wc-error');
    //         jQuery("#billing_address_2_field").addClass('wc-error-active');
    //         return false;
    //     }else{
    //         jQuery("#billing_address_2_field").removeClass('wc-error');
    //         jQuery("#billing_address_2_field").removeClass('wc-error-active');
    //         check_addres_two = true;
    //     }
    // }
    // state validation
    let check_city = true;
    function wc_plus_check_city() {
        var billing_city = jQuery("#billing_city").val();
        if(billing_city == ''){
            check_city = false;
            jQuery("#billing_city_field").addClass('wc-error');
            jQuery("#billing_city_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_city_field").removeClass('wc-error');
            jQuery("#billing_city_field").removeClass('wc-error-active');
            check_city = true;
        }
    }
     // state validation
    let check_state = true;
    function wc_plus_check_state() {
        var billing_state = jQuery(".validate-required #billing_state").val();
        if(billing_state == ''){
            check_state = false;
            jQuery("#billing_state_field").addClass('wc-error');
            jQuery("#billing_state_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_state_field").addClass('active');
            jQuery("#billing_state_field").removeClass('wc-error');
            jQuery("#billing_state_field").removeClass('wc-error-active');
            check_state = true;
        }
    }
     // Postcode validation
    let check_postcode = true;
    function wc_plus_check_postcode() {
        var billing_postcode = jQuery("#billing_postcode").val();
        if(billing_postcode == ''){
            check_postcode = false;
            jQuery("#billing_postcode_field").addClass('wc-error');
            jQuery("#billing_postcode_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_postcode_field").removeClass('wc-error');
            jQuery("#billing_postcode_field").removeClass('wc-error-active');
            check_postcode = true;
        }
    }
     // Postcode validation
    let check_country = true;
    function wc_plus_check_country() {
        var billing_country = jQuery("#billing_country").val();
        if(billing_country == ''){
            check_country = false;
            jQuery("#billing_country_field").addClass('wc-error');
            jQuery("#billing_country_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#billing_country_field").addClass('active');
            jQuery("#billing_country_field").removeClass('wc-error');
            jQuery("#billing_country_field").removeClass('wc-error-active');
            check_country = true;
        }
    }
    setTimeout(function(){ run_WcPlus_State(); }, 1000);
    jQuery('select#billing_country').on('change', function() {
        wc_plus_check_country();
        setTimeout(function(){ run_WcPlus_State(); }, 1000);
    });
    function run_WcPlus_State(){
        jQuery("select#billing_state").on('change', function()  { 
            wc_plus_check_state();
          });
    }
    // jQuery("#billing_address_2").keyup(function () {
    //     wc_plus_check_address_two();
    //   });
    jQuery("#billing_address_1").keyup(function () {
        wc_plus_check_address_one();
      });
    jQuery("#billing_email").keyup(function () {
        wc_plus_check_email();
      });
    jQuery("#billing_first_name").keyup(function () {
        wc_plus_check_firstname();
      });
    jQuery("#billing_last_name").keyup(function () {
        wc_plus_check_lastname();
      });
    jQuery("#billing_phone").keyup(function () {
        wc_plus_check_phone();
      });
    jQuery("#billing_postcode").keyup(function () {
        wc_plus_check_postcode();
      });
    jQuery("#billing_city").keyup(function () {
        wc_plus_check_city();
      });
    
    jQuery("#first_step").click(function(){
        //alert(billing_state);
        wc_plus_check_firstname();
        wc_plus_check_lastname();
        wc_plus_check_phone();
        wc_plus_check_country();
        wc_plus_check_postcode();
        wc_plus_check_state();
        wc_plus_check_city();
        //wc_plus_check_address_two();
        wc_plus_check_address_one();
        wc_plus_check_email();

        if (check_country == true && check_postcode == true && check_state == true && check_city == true && check_addres_one == true && check_email == true && check_lname == true && check_fname == true && check_phone == true) {
            jQuery("#error_fill").empty();
            jQuery( ".wc-plus-check_ship" ).prop( "checked", false );
            var shinppingvalue = jQuery("#wcplus-show-shipping").val();

            jQuery("#billing_detals").empty().html('<i class="bi bi-check-circle-fill"></i>Billing Details');
            
            jQuery(".billing-detail.shadow-box").removeClass('active');
            if(shinppingvalue == 1){
                jQuery(".shipping-detail.shadow-box").addClass('active');
                jQuery(".shipping_detail_mobile").addClass('active');
            }else{
                jQuery(".pament-detail.shadow-box").addClass('active');
            }
            
            jQuery("#billing_edit").css("display","block");
            // Mobile screen
            jQuery("#billing_detals_mobile").empty().html('<i class="bi bi-check-circle-fill"></i>Billing');
            jQuery(".billing_detail_mobile").removeClass('active');
            //jQuery(".shipping_detail_mobile").addClass('active');
            jQuery(".billing_detail_mobile").addClass('show-edit-active');
            show_tab_mobile_billing();
            show_billing_data();
            return true;
        } else {
           jQuery("#error_fill").empty().html("Please fill in all required fields.");
           return false;
        }
        //alert("sdfsdf");
    });
    jQuery(".edit").click(function(){
        var id = jQuery(this).attr("id");
        if(id == 'billing_edit'){
            jQuery(".billing-detail.shadow-box").addClass('active');
            jQuery("#"+id).css("display","none");
        }else if(id == 'shipping_edit'){
            jQuery(".shipping-detail.shadow-box").addClass('active');
            jQuery("#"+id).css("display","none");
        }
        
    });


// Shipping Validation
// Fisrtname validation
    let shipping_fname = true;
    function wc_plus_shipping_firstname() {
        var shipping1_first_name = jQuery("#shipping_first_name").val();
        if(shipping1_first_name == ''){
            shipping_fname = false;
            jQuery("#shipping_first_name_field").addClass('wc-error');
            jQuery("#shipping_first_name_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#shipping_first_name_field").removeClass('wc-error');
            jQuery("#shipping_first_name_field").removeClass('wc-error-active');
            shipping_fname = true;
        }
    }
    // Lastname validation
    let shipping_lname = true;
    function wc_plus_shipping_lastname() {
        var shipping1_last_name = jQuery("#shipping_last_name").val();
        if(shipping1_last_name == ''){
            shipping_lname = false;
            jQuery("#shipping_last_name_field").addClass('wc-error');
            jQuery("#shipping_last_name_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#shipping_last_name_field").removeClass('wc-error');
            jQuery("#shipping_last_name_field").removeClass('wc-error-active');
            shipping_lname = true;
        }
    }
    
    // Address 1 validation
    let shipping_addres_one = true;
    function wc_plus_shipping_address_one() {
        var shipping1_address_1 = jQuery("#shipping_address_1").val();
        if(shipping1_address_1 == ''){
            shipping_addres_one = false;
            jQuery("#shipping_address_1_field").addClass('wc-error');
            jQuery("#shipping_address_1_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#shipping_address_1_field").removeClass('wc-error');
            jQuery("#shipping_address_1_field").removeClass('wc-error-active');
            shipping_addres_one = true;
        }
    }
     // Address 2 validation
    let shipping_city = true;
    function wc_plus_shipping_city() {
        var shipping1_address_2 = jQuery("#shipping_city").val();
        if(shipping1_address_2 == ''){
            shipping_city = false;
            jQuery("#shipping_city_field").addClass('wc-error');
            jQuery("#shipping_city_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#shipping_city_field").removeClass('wc-error');
            jQuery("#shipping_city_field").removeClass('wc-error-active');
            shipping_city = true;
        }
    }
     // state validation
    let shipping_state = true;
    function wc_plus_shipping_state() {
        var shipping1_state = jQuery("#shipping_state").val();
        if(shipping1_state == ''){
            shipping_state = false;
            jQuery("#shipping_state_field").addClass('wc-error');
            jQuery("#shipping_state_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#shipping_state_field").addClass('active');
            jQuery("#shipping_state_field").removeClass('wc-error');
            jQuery("#shipping_state_field").removeClass('wc-error-active');
            shipping_state = true;
        }
    }
     // Postcode validation
    let shipping_postcode = true;
    function wc_plus_shipping_postcode() {
        var shipping1_postcode = jQuery("#shipping_postcode").val();
        if(shipping1_postcode == ''){
            shipping_postcode = false;
            jQuery("#shipping_postcode_field").addClass('wc-error');
            jQuery("#shipping_postcode_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#shipping_postcode_field").removeClass('wc-error');
            jQuery("#shipping_postcode_field").removeClass('wc-error-active');
            shipping_postcode = true;
        }
    }
     // Postcode validation
    let shipping_country = true;
    function wc_plus_shipping_country() {
        var shipping1_country = jQuery("#shipping_country").val();
        if(shipping1_country == ''){
            shipping_country = false;
            jQuery("#shipping_country_field").addClass('wc-error');
            jQuery("#shipping_country_field").addClass('wc-error-active');
            return false;
        }else{
            jQuery("#shipping_country_field").addClass('active');
            jQuery("#shipping_country_field").removeClass('wc-error');
            jQuery("#shipping_country_field").removeClass('wc-error-active');
            shipping_country = true;
        }
    }
    setTimeout(function(){ run_WcPlus_ShippingState(); }, 1000);
    jQuery('select#shipping_country').on('change', function() {
        wc_plus_shipping_country();
        setTimeout(function(){ run_WcPlus_ShippingState(); }, 1000);
    });
    function run_WcPlus_ShippingState(){
        jQuery("select#shipping_state").on('change', function()  { 
            wc_plus_shipping_state();
          });
    }
    jQuery("#shipping_city").keyup(function () {
        wc_plus_shipping_city();
      });
    jQuery("#shipping_address_1").keyup(function () {
        wc_plus_shipping_address_one();
      });
    jQuery("select#shipping_state").on('change', function() {
        wc_plus_shipping_state();
      });
    jQuery("#shipping_first_name").keyup(function () {
        wc_plus_shipping_firstname();
      });
    jQuery("#shipping_last_name").keyup(function () {
        wc_plus_shipping_lastname();
      });
    jQuery("#shipping_postcode").keyup(function () {
        wc_plus_shipping_postcode();
      });

    jQuery("#secound_step").click(function(){

        wc_plus_shipping_firstname();
        wc_plus_shipping_lastname();
        wc_plus_shipping_country();
        wc_plus_shipping_postcode();
        wc_plus_shipping_state();
        wc_plus_shipping_city();
        wc_plus_shipping_address_one();

        var value = jQuery("[name=shipping_address]:checked").attr("id");
        //alert(value);
        if(value == 'same_data'){
            shipping_country = true;
            shipping_postcode = true;
            shipping_state = true;
            shipping_city = true;
            shipping_addres_one = true;
            shipping_lname = true;
            shipping_fname = true;
        }
        if (shipping_country == true && shipping_postcode == true && shipping_state == true && shipping_city == true && shipping_addres_one == true && shipping_lname == true && shipping_fname == true) {
 
            jQuery("#error_ship-fill").empty();
            jQuery("#shipping_detals").empty().html('<i class="bi bi-check-circle-fill"></i>Shipping Details');
            jQuery("#shipping_edit").css("display","block");
            jQuery("#billing_edit").css("display","block");
            jQuery(".billing-detail.shadow-box").removeClass('active');
            jQuery(".shipping-detail.shadow-box").removeClass('active');
            jQuery(".pament-detail.shadow-box").addClass('active');

            //mobile screen shipping
            jQuery("#shipping_detals_mobile").empty().html('<i class="bi bi-check-circle-fill"></i>Shipping');
            jQuery(".billing_detail_mobile").removeClass('active');
            jQuery(".shipping_detail_mobile").removeClass('active');
            jQuery(".payment_detail_mobile").addClass('active');
            
            jQuery(".shipping_detail_mobile").addClass('show-edit-active');
            jQuery(".payment_detail_mobile").addClass('show-edit-active');
            show_tab_mobile_shipping();

        } else {
           jQuery("#error_ship-fill").empty().html("Please fill in all required fields.");
           return false;
        }

        //alert("sdfsdf");
    });

    function show_billing_data(){
        var first = jQuery("#billing_first_name").val();
        var last = jQuery("#billing_last_name").val();
        var address = jQuery("#billing_address_1").val();
        var address_2 = jQuery("#billing_address_2").val();
        var state = jQuery("#billing_state").val();
        var city = jQuery("#billing_city").val();
        var pincode = jQuery("#billing_postcode").val();
        var countryobject = jQuery("#billing_country").find('option:selected');
        var country = countryobject.text();
        //console.log(country)
        // console.log(first+'--'+last+'--'+address+'--'+address_2+'--'+city+'--'+pincode+'--'+state);
        // jQuery("#wp_billing_data").html("<p>"+first+" "+last+ "</br>" +address+" "+ address_2+ "</br>" +city+" " +state+ "</br>" +pincode+ "</p>");
        // Initialize an empty HTML string for the billing data
        var billingDataHtml = "<p>";

        // Helper function to check if a value is empty or undefined
        function isValidValue(value) {
            return (value !== undefined && value !== null && value !== '');
        }
        if (isValidValue(first)) {
            billingDataHtml += first + " ";
        }
        if (isValidValue(last)) {
            billingDataHtml += last + "<br>";
        }
        if (isValidValue(address)) {
            billingDataHtml += address;
            if (isValidValue(address_2)) {
                billingDataHtml += " " + address_2 + "<br>";
            } else {
                billingDataHtml += "<br>";
            }
        }
        if (isValidValue(city)) {
            billingDataHtml += city + " ";
        }
        if (isValidValue(state)) {
            billingDataHtml += state + "<br>";
        }
        if (isValidValue(pincode)) {
            billingDataHtml += pincode + " ";
        }
        if (isValidValue(country)) {
            billingDataHtml += country;
        }
        billingDataHtml += "</p>";
        jQuery("#wp_billing_data").html(billingDataHtml);
    }

    function wcplus_show_shipping(){
        var first = jQuery("#shipping_first_name").val();
        var last = jQuery("#shipping_last_name").val();
        var address = jQuery("#shipping_address_1").val();
        var address_2 = jQuery("#shipping_address_2").val();
        var state = jQuery("#shipping_state").val();
        var city = jQuery("#shipping_city").val();
        var pincode = jQuery("#shipping_postcode").val();
        var countryobject = jQuery("#shipping_country").find('option:selected');
        var country = countryobject.text();
        //console.log(country)
        // console.log(first+'--'+last+'--'+address+'--'+address_2+'--'+city+'--'+pincode+'--'+state);
        // jQuery("#wp_billing_data").html("<p>"+first+" "+last+ "</br>" +address+" "+ address_2+ "</br>" +city+" " +state+ "</br>" +pincode+ "</p>");
        // Initialize an empty HTML string for the billing data
        var shippingDataHtml = "<p>";

        // Helper function to check if a value is empty or undefined
        function isValidValue(value) {
            return (value !== undefined && value !== null && value !== '');
        }
        if (isValidValue(first)) {
            shippingDataHtml += first + " ";
        }
        if (isValidValue(last)) {
            shippingDataHtml += last + "<br>";
        }
        if (isValidValue(address)) {
            shippingDataHtml += address;
            if (isValidValue(address_2)) {
                shippingDataHtml += " " + address_2 + "<br>";
            } else {
                shippingDataHtml += "<br>";
            }
        }
        if (isValidValue(city)) {
            shippingDataHtml += city + " ";
        }
        if (isValidValue(state)) {
            shippingDataHtml += state + "<br>";
        }
        if (isValidValue(pincode)) {
            shippingDataHtml += pincode + " ";
        }
        if (isValidValue(country)) {
            shippingDataHtml += country;
        }
        shippingDataHtml += "</p>";
        jQuery("#wcplusShipping_data").html(shippingDataHtml);
        //jQuery("#wcplusShipping_data").html("<p>"+first+" "+last+ "</br>" +address+" "+ address_2+ "</br>" +city+" " +state+ "</br>" +pincode+ "</p>");

    }

    function show_tab_mobile_billing() {
        jQuery("li.billing_detail_mobile.show-edit-active").click(function(){ 
            jQuery(".billing_detail_mobile").addClass('active');
            jQuery(".billing-detail.shadow-box").addClass('active');
            jQuery(".shipping_detail_mobile").removeClass('active');
            jQuery(".pament-detail.shadow-box").removeClass('active');
            jQuery(".shipping-detail.shadow-box").removeClass('active');
            jQuery(".payment_detail_mobile").removeClass('active');
        });
    }
    function show_tab_mobile_shipping() {
        jQuery("li.shipping_detail_mobile.show-edit-active").click(function(){
                jQuery(".shipping_detail_mobile").addClass('active');
                 jQuery(".billing-detail.shadow-box").removeClass('active');
                jQuery(".shipping-detail.shadow-box").addClass('active');
                jQuery(".pament-detail.shadow-box").removeClass('active');
                jQuery(".billing_detail_mobile").removeClass('active');
                jQuery(".payment_detail_mobile").removeClass('active');
        });
        jQuery("li.payment_detail_mobile.show-edit-active").click(function(){
            jQuery(".payment_detail_mobile").addClass('active');
            jQuery(".billing-detail.shadow-box").removeClass('active');
            jQuery(".pament-detail.shadow-box").addClass('active');
            jQuery(".shipping-detail.shadow-box").removeClass('active');
            jQuery(".shipping_detail_mobile").removeClass('active');
            jQuery(".billing_detail_mobile").removeClass('active');
        });
    }

});
jQuery(document).ready(function($) {

        setTimeout(function(){ 
            var payment_method = jQuery("[name=payment_method]:checked").attr("id");
            jQuery("."+payment_method).addClass('active-payment');
            //jQuery(".custom-btnsd").text('Complete Order');

        jQuery('[name=payment_method]').on('click', function () {
            var id = jQuery(this).attr("id");
            jQuery(".wc_payment_method").removeClass('active-payment');
            jQuery("."+id).addClass('active-payment');
            //jQuery(".custom-btnsd").text('Complete Order');
        });
        
        }, 3000);

        jQuery("form.woocommerce-checkout input, .wcplus-myaccount-main .form-row input, .form-row select").each(function(){
            var data = jQuery(this).val();
             //console.log(data);
            if(data !== ""){
                jQuery(this).parents('p').addClass("active");
            }
        });

        // jQuery(".myaccountcheckout_mob .add_cart_btn").click(function(){
        //     var dataid = jQuery(this).attr("data-href");
        //     if(dataid){
        //         location.replace(dataid);
        //     }else{
        //         location.replace('/');
        //     }
        // });

        jQuery(".woocommerce-checkout .form-row input").keyup(function(){
            var ids = jQuery(this).attr("id");
            var data = jQuery(this).val();
            if(data == ""){
                jQuery("#"+ids+"_field").removeClass("active");
            }else{
               jQuery("#"+ids+"_field").addClass("active");
            }
        });

        jQuery(".woocommerce-checkout .form-row select").click(function(){
            var ids = jQuery(this).attr("id");
            var data = jQuery(this).val();
            if(data == ""){
                jQuery("#"+ids+"_field").removeClass("active");
            }else{
               jQuery("#"+ids+"_field").addClass("active");
            }
        });

        jQuery(".wcplus-myaccount-main .form-row input").keyup(function(){
            var parentElement = jQuery(this).closest(".form-row");
            var data = jQuery(this).val();
            if(data == ""){
                parentElement.removeClass("active");
            }else{
                parentElement.addClass("active");
            }
        });

        //jQuery(".woocommerce-billing-fields__field-wrapper .form-row select").click(function(){
            
       // });

    });
// jQuery(document).on('click','#checkout_apply_coupon', function() {
//      // Get the coupon code
//      var code = jQuery( '#checkout_coupon_code').val();
//      var button = jQuery( this );
//      data = {
//          action: 'pluswc_ajax_apply_coupon_base',
//          coupon_code: code
//      };
//      button.html( 'wait.');
//      // Send it over to WordPress.
//      jQuery.post( wc_checkout_params.ajax_url, data, function( returned_data ) { console.log(returned_data.message)
//          if (returned_data.success){
//              setTimeout(function(){
//              jQuery(document.body).trigger('update_checkout');
//                  button.html( 'Apply');
//              }, 400);
             
//          } else {
//              if(jQuery("div").hasClass("woocommerce-NoticeGroup")){
//                 //jQuery(".woocommerce-NoticeGroup").empty().html('<div class="woocommerce-message" style="color:red !important;" role="alert">Sorry, there has been an error.</div>');
//                 jQuery(".errorshow").empty().html('<span style="color:red !important;" role="alert">'+returned_data.message+'</span>');
//              }else{ 
//                 jQuery(".errorshow").empty().html('<span style="color:red !important;" role="alert">'+returned_data.message+'</span>');
//              }
//              setTimeout(function(){
//                 jQuery(".errorshow").empty();
//              }, 3000);
//          }
//      })
//  }); 

jQuery(document).ready(function(){
    jQuery("body").on('click', '.customer_login_checkout', function() {
        var clickedElementContent = jQuery('.login_form_html').html();
        jQuery('.user-login-checkout').empty().append(clickedElementContent);
        jQuery(".user-login-checkout").css('display', 'block');
        jQuery(".billing-detail,.shipping-detail,.pament-detail").addClass('show_hide');
        jQuery(".billing_detail_mobile,.shipping_detail_mobile,.payment_detail_mobile").addClass('show_hide');
    });
    jQuery("body").on('click', '.Continue_without_logging', function() {
        jQuery(".user-login-checkout").css('display', 'none');
        jQuery(".billing-detail,.shipping-detail,.pament-detail").removeClass('show_hide');
        jQuery(".billing_detail_mobile,.shipping_detail_mobile,.payment_detail_mobile").removeClass('show_hide');
    });
    jQuery('.wcplus-account-page .wcplus-MA-Nav-select').click(function () {
        jQuery(this).next('.wcplus-main-nav-mobile').slideToggle();
        jQuery(this).parent('.wcplus-MyAccount-navigation-wrap').toggleClass('active');
    });

    if(jQuery('.wcplus-account-page .wcplus-main-nav-mobile li.is-active a').length > 0) {
        var Wcplus_acc_link_active_text = jQuery('.wcplus-account-page .wcplus-main-nav-mobile li.is-active a').text();
        jQuery('.wcplus-account-page .wcplus-MA-Nav-select .selected').text(Wcplus_acc_link_active_text);
    }
});

function wc_plus_offer_remove_cartJS(data){
    jQuery.ajax({
        url: wcpluscustom_script_ajax.ajax_url,
        type: 'POST',
        dataType: "json",
        data: data,
        beforeSend: function () {
           //jQuery(".preloader_back").show();
        },
        success: function (response) {
            if(response.success){
                //jQuery("#wcplus_ajaxcheckbox_"+data.postID).addClass('wcplus-none-click');
                jQuery( document.body ).trigger( 'update_checkout' );
                }else{
                    alert("You cannot remove now.");
                }
             
        }
    });
}
function wc_plus_offer_add_cartJS(data){
    jQuery.ajax({
        url: wcpluscustom_script_ajax.ajax_url,
        type: 'POST',
        dataType: "json",
        data: data,
        beforeSend: function () {
           //jQuery(".preloader_back").show();
        },
        success: function (response) {
            if(response.success){
                //jQuery("#wcplus_ajaxcheckbox_"+data.postID).addClass('wcplus-none-click');
                jQuery( document.body ).trigger( 'update_checkout' );
                }else{
                    alert("You cannot add now.");
                }
             
        }
    });
}
function openTab(event, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        tabcontent[i].classList.remove("active");
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }
    var selectedTab = document.getElementById(tabName);
    if (selectedTab) {
        selectedTab.style.display = "block";
        selectedTab.classList.add("active");
    }
    event.currentTarget.classList.add("active");
    document.querySelector('input[name="payment_method"][value="' + tabName + '"]').checked = true;
}
window.document.onload = function(e){ 
    // Open the first tab by default
    document.querySelector('.tablinks.active').click();
}