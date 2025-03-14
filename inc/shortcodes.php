<?
add_shortcode( 'langswitcher', 'langswitcher_shortcode' );
function langswitcher_shortcode( $atts ) {
    
    global $wp;
    
    $sites_ids = get_sites( array(
    	'fields'            => 'ids',
    	'site__not_in'      => array(get_current_blog_id(), get_main_site_id(), 13),
    ) );
    
    
    $current_lang_text = carbon_get_theme_option( 'lang_text' );
    $current_lang_icon = carbon_get_theme_option( 'lang_icon' );
    
    
    $html = '';
    $html .= '<div class="lang-switcher-container">';
    $html .= '<div class="lang-switcher">';
    $html .= '<svg class="lang-switcher__arrow" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.831 1.37964L6.3149 5.37963C6.13369 5.54012 5.8663 5.54012 5.6851 5.37963L1.16898 1.37964C0.966081 1.19992 0.942583 0.884276 1.1165 0.674613C1.29041 0.464951 1.59588 0.44067 1.79878 0.62038L6 4.34146L10.2012 0.620381C10.4041 0.44067 10.7096 0.464952 10.8835 0.674614C11.0574 0.884277 11.0339 1.19993 10.831 1.37964Z" fill="white" stroke="white" stroke-width="0.3" stroke-linecap="round"/></svg>';
    $html .= '<span class="lang-switcher__text">' . $current_lang_text . '</span>';
    $html .= '<img class="lang-switcher__icon" src="'. $current_lang_icon .'">'; 
    $html .= '</div>';
    $html .= '<div class="langs-list">';
    foreach($sites_ids as $id):
    $lang_text = get_blog_option( $id, '_lang_text' );
    $lang_icon = get_blog_option( $id, '_lang_icon' );
    $html .= '<a href="'. get_site_url( $id, $wp->request, 'https' ) .'" class="langs-list__link">';
    $html .= '<span class="langs-list__link-text">' . $lang_text . '</span>';
    $html .= '<img class="langs-list__link-icon" src="'. $lang_icon .'">'; 
    $html .= '</a>';
    endforeach;
    $html .= '</div>';
    $html .= '</div>';
    if(carbon_get_post_meta( get_the_ID(), 'hide_lang_switcher' )){
        return;
    }else{
        return $html;
    }
    
}


add_action( 'wp', function() {
    global $wp;
   
	if( get_current_blog_id() == get_main_site_id() ){
    		wp_redirect(  get_site_url( 4, $wp->request . get_params_string(), 'https' ), 301 ); //en
    		exit;   
       }
} );




?>