<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' );
$enable_skip_link = apply_filters( 'hello_elementor_enable_skip_link', true );
$skip_link_url = apply_filters( 'hello_elementor_skip_link_url', '#content' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri().'/assets/images/logo.png';?>" >
    <meta property="og:title" content="Virtual Communities: Navigating the World of Online Connection"/>
	<meta property="og:description" content="Explore the realm of Virtual Communities and uncover the dynamics of online connections." />
	<meta property="og:image" content="https://www.cmxchat.com/wp-content/uploads/2023/12/ai-assistance.png" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="Virtual Communities: Navigating the World of Online Connection" />
	<meta name="twitter:description" content="Explore the realm of Virtual Communities and uncover the dynamics of online connections."/>
	<script type="application/ld+json">{"@context":"https://schema.org","@type":"Article","name":"Virtual Communities: Navigating the World of Online Connection"}</script>
	<meta name="twitter:image" content="https://www.cmxchat.com/wp-content/uploads/2023/12/ai-assistance.png"/>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TL5MPMR');</script>
	<!-- End Google Tag Manager -->



</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TL5MPMR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php wp_body_open(); ?>

<?php if ( $enable_skip_link ) { ?>
<a class="skip-link screen-reader-text" href="<?php echo esc_url( $skip_link_url ); ?>"><?php echo esc_html__( 'Skip to content', 'hello-elementor' ); ?></a>
<?php } ?>

<?php
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
	if ( hello_elementor_display_header_footer() ) {
		if ( did_action( 'elementor/loaded' ) && hello_header_footer_experiment_active() ) {
			get_template_part( 'template-parts/dynamic-header' );
		} else {
			get_template_part( 'template-parts/header' );
		}
	}
	
}
