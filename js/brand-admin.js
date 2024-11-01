jQuery(document).ready(function() {
	    var max_fields      = 20;
	    var wrapper         = jQuery(".input_fields_wrap");
	    var add_button      = jQuery(".wcplusadd_field_button");

	    var x = 1; 
	    jQuery(add_button).click(function(e){ 
	        e.preventDefault();
	        if(x < max_fields){ 
	            x++;
	            jQuery(wrapper).append('<div class="accrodin_css"><div class="accrodin_css_left">Footer Text: <input type="text" name="footer_left_link[]" ></div><div class="accrodin_css_right"> Footer Link: <input type="text" name="footer_left_term[]" ></div><a href="#" class="remove_field">Remove</a></div>');
	           // $(wrapper).append('<div><a href="#" class="remove_field">Remove</a></div>');
	        }
	    });

	    jQuery(wrapper).on("click",".remove_field", function(e){ 
	        e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	    });
	});
	 
	// Add media here
	jQuery(function($) {
	   jQuery('#img-upload').click(function(e){
	        e.preventDefault();
	        var upload = wp.media({
	        title:'Choose Image',
	        multiple:false 
	        })
	        .on('select', function(){
	            var select = upload.state().get('selection');
	            var attach = select.first().toJSON();
	            //jQuery('img#img-src').attr('src',attach.url);
	            jQuery("#insert_image").empty().html('<img class="cfw-admin-image-preview" src="'+attach.url+'" width="100" style="max-height: 100px; width: 100px;">');
	            jQuery("#logo_icon").val(attach.url);
	        })
	        .open();
	   });

	   jQuery('#img-upload-footerimg').click(function(e){
	        e.preventDefault();
	    var mediaUploader = wp.media({
	        title: 'Choose Images',
	        multiple: true 
	    });
	    mediaUploader.on('select', function(){
	        var attachments = mediaUploader.state().get('selection').toJSON();
	        jQuery("#insert_image_favicon_footerd").empty();
	        attachments.forEach(function(attachment){
	            var imagePreview = '<div class="image-preview-item">' +
	                                   '<img src="' + attachment.url + '" class="cfw-admin-image-preview" width="100" style="max-height: 100px; width: 100px;">' +
	                                   '<input type="hidden" name="selected_images_footer[]" value="' + attachment.url + '">' +
	                               '</div>';
	            jQuery("#insert_image_favicon_footer").append(imagePreview);
	        });
    	});
    	mediaUploader.open();
	   });

	   jQuery('#img-upload-favicon').click(function(e){
	        e.preventDefault();
	        var upload = wp.media({
	        title:'Choose Image',
	        multiple:false 
	        })
	        .on('select', function(){
	            var select = upload.state().get('selection');
	            var attach = select.first().toJSON();
	            //jQuery('img#img-src').attr('src',attach.url);
	            jQuery("#insert_image_favicon").empty().html('<img class="cfw-admin-image-preview" src="'+attach.url+'" width="100" style="max-height: 100px; width: 100px;">');
	            jQuery("#favicon_icon").val(attach.url);
	        })
	        .open();
	   });
	
        jQuery('body').on('click', '#logo_icon_save', function() {
            var favicon_icon = jQuery("#favicon_icon").val();
            var logo_icon = jQuery("#logo_icon").val();
            var data = {
		        "favicon_icon": favicon_icon,
		        "logo_icon": logo_icon,
		        "action": "pluswc_logo_favicon_logo_base"
		       }

		    ajax_call_data(data);
            
        });

        jQuery('body').on('click', '#update_header_style', function() {
            var color = jQuery("input[name='sidebar_heading_color']").val();
            var textcolor = jQuery("input[name='sidebar_text_color']").val();
            var linkcolor = jQuery("input[name='sidebar_link_color']").val();
            var bk_mobile = jQuery("input[name='bk_mobile']").val();
            var mobile_bk_color = jQuery("#mobile_bk_color").val();
            var cart_bk_color = jQuery("#cart_bk_color").val();
            var cart_text_color = jQuery("#cart_text_color").val();
            var data = {
		        "color": color,
		        "textcolor": textcolor,
		        "linkcolor": linkcolor,
		        "bk_mobile": bk_mobile,
		        "mobile_bk_color": mobile_bk_color,
		        "cart_bk_color": cart_bk_color,
		        "cart_text_color": cart_text_color,
		        "action": "pluswc_header_data_base"
		       }
		    ajax_call_data(data);
        });

        jQuery('body').on('click', '#update_sidebar_bg', function() {
            var sidebar_background = jQuery("input[name='sidebar_background']").val();
            var sidebar_bordercolor = jQuery("input[name='sidebar_bordercolor']").val();
            var review_starcolor = jQuery("input[name='sidebar_starcolor']").val();
            var sidebar_textcolor = jQuery("input[name='sidebar_textcolor']").val();
            var saving_text_color = jQuery("#saving_text_color").val();
            var saving_bg_color = jQuery("#saving_bg_color").val();
            var data = {
		        "sidebar_background": sidebar_background,
		        "sidebar_bordercolor": sidebar_bordercolor,
		        "review_starcolor": review_starcolor,
		        "sidebar_textcolor": sidebar_textcolor,
		        "saving_text_color": saving_text_color,
		        "saving_bg_color": saving_bg_color,
		        "action": "pluswc_sidebar_bg_base"
		       }
		    ajax_call_data(data);
        });

        jQuery("#footerupdate").submit(function(e){
        	e.preventDefault();
		    var ques = jQuery("input[name='footer_left_link[]']").map(function(){
        			return jQuery(this).val();
				}).toArray();
		    var ans = jQuery("input[name='footer_left_term[]']").map(function(){
        			return jQuery(this).val();
				}).toArray();
			    jQuery("#hidden_question").val(ques.join(","));
			    jQuery("#hidden_answer").val(ans.join(","));
			var faqquestion = jQuery("#hidden_question").val();
			var faqanswer = jQuery("#hidden_answer").val();
		    var footer_bar = jQuery("input[name='footer_bar']").val();

            var data = {
		        "footer_bar": footer_bar,
		        "footer_left_link": faqquestion,
		        "footer_left_term": faqanswer,
		        "action": "pluswc_footer_text_base"
		       }
		       ajax_call_data(data);
		    // console.log(fq); 
		});

		jQuery("#footerupdate_images").submit(function(e){
        	e.preventDefault();
		    var text_minimalist = jQuery("#footer_text_minimalist").val();
		    var selected_images_footer = jQuery("input[name='selected_images_footer[]']").map(function(){
        			return jQuery(this).val();
				}).toArray();  
			var selected_img_footer = selected_images_footer.join(",");

            var data = {
		        "selected_img_footer": selected_img_footer,
		        "text_minimalist": text_minimalist,
		        "action": "pluswc_footer_text_base_badge_base"
		       }
		       //console.log(data);
		    ajax_call_data(data);
		    // console.log(fq); 
		});

        jQuery('body').on('click', '#items_update', function() {
            var heading_1 = jQuery("input[name='heading_1']").val();
            var headigitems = jQuery("input[name='headig_items[]']").map(function(){
        			return jQuery(this).val();
				}).toArray();
            jQuery("#hidden_items").val(headigitems.join(","));
            var hiddenitems = jQuery("#hidden_items").val();
            var data = {
		        "heading_1": heading_1,
		        "headig_items": hiddenitems,
		        "action": "pluswc_items_text_base"
		       }
		    ajax_call_data(data);
        });

        jQuery('body').on('click', '#promo_update', function() {
            var promo_bg = jQuery("input[name='promo_bg']").val();
            var promo_color = jQuery("input[name='promo_color']").val();
            var promo_text = jQuery("input[name='promo_text']").val();
            if(jQuery("#enable_promocode").is(':checked')){
            	var enable_promocode = 1;
            }else{
            	var enable_promocode = 0;
            }
            var data = {
		        "promo_bg": promo_bg,
		        "promo_color": promo_color,
		        "promo_text": promo_text,
		        "enable_promocode": enable_promocode,
		        "action": "pluswc_promo_data_base"
		       }
		    ajax_call_data(data);
        });

        jQuery('body').on('click', '#saas_banner_update', function() {
            var banner_bg = jQuery("input[name='banner_bg']").val();
            var banner_color = jQuery("input[name='banner_color']").val();
            if(jQuery("#enable_memberbanner").is(':checked')){
            	var checked = 1;
            }else{
            	var checked = 0;
            }
            if(jQuery("#enablesinglebanner").is(':checked')){
            	var banner_checked = 1;
            }else{
            	var banner_checked = 0;
            }
            var data = {
		        "banner_bg": banner_bg,
		        "banner_color": banner_color,
		        "enable_memberbanner": checked,
		        "enablesinglebanner": banner_checked,
		        "action": "pluswc_banner_data_base"
		       }
		    ajax_call_data(data);
        });

        jQuery('body').on('click', '#body_update', function() {
            var bodycolor = jQuery("input[name='body_bk_color']").val();
            var checkout = jQuery("input[name='body_step_checkout']").val();
            var linkbody = jQuery("input[name='body_link_color']").val();
            var checkoutbtntext_body = jQuery("#checkoutbtntext_body").val();
            var data = {
		        "bodycolor": bodycolor,
		        "checkout": checkout,
		        "linkbody": linkbody,
		        "checkoutbtntext_body": checkoutbtntext_body,
		        "action": "pluswc_body_data_base"
		       }
		    ajax_call_data(data);
        });

        jQuery('body').on('click', '#body_custom_css', function() {
            var css_data = jQuery("textarea[name='css_data']").val();
            var data = {
		        "css_data": css_data,
		        "action": "pluswc_custom_css_base"
		       }
		    ajax_call_data(data);
        });

    });