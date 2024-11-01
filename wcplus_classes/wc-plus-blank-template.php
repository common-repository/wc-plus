<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<?php
$addnewclass = '';
if ( is_user_logged_in() ){
	$addnewclass = 'wcplus-logged';
}
?>
<body class="cleanpage wc-plus-body <?php echo esc_attr($addnewclass);?>">
<?php
    while ( have_posts() ) : the_post();  
        the_content();
    endwhile;
?>
<?php wp_footer(); ?>
<div class="wc-plus-body-post-upsell"></div>
</body>
</html>
