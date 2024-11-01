jQuery(function() {
	jQuery("input[type=color]").change(function(event) {
		var id = jQuery(this).attr("id");
		let colorInput = document.getElementById(id);
		let colorValue = colorInput.value;
		jQuery('#'+id+'_span').empty().val(colorValue);	
	});

	jQuery('.color-value').on('input', function() {
		var id = jQuery(this).attr("data-id");
	  jQuery('#'+id).val(this.value);
	});

    jQuery(".wcplus-cart-setting").addClass('active');
    
    jQuery(".wcplus-brand-header").addClass('active');
    jQuery(".list-item").click(function(){
	   	var id = jQuery(this).attr("id"); 
	   	jQuery(".list-item").removeClass('active');
	   	jQuery(this).addClass('active');
	    jQuery(".plugin-inner-content").removeClass("active");
	    jQuery("."+id).addClass("active");
	});

});

function ajax_call_upsell(data){
        jQuery.ajax({
            url: wcpluscustom_script_ajax.ajax_url,
            type: 'POST',
            dataType: "json",
            data: data,
            beforeSend: function () {
                jQuery(".preloader_back").show();
            },
            success: function (response) {
                jQuery(".preloader_back").hide();
                togglePopup();
                jQuery("#"+data.wcplus_select_option).addClass('show-upsell');
                setTimeout(function(){ togglePopup(); }, 3000);
            }
        });
    }

function ajax_call_data(data){
    	jQuery.ajax({
            url: wcpluscustom_script_ajax.ajax_url,
            type: 'POST',
            dataType: "json",
            data: data,
            beforeSend: function () {
                jQuery(".preloader_back").show();
            },
            success: function (response) {
            	jQuery(".preloader_back").hide();
            	togglePopup();
            	setTimeout(function(){ togglePopup(); }, 3000);
            }
        });
    }
function togglePopup() {
        jQuery(".cart_popup").toggle();
    }