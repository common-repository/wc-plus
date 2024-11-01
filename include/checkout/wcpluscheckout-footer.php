<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
function pluswc_footer_code() {
$get_results = wcpluscustom_query_base();
$wc_header = wcplusheader_item_base();
$body_step_text_checkout = get_option('wcplus_body_step_text_checkout');
//echo "<pre>";print_r($get_results);
if(!empty($get_results[0]->footer_bg)){
    $footer_bg = 'style="background: '.$get_results[0]->footer_bg.';"';
}else{
    $footer_bg = '';
}
if(!empty($get_results[0]->footer_color)){
    $footer_color = 'style="color: '.$get_results[0]->footer_color.';"';
}else{
    $footer_color = '';
}
if(!empty($get_results[0]->footer_link_color)){
    $footer_link_color = 'style="color: '.$get_results[0]->footer_link_color.';"';
}else{
    $footer_link_color = '';
}
$footer_text = get_footer_data_base();

$checktemplates = get_template_data_base();
//echo "<pre>";print_r($checktemplates);die("fsdfsd");
//{

$class_addtem = ($checktemplates[0]->active_tem == 1) ? 'footer-genral-main' : '';

?>
    <div class="footer-cls <?php echo esc_attr($class_addtem);?>" <?php echo wp_kses_post($footer_bg);?>>
    <div class="wrapper wcpluswrapper">
        <div class="footer-inner">
            <div class="footer-col">
                <p <?php echo wp_kses_post($footer_color);?>><?php echo wp_kses_post($footer_text[0]->footer_bar);?></p>
            </div>
            <div class="footer-col">
                <div class="footer-links">
                    <?php
                    $footerleftlink = json_decode( $footer_text[0]->footer_left_link );
                    $footerleftterm = json_decode( $footer_text[0]->footer_left_term );
                    if($footerleftlink != '#'){ 
                        foreach ($footerleftlink as $key => $value) {
                            ?>
                            <a href="<?php echo esc_url($footerleftterm[$key]);?>"><?php echo wp_kses_post($value);?></a>
                            <?php
                        }
                    }
                    ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
//}
}
add_action( 'wp_footer', 'pluswc_footer_code',2 );

?>