<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Free_Education
 */

if ( ! function_exists( 'free_education_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function free_education_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'free-education' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'free-education' ) . '</span>', $categories_list ); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'free-education' ) );
            if ( $tags_list ) {
                /* translators: 1: list of tags. */
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'free-education' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            }
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'free-education' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'free-education' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function free_education_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'free_education_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function free_education_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'free_education_pingback_header' );


/**
 * Enqueue Scripts and styles for admin
 *
 * @since 1.0.0
 */
function free_education_admin_scripts_style() {

    if ( function_exists( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }

    wp_enqueue_script( 'jquery-ui-button' );

    wp_enqueue_style( 'free-education-admin-style', get_template_directory_uri() .'/assets/css/free-edu-admin-styles.css', array(), esc_attr( '1.0.0' ) );

    wp_enqueue_script( 'free-education-admin-script', get_template_directory_uri() .'/assets/js/free-edu-admin-scripts.js', array('jquery'), esc_attr( '1.0.0' ), true );
}
add_action( 'admin_enqueue_scripts', 'free_education_admin_scripts_style' );



/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Define font awesome icons
 *
 * @return array();
 * @since 1.0.0
 */
if( ! function_exists( 'free_education_font_awesome_icon_array' ) ) :
    function free_education_font_awesome_icon_array(){
        return array("fa fa-glass","fa fa-music","fa fa-search","fa fa-envelope-o","fa fa-heart","fa fa-star","fa fa-star-o","fa fa-user","fa fa-film","fa fa-th-large","fa fa-th","fa fa-th-list","fa fa-check","fa fa-remove","fa fa-close","fa fa-times","fa fa-search-plus","fa fa-search-minus","fa fa-power-off","fa fa-signal","fa fa-gear","fa fa-cog","fa fa-trash-o","fa fa-home","fa fa-file-o","fa fa-clock-o","fa fa-road","fa fa-download","fa fa-arrow-circle-o-down","fa fa-arrow-circle-o-up","fa fa-inbox","fa fa-play-circle-o","fa fa-rotate-right","fa fa-repeat","fa fa-refresh","fa fa-list-alt","fa fa-lock","fa fa-flag","fa fa-headphones","fa fa-volume-off","fa fa-volume-down","fa fa-volume-up","fa fa-qrcode","fa fa-barcode","fa fa-tag","fa fa-tags","fa fa-book","fa fa-bookmark","fa fa-print","fa fa-camera","fa fa-font","fa fa-bold","fa fa-italic","fa fa-text-height","fa fa-text-width","fa fa-align-left","fa fa-align-center","fa fa-align-right","fa fa-align-justify","fa fa-list","fa fa-dedent","fa fa-outdent","fa fa-indent","fa fa-video-camera","fa fa-photo","fa fa-image","fa fa-picture-o","fa fa-pencil","fa fa-map-marker","fa fa-adjust","fa fa-tint","fa fa-edit","fa fa-pencil-square-o","fa fa-share-square-o","fa fa-check-square-o","fa fa-arrows","fa fa-step-backward","fa fa-fast-backward","fa fa-backward","fa fa-play","fa fa-pause","fa fa-stop","fa fa-forward","fa fa-fast-forward","fa fa-step-forward","fa fa-eject","fa fa-chevron-left","fa fa-chevron-right","fa fa-plus-circle","fa fa-minus-circle","fa fa-times-circle","fa fa-check-circle","fa fa-question-circle","fa fa-info-circle","fa fa-crosshairs","fa fa-times-circle-o","fa fa-check-circle-o","fa fa-ban","fa fa-arrow-left","fa fa-arrow-right","fa fa-arrow-up","fa fa-arrow-down","fa fa-mail-forward","fa fa-share","fa fa-expand","fa fa-compress","fa fa-plus","fa fa-minus","fa fa-asterisk","fa fa-exclamation-circle","fa fa-gift","fa fa-leaf","fa fa-fire","fa fa-eye","fa fa-eye-slash","fa fa-warning","fa fa-exclamation-triangle","fa fa-plane","fa fa-calendar","fa fa-random","fa fa-comment","fa fa-magnet","fa fa-chevron-up","fa fa-chevron-down","fa fa-retweet","fa fa-shopping-cart","fa fa-folder","fa fa-folder-open","fa fa-arrows-v","fa fa-arrows-h","fa fa-bar-chart-o","fa fa-bar-chart","fa fa-twitter-square","fa fa-facebook-square","fa fa-camera-retro","fa fa-key","fa fa-gears","fa fa-cogs","fa fa-comments","fa fa-thumbs-o-up","fa fa-thumbs-o-down","fa fa-star-half","fa fa-heart-o","fa fa-sign-out","fa fa-linkedin-square","fa fa-thumb-tack","fa fa-external-link","fa fa-sign-in","fa fa-trophy","fa fa-github-square","fa fa-upload","fa fa-lemon-o","fa fa-phone","fa fa-square-o","fa fa-bookmark-o","fa fa-phone-square","fa fa-twitter","fa fa-facebook-f","fa fa-facebook","fa fa-github","fa fa-unlock","fa fa-credit-card","fa fa-feed","fa fa-rss","fa fa-hdd-o","fa fa-bullhorn","fa fa-bell","fa fa-certificate","fa fa-hand-o-right","fa fa-hand-o-left","fa fa-hand-o-up","fa fa-hand-o-down","fa fa-arrow-circle-left","fa fa-arrow-circle-right","fa fa-arrow-circle-up","fa fa-arrow-circle-down","fa fa-globe","fa fa-wrench","fa fa-tasks","fa fa-filter","fa fa-briefcase","fa fa-arrows-alt","fa fa-group","fa fa-users","fa fa-chain","fa fa-link","fa fa-cloud","fa fa-flask","fa fa-cut","fa fa-scissors","fa fa-copy","fa fa-files-o","fa fa-paperclip","fa fa-save","fa fa-floppy-o","fa fa-square","fa fa-navicon","fa fa-reorder","fa fa-bars","fa fa-list-ul","fa fa-list-ol","fa fa-strikethrough","fa fa-underline","fa fa-table","fa fa-magic","fa fa-truck","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus-square","fa fa-google-plus","fa fa-money","fa fa-caret-down","fa fa-caret-up","fa fa-caret-left","fa fa-caret-right","fa fa-columns","fa fa-unsorted","fa fa-sort","fa fa-sort-down","fa fa-sort-desc","fa fa-sort-up","fa fa-sort-asc","fa fa-envelope","fa fa-linkedin","fa fa-rotate-left","fa fa-undo","fa fa-legal","fa fa-gavel","fa fa-dashboard","fa fa-tachometer","fa fa-comment-o","fa fa-comments-o","fa fa-flash","fa fa-bolt","fa fa-sitemap","fa fa-umbrella","fa fa-paste","fa fa-clipboard","fa fa-lightbulb-o","fa fa-exchange","fa fa-cloud-download","fa fa-cloud-upload","fa fa-user-md","fa fa-stethoscope","fa fa-suitcase","fa fa-bell-o","fa fa-coffee","fa fa-cutlery","fa fa-file-text-o","fa fa-building-o","fa fa-hospital-o","fa fa-ambulance","fa fa-medkit","fa fa-fighter-jet","fa fa-beer","fa fa-h-square","fa fa-plus-square","fa fa-angle-double-left","fa fa-angle-double-right","fa fa-angle-double-up","fa fa-angle-double-down","fa fa-angle-left","fa fa-angle-right","fa fa-angle-up","fa fa-angle-down","fa fa-desktop","fa fa-laptop","fa fa-tablet","fa fa-mobile-phone","fa fa-mobile","fa fa-circle-o","fa fa-quote-left","fa fa-quote-right","fa fa-spinner","fa fa-circle","fa fa-mail-reply","fa fa-reply","fa fa-github-alt","fa fa-folder-o","fa fa-folder-open-o","fa fa-smile-o","fa fa-frown-o","fa fa-meh-o","fa fa-gamepad","fa fa-keyboard-o","fa fa-flag-o","fa fa-flag-checkered","fa fa-terminal","fa fa-code","fa fa-mail-reply-all","fa fa-reply-all","fa fa-star-half-empty","fa fa-star-half-full","fa fa-star-half-o","fa fa-location-arrow","fa fa-crop","fa fa-code-fork","fa fa-unlink","fa fa-chain-broken","fa fa-question","fa fa-info","fa fa-exclamation","fa fa-superscript","fa fa-subscript","fa fa-eraser","fa fa-puzzle-piece","fa fa-microphone","fa fa-microphone-slash","fa fa-shield","fa fa-calendar-o","fa fa-fire-extinguisher","fa fa-rocket","fa fa-maxcdn","fa fa-chevron-circle-left","fa fa-chevron-circle-right","fa fa-chevron-circle-up","fa fa-chevron-circle-down","fa fa-html5","fa fa-css3","fa fa-anchor","fa fa-unlock-alt","fa fa-bullseye","fa fa-ellipsis-h","fa fa-ellipsis-v","fa fa-rss-square","fa fa-play-circle","fa fa-ticket","fa fa-minus-square","fa fa-minus-square-o","fa fa-level-up","fa fa-level-down","fa fa-check-square","fa fa-pencil-square","fa fa-external-link-square","fa fa-share-square","fa fa-compass","fa fa-toggle-down","fa fa-caret-square-o-down","fa fa-toggle-up","fa fa-caret-square-o-up","fa fa-toggle-right","fa fa-caret-square-o-right","fa fa-euro","fa fa-eur","fa fa-gbp","fa fa-dollar","fa fa-usd","fa fa-rupee","fa fa-inr","fa fa-cny","fa fa-rmb","fa fa-yen","fa fa-jpy","fa fa-ruble","fa fa-rouble","fa fa-rub","fa fa-won","fa fa-krw","fa fa-bitcoin","fa fa-btc","fa fa-file","fa fa-file-text","fa fa-sort-alpha-asc","fa fa-sort-alpha-desc","fa fa-sort-amount-asc","fa fa-sort-amount-desc","fa fa-sort-numeric-asc","fa fa-sort-numeric-desc","fa fa-thumbs-up","fa fa-thumbs-down","fa fa-youtube-square","fa fa-youtube","fa fa-xing","fa fa-xing-square","fa fa-youtube-play","fa fa-dropbox","fa fa-stack-overflow","fa fa-instagram","fa fa-flickr","fa fa-adn","fa fa-bitbucket","fa fa-bitbucket-square","fa fa-tumblr","fa fa-tumblr-square","fa fa-long-arrow-down","fa fa-long-arrow-up","fa fa-long-arrow-left","fa fa-long-arrow-right","fa fa-apple","fa fa-windows","fa fa-android","fa fa-linux","fa fa-dribbble","fa fa-skype","fa fa-foursquare","fa fa-trello","fa fa-female","fa fa-male","fa fa-gittip","fa fa-gratipay","fa fa-sun-o","fa fa-moon-o","fa fa-archive","fa fa-bug","fa fa-vk","fa fa-weibo","fa fa-renren","fa fa-pagelines","fa fa-stack-exchange","fa fa-arrow-circle-o-right","fa fa-arrow-circle-o-left","fa fa-toggle-left","fa fa-caret-square-o-left","fa fa-dot-circle-o","fa fa-wheelchair","fa fa-vimeo-square","fa fa-turkish-lira","fa fa-try","fa fa-plus-square-o","fa fa-space-shuttle","fa fa-slack","fa fa-envelope-square","fa fa-wordpress","fa fa-openid","fa fa-institution","fa fa-bank","fa fa-university","fa fa-mortar-board","fa fa-graduation-cap","fa fa-yahoo","fa fa-google","fa fa-reddit","fa fa-reddit-square","fa fa-stumbleupon-circle","fa fa-stumbleupon","fa fa-delicious","fa fa-digg","fa fa-pied-piper-pp","fa fa-pied-piper-alt","fa fa-drupal","fa fa-joomla","fa fa-language","fa fa-fax","fa fa-building","fa fa-child","fa fa-paw","fa fa-spoon","fa fa-cube","fa fa-cubes","fa fa-behance","fa fa-behance-square","fa fa-steam","fa fa-steam-square","fa fa-recycle","fa fa-automobile","fa fa-car","fa fa-cab","fa fa-taxi","fa fa-tree","fa fa-spotify","fa fa-deviantart","fa fa-soundcloud","fa fa-database","fa fa-file-pdf-o","fa fa-file-word-o","fa fa-file-excel-o","fa fa-file-powerpoint-o","fa fa-file-photo-o","fa fa-file-picture-o","fa fa-file-image-o","fa fa-file-zip-o","fa fa-file-archive-o","fa fa-file-sound-o","fa fa-file-audio-o","fa fa-file-movie-o","fa fa-file-video-o","fa fa-file-code-o","fa fa-vine","fa fa-codepen","fa fa-jsfiddle","fa fa-life-bouy","fa fa-life-buoy","fa fa-life-saver","fa fa-support","fa fa-life-ring","fa fa-circle-o-notch","fa fa-ra","fa fa-resistance","fa fa-rebel","fa fa-ge","fa fa-empire","fa fa-git-square","fa fa-git","fa fa-y-combinator-square","fa fa-yc-square","fa fa-hacker-news","fa fa-tencent-weibo","fa fa-qq","fa fa-wechat","fa fa-weixin","fa fa-send","fa fa-paper-plane","fa fa-send-o","fa fa-paper-plane-o","fa fa-history","fa fa-circle-thin","fa fa-header","fa fa-paragraph","fa fa-sliders","fa fa-share-alt","fa fa-share-alt-square","fa fa-bomb","fa fa-soccer-ball-o","fa fa-futbol-o","fa fa-tty","fa fa-binoculars","fa fa-plug","fa fa-slideshare","fa fa-twitch","fa fa-yelp","fa fa-newspaper-o","fa fa-wifi","fa fa-calculator","fa fa-paypal","fa fa-google-wallet","fa fa-cc-visa","fa fa-cc-mastercard","fa fa-cc-discover","fa fa-cc-amex","fa fa-cc-paypal","fa fa-cc-stripe","fa fa-bell-slash","fa fa-bell-slash-o","fa fa-trash","fa fa-copyright","fa fa-at","fa fa-eyedropper","fa fa-paint-brush","fa fa-birthday-cake","fa fa-area-chart","fa fa-pie-chart","fa fa-line-chart","fa fa-lastfm","fa fa-lastfm-square","fa fa-toggle-off","fa fa-toggle-on","fa fa-bicycle","fa fa-bus","fa fa-ioxhost","fa fa-angellist","fa fa-cc","fa fa-shekel","fa fa-sheqel","fa fa-ils","fa fa-meanpath","fa fa-buysellads","fa fa-connectdevelop","fa fa-dashcube","fa fa-forumbee","fa fa-leanpub","fa fa-sellsy","fa fa-shirtsinbulk","fa fa-simplybuilt","fa fa-skyatlas","fa fa-cart-plus","fa fa-cart-arrow-down","fa fa-diamond","fa fa-ship","fa fa-user-secret","fa fa-motorcycle","fa fa-street-view","fa fa-heartbeat","fa fa-venus","fa fa-mars","fa fa-mercury","fa fa-intersex","fa fa-transgender","fa fa-transgender-alt","fa fa-venus-double","fa fa-mars-double","fa fa-venus-mars","fa fa-mars-stroke","fa fa-mars-stroke-v","fa fa-mars-stroke-h","fa fa-neuter","fa fa-genderless","fa fa-facebook-official","fa fa-pinterest-p","fa fa-whatsapp","fa fa-server","fa fa-user-plus","fa fa-user-times","fa fa-hotel","fa fa-bed","fa fa-viacoin","fa fa-train","fa fa-subway","fa fa-medium","fa fa-yc","fa fa-y-combinator","fa fa-optin-monster","fa fa-opencart","fa fa-expeditedssl","fa fa-battery-4","fa fa-battery-full","fa fa-battery-3","fa fa-battery-three-quarters","fa fa-battery-2","fa fa-battery-half","fa fa-battery-1","fa fa-battery-quarter","fa fa-battery-0","fa fa-battery-empty","fa fa-mouse-pointer","fa fa-i-cursor","fa fa-object-group","fa fa-object-ungroup","fa fa-sticky-note","fa fa-sticky-note-o","fa fa-cc-jcb","fa fa-cc-diners-club","fa fa-clone","fa fa-balance-scale","fa fa-hourglass-o","fa fa-hourglass-1","fa fa-hourglass-start","fa fa-hourglass-2","fa fa-hourglass-half","fa fa-hourglass-3","fa fa-hourglass-end","fa fa-hourglass","fa fa-hand-grab-o","fa fa-hand-rock-o","fa fa-hand-stop-o","fa fa-hand-paper-o","fa fa-hand-scissors-o","fa fa-hand-lizard-o","fa fa-hand-spock-o","fa fa-hand-pointer-o","fa fa-hand-peace-o","fa fa-trademark","fa fa-registered","fa fa-creative-commons","fa fa-gg","fa fa-gg-circle","fa fa-tripadvisor","fa fa-odnoklassniki","fa fa-odnoklassniki-square","fa fa-get-pocket","fa fa-wikipedia-w","fa fa-safari","fa fa-chrome","fa fa-firefox","fa fa-opera","fa fa-internet-explorer","fa fa-tv","fa fa-television","fa fa-contao","fa fa-500px","fa fa-amazon","fa fa-calendar-plus-o","fa fa-calendar-minus-o","fa fa-calendar-times-o","fa fa-calendar-check-o","fa fa-industry","fa fa-map-pin","fa fa-map-signs","fa fa-map-o","fa fa-map","fa fa-commenting","fa fa-commenting-o","fa fa-houzz","fa fa-vimeo","fa fa-black-tie","fa fa-fonticons","fa fa-reddit-alien","fa fa-edge","fa fa-credit-card-alt","fa fa-codiepie","fa fa-modx","fa fa-fort-awesome","fa fa-usb","fa fa-product-hunt","fa fa-mixcloud","fa fa-scribd","fa fa-pause-circle","fa fa-pause-circle-o","fa fa-stop-circle","fa fa-stop-circle-o","fa fa-shopping-bag","fa fa-shopping-basket","fa fa-hashtag","fa fa-bluetooth","fa fa-bluetooth-b","fa fa-percent","fa fa-gitlab","fa fa-wpbeginner","fa fa-wpforms","fa fa-envira","fa fa-universal-access","fa fa-wheelchair-alt","fa fa-question-circle-o","fa fa-blind","fa fa-audio-description","fa fa-volume-control-phone","fa fa-braille","fa fa-assistive-listening-systems","fa fa-asl-interpreting","fa fa-american-sign-language-interpreting","fa fa-deafness","fa fa-hard-of-hearing","fa fa-deaf","fa fa-glide","fa fa-glide-g","fa fa-signing","fa fa-sign-language","fa fa-low-vision","fa fa-viadeo","fa fa-viadeo-square","fa fa-snapchat","fa fa-snapchat-ghost","fa fa-snapchat-square","fa fa-pied-piper","fa fa-first-order","fa fa-yoast","fa fa-themeisle","fa fa-google-plus-circle","fa fa-google-plus-official","fa fa-fa","fa fa-font-awesome");
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Define font awesome social media icons
 *
 * @return array();
 * @since 1.0.0
 */
if( ! function_exists( 'free_education_font_awesome_social_icon_array' ) ) :
    function free_education_font_awesome_social_icon_array(){
        return array(
            "fa fa-facebook-square","fa fa-facebook-f","fa fa-facebook","fa fa-facebook-official","fa fa-twitter-square","fa fa-twitter","fa fa-yahoo","fa fa-behance","fa fa-dribbble","fa fa-google","fa fa-google-wallet","fa fa-google-plus-circle","fa fa-google-plus-official","fa fa-instagram","fa fa-linkedin-square","fa fa-linkedin","fa fa-pinterest-p","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus-square","fa fa-google-plus","fa fa-youtube-square","fa fa-youtube","fa fa-youtube-play","fa fa-vimeo","fa fa-vimeo-square",
        );
    }
endif;

/*
* Top Header Items    
*/
if( !function_exists('free_education_top_header_items') ):
    function free_education_top_header_items(){ 
        $get_top_header_items = get_theme_mod( 'free_education_top_header_items', '' );
        $get_decode_top_header_items = json_decode( $get_top_header_items );

        if( ! empty( $get_decode_top_header_items ) ) {
            echo '<ul class="content">';
            foreach ( $get_decode_top_header_items as $single_item ) {
                $item_icon  = $single_item->ed_item_icon;
                $item_info  = $single_item->ed_item_text;
                ?>
                <li><i class="<?php echo esc_attr( $item_icon ); ?>"></i><?php echo esc_html( $item_info ); ?></li>
                <?php
            }
            echo '</ul>';
        }
    }
endif; 

/*
*Top Header Social Icons
*/   
if( ! function_exists( 'free_education_social_media_items' ) ) :
    function free_education_social_media_items() {
        $get_social_media_icons  = get_theme_mod( 'social_media_icons', '' );
        $get_decode_social_media = json_decode( $get_social_media_icons );
        if( !empty( $get_decode_social_media ) ) {
            echo '<ul class="social">';
            foreach ( $get_decode_social_media as $single_icon ) {
                $icon_class = $single_icon->ed_item_social_icon;
                $icon_url = $single_icon->ed_item_url;
                if( !empty( $icon_url ) ) {
                    echo '<li><a href="'. esc_url( $icon_url ) .'" target="_blank"><i class="'. esc_attr( $icon_class ) .'"></i></a></li>';
                }
            }
            echo '</ul><!-- .es-social-icons-wrapper -->';
        }
    }
endif;

/*
* Middle or Inner Header Items
*/
if( ! function_exists('free_education_inner_header_items')):
    function free_education_inner_header_items(){
        $get_inner_header_items = get_theme_mod( 'free_education_inner_header_items' );
        $get_decode_inner_header_items = json_decode( $get_inner_header_items );
        if (!empty($get_decode_inner_header_items)) {
            foreach ($get_decode_inner_header_items as $inner_header_item) {
                $icon_class = $inner_header_item->ed_item_icon;
                $item_title = $inner_header_item->ed_item_text;;
                $item_info  = $inner_header_item->ed_item_text_1;;?>
                <div class="single-widget">
                    <i class="<?php echo esc_attr($icon_class);?>"></i>
                    <h4><?php echo esc_html($item_title);?><span><?php echo esc_html($item_info);?></span></h4>
                </div>
            <?php    }
        }
    }

endif;    

/*
* Banner Section Items
*/
if(! function_exists('free_education_banner_items')):
    function free_education_banner_items(){
        $get_banner_items = get_theme_mod( 'free_education_slider_items' );
        $get_decode_banner_items = json_decode( $get_banner_items );
        if(!empty($get_decode_banner_items)){
            foreach ($get_decode_banner_items as  $banner_item) {
                $item_page_id = $banner_item->ed_dropdown_pages;
                $item_banner_button_1_text = $banner_item->ed_item_text;
                $item_banner_button_1_url = $banner_item->ed_item_url;
                $item_banner_button_2_text = $banner_item->ed_item_text_1;
                $item_banner_button_2_url = $banner_item->ed_item_url_1;
                $banner_img_url = get_the_post_thumbnail_url($item_page_id,'free-education-banner-image-2000x1000');
                $item_page_title = get_post($item_page_id);
                ?>
                <div class="single-slider overlay" style="background-image:url('<?php echo esc_url($banner_img_url);?>')" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="slider-text">
                                    <?php if($item_page_title):?>
                                        <h1><?php echo esc_html($item_page_title->post_title);?></h1>
                                        <p><?php echo esc_html($item_page_title->post_content);?></p>
                                    <?php endif;?>   
                                    <div class="button">
                                        <a href="<?php echo esc_url($item_banner_button_1_url);?>" class="btn primary"><?php echo esc_html($item_banner_button_1_text);?></a>
                                        <a href="<?php echo esc_url($item_banner_button_3_url);?>" class="btn"><?php echo esc_html($item_banner_button_2_text);?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
    }
endif;

if(! function_exists('free_education_enroll_skill_items')):
    function free_education_enroll_skill_items(){
       $get_skill_items = get_theme_mod( 'free_education_enroll_skill_items' );
       $get_decode_skill_items = json_decode( $get_skill_items );
       if(!empty($get_decode_skill_items)){
        foreach ($get_decode_skill_items as  $skill_item) {
            $item_skill_number = $skill_item->ed_item_number;
            $item_skill_percentage= $item_skill_number/100;
            $item_skill_count = $skill_item->ed_item_text;
            $item_skill_title = $skill_item->ed_item_text_1;
            ?>
            <div class="col-lg-4 col-md-4 col-12 wow zoomIn" data-wow-delay="0.8s">
                <!-- Single Skill -->
                <div class="single-skill">
                    <div class="circle" data-value="<?php echo esc_attr($item_skill_percentage);?>" data-size="130">
                        <strong><?php echo esc_html($item_skill_count);?></strong>
                    </div>
                    <h4><?php echo esc_html($item_skill_title);?></h4>
                </div>
                <!--/ End Single Skill -->
            </div>   
            <?php 
        }
    }
}
endif;

/*
* Frontpage Counter Items
*/
if( ! function_exists('free_education_counter_items')):
    function free_education_counter_items(){
        $get_counter_items = get_theme_mod( 'free_education_frontpage_counter_items' );
        $get_decode_counter_items = json_decode( $get_counter_items );
        if (!empty($get_decode_counter_items)) {
            foreach ($get_decode_counter_items as $counter_item) {
                $icon_class = $counter_item->ed_item_icon;
                $item_number = $counter_item->ed_item_text;;
                $item_title  = $counter_item->ed_item_text_1;;?>
                <div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="0.4s">
                    <!-- Single Fact -->
                    <div class="single-fact">
                        <i class="<?php echo esc_attr( $icon_class );?>"></i>
                        <div class="number"><?php echo esc_html($item_number);?></div>
                        <p><?php echo esc_html($item_title);?></p>
                    </div>
                    <!--/ End Single Fact -->
                </div>
            <?php    }
        }
    }
endif;  

/*
* Frontpage Teacher Section 
*/

if(! function_exists('free_education_teacher_items')):
    function free_education_teacher_items(){
        $get_teacher_items = get_theme_mod( 'free_education_teacher_items', '' );
        $get_decode_teacher_items = json_decode( $get_teacher_items );
        if( ! empty( $get_decode_teacher_items ) ) {
            foreach ( $get_decode_teacher_items as $teacher_item ) {
               $item_teacher_id  = $teacher_item->ed_dropdown_teacher;
               $item_teacher_designation  = $teacher_item->ed_item_text;
               $item_teacher_social_icon1  = $teacher_item->ed_item_social_icon;
               $item_teacher_social_icon2  = $teacher_item->ed_item_social_icon_1;
               $item_teacher_social_icon3  = $teacher_item->ed_item_social_icon_2;
               $item_teacher_social_icon4  = $teacher_item->ed_item_social_icon_3;
               $item_teacher_social_icon_url_1  = $teacher_item->ed_item_url;
               $item_teacher_social_icon_url_2  = $teacher_item->ed_item_url_1;
               $item_teacher_social_icon_url_3  = $teacher_item->ed_item_url_2;
               $item_teacher_social_icon_url_4  = $teacher_item->ed_item_url_3;
               $item_teacher_avatar = get_avatar($item_teacher_id,'','','',array('width'=>275,'height'=>370));
               $user_info = get_user_by('id', $item_teacher_id );   
               $first_name = $user_info->first_name;
               $last_name = $user_info->last_name;
               $item_teacher_name = $first_name.' '.$last_name;
               ?>
               <div class="col-lg-3 col-md-6 col-12 wow fadeIn" data-wow-delay="0.4s">
                <!-- Single Team -->
                <div class="single-team">
                    <?php echo $item_teacher_avatar;?>
                    <div class="team-hover">
                        <h4><?php echo esc_html($item_teacher_name);?><span><?php echo esc_html($item_teacher_designation);?></span></h4>
                        <p></p>
                        <ul class="social">
                         <li><a href="<?php echo esc_url($item_teacher_social_icon_url_1);?>"><i class="<?php echo esc_attr($item_teacher_social_icon1);?>"></i></a></li>
                         <li class="active"><a href="<?php echo esc_url($item_teacher_social_icon_url_2);?>"><i class="<?php echo esc_attr($item_teacher_social_icon2);?>"></i></a></li>
                         <li><a href="<?php echo esc_url($item_teacher_social_icon_url_3);?>"><i class="<?php echo esc_attr($item_teacher_social_icon3);?>"></i></a></li>
                         <li><a href="<?php echo esc_url($item_teacher_social_icon_url_4);?>"><i class="<?php echo esc_attr($item_teacher_social_icon4);?>"></i></a></li>     
                     </ul>
                 </div>
             </div>
             <!--/ End Single Team -->
         </div>
     <?php }
 }
}
endif;

if(! function_exists('free_education_contact_page_items')):
    function free_education_contact_page_items(){
        $get_contact_page_items = get_theme_mod( 'free_education_contact_address_items', '' );
        $get_decode_contact_page_items = json_decode( $get_contact_page_items );
        if( ! empty( $get_decode_contact_page_items ) ) {
            foreach ( $get_decode_contact_page_items as $single_item ) {
                $item_icon  = $single_item->ed_item_icon;
                $item_title  = $single_item->ed_item_text;
                $item_info  = $single_item->ed_item_text_1;
                ?>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Contact-Info -->
                    <div class="contact-info">
                        <div class="icon"><i class="<?php echo esc_attr($item_icon );?>"></i></div>
                        <h3><?php echo esc_html($item_title);?></h3>
                        <p><?php echo esc_html($item_info);?></p>
                    </div>
                </div>
            <?php }
        } 
    }
endif;


