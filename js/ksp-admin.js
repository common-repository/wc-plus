var $ = jQuery;

	jQuery(function($) {

        jQuery("#cart_icon_enable").on('click',function(){
            if(jQuery("#cart_icon_enable").is(':checked')){
                if(jQuery("#cart_icon_sidebar").is(':checked')){
                    jQuery("#cart_icon_sidebar").prop("checked", false); 
                }
            }
          
        });
        jQuery("#cart_icon_sidebar").on('click',function(){
            if(jQuery("#cart_icon_sidebar").is(':checked')){
                if(jQuery("#cart_icon_enable").is(':checked')){
                    jQuery("#cart_icon_enable").prop("checked", false); 
                }
            }
          
        });

        jQuery('body').on('click', '#update_cart_popup', function() {
           if(jQuery("#cart_icon_enable").is(':checked')){
                var checked = 1;
                jQuery(".wcplus-upsell-box-active").removeClass('active-upsell-box');
            }else{
                var checked = 0;
                jQuery(".wcplus-upsell-box-active").addClass('active-upsell-box');
            }
            var cart_icon_sidebar = (jQuery("#cart_icon_sidebar").is(':checked')) ? 1 : 0;
            var data = {
                "cart_icon_enable_popup": checked,
                "cart_icon_enable_sidebar": cart_icon_sidebar,
                "action": "pluswc_cart_popup_base"
               }
            ajax_call_data(data); 
        });

        jQuery('body').on('click', '#update_cart_upsell', function() {
         
            var wcpluscheckboxValues = [];
            jQuery('input[name="wcplusproduct_categories[]"]:checked').each(function() {
                wcpluscheckboxValues.push(jQuery(this).val());
            });
            var products = jQuery("input[name='selected_product']").val();
            var products_index = jQuery("input[name='selected_product_index']").val();
            //var cart_icon_enable = (jQuery("#cart_icon_enable").is(':checked')) ? 1 : 0;
            var data = {
                "upsellproduct":products,
                "upsellproduct_index":products_index,
                "action": "pluswc_cart_upsell_base"
               }
            ajax_call_data(data); 
        });

        // jQuery("#cart_icon_upsell").on('click',function(){
        //     if(jQuery("#cart_icon_upsell").is(':checked')){
        //         if(jQuery("#cart_icon_upsell_tags").is(':checked')){
        //             jQuery("#cart_icon_upsell_tags").prop("checked", false); 
        //         }
        //     }
          
        // });
        // jQuery("#cart_icon_upsell_tags").on('click',function(){
        //     if(jQuery("#cart_icon_upsell_tags").is(':checked')){
        //         if(jQuery("#cart_icon_upsell").is(':checked')){
        //             jQuery("#cart_icon_upsell").prop("checked", false); 
        //         }
        //     }
          
        // });

        jQuery('body').on('click', '#update_cart_upsell_tags', function() {
           
            var products = jQuery("input[name='selected_product_tags']").val();
            var products_index = jQuery("input[name='selected_product_index_tags']").val();
            //var cart_icon_enable = (jQuery("#cart_icon_enable").is(':checked')) ? 1 : 0;
            var data = {
                "upsellproduct":products,
                "upsellproduct_index":products_index,
                "action": "pluswc_cart_upsell_base_tags_base"
               }
            ajax_call_data(data); 
        });

        jQuery('body').on('click', '#update_wcplus_select_upsell', function() {
           if(jQuery("#wcplus_select_enable_upsell").is(':checked')){
                var checked = 1;
            }else{
                var checked = 0;
            }
            var optionvalue = jQuery("#selected_allupsell").val();
            var selected_allupsell_key = jQuery("#selected_allupsell_key").val();
            jQuery(".plugin-inner-contents").removeClass('show-upsell');
            jQuery(".plugin-inner-contents").addClass('hide-upsell');
            // jQuery("#linked-upsell").addClass('hide-upsell');
            // jQuery("#linked-category").addClass('hide-upsell');
            // jQuery("#linked-tags").addClass('hide-upsell');
            // jQuery("#same-cate-upsell").addClass('hide-upsell');

            //alert(optionvalue);
            var data = {
                "wcplus_select_enable_upsell": checked,
                "wcplus_select_option": optionvalue,
                "wcplus_selecte_option_key": selected_allupsell_key,
                "action": "pluswc_wcplus_select_upsell_base"
               }
            ajax_call_upsell(data); 
        });

        jQuery('body').on('click', '#update_cart_bg_color', function() {
           var headerbg_bk = jQuery("#headerbg_bk").val();
           var headertext_color = jQuery("#headertext_color").val();
           var buttonbg_color = jQuery("#buttonbg_color").val();
           var buttontext_color = jQuery("#buttontext_color").val();
           var alltext_color = jQuery("#alltext_color").val();
           var alltext_colour_savingbg = jQuery("#alltext_colour_savingbg").val();
           var alltext_color_saving = jQuery("#alltext_color_saving").val();
           var alltext_colour = jQuery("#alltext_colour").val();
            //var cart_icon_enable = (jQuery("#cart_icon_enable").is(':checked')) ? 1 : 0;
            var data = {
                "headerbg_bk": headerbg_bk,
                "headertext_color": headertext_color,
                "buttonbg_color": buttonbg_color,
                "buttontext_color": buttontext_color,
                "alltext_color": alltext_color,
                "alltext_colour_savingbg": alltext_colour_savingbg,
                "alltext_color_saving": alltext_color_saving,
                "alltext_colour": alltext_colour,
                "action": "save_cart_bgcolor_update"
               }
            ajax_call_data(data); 
        });

	});