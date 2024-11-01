jQuery(function($) {
		jQuery('body').on('click', '#body_custom_php', function() {
            var php_data = jQuery("textarea[name='php_data']").val();
            var data = {
		        "php_data": php_data,
		        "action": "pluswc_custom_php_base"
		       }
		    ajax_call_data(data);
        });
        jQuery('body').on('click', '#body_custom_header', function() {
            var header_data = jQuery("textarea[name='header_data']").val();
            var data = {
		        "header_data": header_data,
		        "action": "pluswc_same_header_base"
		       }
		    ajax_call_data(data);
        });
        jQuery("#enable_googlekey").on('click',function(){
        	if(jQuery("#enable_googlekey").is(':checked')){
	        	if(jQuery("#enable_googlekey_two").is(':checked')){
	            	jQuery("#enable_googlekey_two").prop("checked", false); 
	            }
	        }
		  
		});
		jQuery("#enable_googlekey_two").on('click',function(){
        	if(jQuery("#enable_googlekey_two").is(':checked')){
	        	if(jQuery("#enable_googlekey").is(':checked')){
	            	jQuery("#enable_googlekey").prop("checked", false); 
	            }
	        }
		  
		});
        jQuery('body').on('click', '#update_mapkey', function() {
            var map_key = jQuery("input[name='map_key_one']").val();
            if(jQuery("#enable_googlekey").is(':checked')){
            	var checked = 1;
            }else{
            	var checked = 0;
            }
            var keyactive_two = (jQuery("#enable_googlekey_two").is(':checked')) ? 1 : 0;
            if(map_key == ''){
            	jQuery("#error_one").empty().html("Please enter one above");
            	return false;
            }
            jQuery("#error_one").empty();
            var country = jQuery("input[name='selected_country']").val();
            var country_index = jQuery("input[name='selected_country_index']").val();
           
            var data = {
		        "map_key_one": map_key,
		        "active_key_one": checked,
		        "active_key_two": keyactive_two,
                "countries":country,
                "countries_index":country_index,
		        "action": "pluswc_map_key_base"
		       }
		    ajax_call_data(data);
        });
        jQuery('body').on('click', '#update_mapkey_two', function() {
            var map_key = jQuery("input[name='map_key_two']").val();
            if(jQuery("#enable_googlekey_two").is(':checked')){
            	var checked = 1;
            }else{
            	var checked = 0;
            }
            var enable_googlekey = (jQuery("#enable_googlekey").is(':checked')) ? 1 : 0;
            if(map_key == ''){
            	jQuery("#error_two").empty().html("Please enter one above");
            	return false;
            }
            jQuery("#error_two").empty();
           // alert(checked);
            var data = {
		        "map_key_two": map_key,
		        "active_key_two": checked,
		        "active_key_one": enable_googlekey,
		        "action": "pluswc_map_key_base_two_base"
		       }
		    ajax_call_data(data);
        });

        jQuery('body').on('click', '#update_disble_shipping', function() {
            var wcplsdisableShipping = (jQuery("#wcplsdisableShipping").is(':checked')) ? 1 : 0;
           
           // alert(checked);
            var data = {
                "pluswc_disbale_shipping": wcplsdisableShipping,
                "action": "pluswc_disable_shipping_section_base"
               }
            ajax_call_data(data);
        });

        jQuery('body').on('click', '#update_onoff_saving', function() {
            var wcplus_onoff_saving = (jQuery("#wcplus_onoff_saving").is(':checked')) ? 1 : 0;
            var data = {
                "wcplus_onoff_saving": wcplus_onoff_saving,
                "action": "wcplus_onoff_saving_section"
               }
            ajax_call_data(data);
        });

        jQuery('body').on('click', '#update_enable_link_autofill', function() {
            var wcpls_link_autofill = (jQuery("#wcpls_enable_link_autofill").is(':checked')) ? 1 : 0;
           
           // alert(checked);
            var data = {
                "wcpls_link_autofill": wcpls_link_autofill,
                "action": "wcplus_enable_link_autofill"
               }
            ajax_call_data(data);
        });

        jQuery('body').on('click', '#update_disble_guest_ck', function() {
            var wcplsenable_guest_checkout = (jQuery("#wcplsenable_guest_checkout").is(':checked')) ? 1 : 0;
           
           // alert(checked);
            var data = {
                "enable_guest_checkout": wcplsenable_guest_checkout,
                "action": "pluswc_enable_guest_checkout_base"
               }
            ajax_call_data(data);
        });


        jQuery('body').on('click', '#update_checkout_fields', function() {
            var enable_address = (jQuery("#enable_address").is(':checked')) ? 1 : 0;
            var enable_address_two = (jQuery("#enable_address_two").is(':checked')) ? 1 : 0;
            var enable_state = (jQuery("#enable_state").is(':checked')) ? 1 : 0;
            var enable_zipcode = (jQuery("#enable_zipcode").is(':checked')) ? 1 : 0;
           
           // alert(checked);
            var data = {
		        "enable_address": enable_address,
		        "enable_address_two": enable_address_two,
		        "enable_state": enable_state,
		        "enable_zipcode": enable_zipcode,
		        "action": "pluswc_disable_enable_checkout_fields_base"
		       }
		    ajax_call_data(data);
        });

        jQuery('body').on('click', '#update_select_country', function() {
            var country = jQuery("input[name='selected_country']").val();
            var country_index = jQuery("input[name='selected_country_index']").val();
            var data = {
                "countries":country,
                "countries_index":country_index,
                 "action": "restrict_country"
               }
               //console.log("country_data",data);
            ajax_call_data(data);
        });



	});