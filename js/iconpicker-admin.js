jQuery(function($) {
$('.iconpicker').iconpicker({
        title: 'Icon Picker',
        selected: false,
        defaultValue: false,
        placement: "bottom",
        collision: "none",
        animation: true,
        hideOnSelect: true,
        showFooter: true,
        searchInFooter: false,
        mustAccept: false,
        selectedCustomClass: "bg-primary",
        fullClassFormatter: function (e) {
            return e;
        },
        input: "input,.iconpicker-input",
        inputSearch: false,
        container: false,
        component: ".input-group-addon,.iconpicker-component",
        templates: {
            popover: '<div class="iconpicker-popover popover custom-class-icon" role="tooltip"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
            footer: '<div class="popover-footer"></div>',
           // buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' + ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
            search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
            iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
            iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
        }
    });
    $('.iconpicker').on('iconpickerSelected', function (e) {
        var id = $(this).val();
        var data_id = $(this).attr('data-id');
        $("#"+data_id).empty().html('<i class="'+id+'"><i>');
        //console.log(data_id); 
    });
	});

function add_icon_picker(){
   jQuery(function() {
jQuery('.iconpicker').iconpicker({
        title: 'Icon Picker',
        selected: false,
        defaultValue: false,
        placement: "bottom",
        collision: "none",
        animation: true,
        hideOnSelect: true,
        showFooter: true,
        searchInFooter: false,
        mustAccept: false,
        selectedCustomClass: "bg-primary",
        fullClassFormatter: function (e) {
            return e;
        },
        input: "input,.iconpicker-input",
        inputSearch: false,
        container: false,
        component: ".input-group-addon,.iconpicker-component",
        templates: {
            popover: '<div class="iconpicker-popover popover custom-class-icon" role="tooltip"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
            footer: '<div class="popover-footer"></div>',
           // buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' + ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
            search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
            iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
            iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
        }
    });
    jQuery('.iconpicker').on('iconpickerSelected', function (e) {
        var id = jQuery(this).val();
        var data_id = jQuery(this).attr('data-id');
        jQuery("#"+data_id).empty().html('<i class="'+id+'"><i>');
        //console.log(data_id); 
    });
    });
}