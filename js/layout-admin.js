jQuery(function($) {
		jQuery('body').on('click', '.templates', function() {
            var attr_id = jQuery(this).attr("data-id");
            var id = jQuery(this).attr("id");
           // alert(attr_id);
            var data = {
		        "attr_id": attr_id,
		        "action": "pluswc_update_template_checkout_base"
		       }

		    ajax_call_layout(data);
            
        });
	});

function ajax_call_layout(data){
	jQuery.ajax({
        url: wcplus_layout_ajax.ajax_url,
        type: 'POST',
        dataType: "json",
        data: data,
        beforeSend: function () {
            jQuery(".preloader_back").show();
        },
        success: function (response) {
        	//jQuery(".preloader_back").hide();
        	//togglePopup();
        	//if(response == 1){
        		location.reload();
        	//}
        	setTimeout(function(){ togglePopup(); }, 3000);
        }
    });
}
