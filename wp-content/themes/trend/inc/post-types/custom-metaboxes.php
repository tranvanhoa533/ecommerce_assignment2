<?php

#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------
# CUSTOM META BOXES FOR TESTIMONIALS - custom post
#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------

function testimonials_add_meta_box() {
	add_meta_box( 'testimonial-details', esc_attr__( 'Testimonial Details', 'trend' ), 'show_testimonials_metabox_callback', 'testimonial', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'testimonials_add_meta_box' );


/* Prints the box content. */
function show_testimonials_metabox_callback( $post ) {
	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'testimonial_details_nonce', 'testimonial_nonce' );

	$job_position = get_post_meta( $post->ID, 'job-position', true );
	$company = get_post_meta( $post->ID, 'company', true );

	echo "<div class='avstudio-metabox'>";
		echo "<style>";
		echo ".metabox-section { float:left;width:100%;padding:10px 0 }";
		echo ".metabox-section label { margin-right:20px;font-weight:bold;width:20%;display:inline-block }";
		echo "</style>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<label for='job-position'>".esc_attr__( 'Job  Position', 'trend' )."</label>";
		echo '<input type="text" name="job-position" value="' . esc_attr( $job_position ) . '" size="70" />';
		echo "</div>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<label for='company'>".esc_attr__( 'Company', 'trend' )."</label>";
		echo '<input type="text" name="company" value="' . esc_attr( $company ) . '" size="70" />';
	echo "</div>";
	echo "<div style='clear:both'></div>";
	echo "</div>";
}



/* When the post is saved, saves our custom data.*/
function save_testimonial_meta_box( $post_id ) {
	// Check if our nonce is set.
	if ( ! isset( $_POST['testimonial_nonce'] ) ) {
		return;
	}
	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['testimonial_nonce'], 'testimonial_details_nonce' ) ) {
		return;
	}
	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'testimonial' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	// Sanitize user input.
	$job_position = sanitize_text_field( $_POST['job-position'] );
	$company = sanitize_text_field( $_POST['company'] );
	// Update the meta field in the database.
	update_post_meta( $post_id, 'job-position', $job_position );
	update_post_meta( $post_id, 'company', $company );
}
add_action( 'save_post', 'save_testimonial_meta_box' );






#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------
# CUSTOM META BOXES FOR MEMBERS - custom post
#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------

function member_add_meta_box() {
	add_meta_box( 
		'member-details', esc_attr__( 'Member Details', 'trend' ), 'show_member_metabox_callback', 'member', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'member_add_meta_box' );


/* Prints the box content. */
function show_member_metabox_callback( $post ) {
	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'member_details_nonce', 'member_nonce' );

	$job_position 	= get_post_meta( $post->ID, 'av-job-position', true );
	$av_facebook 	= get_post_meta( $post->ID, 'av-facebook-link', true );
	$av_twitter 	= get_post_meta( $post->ID, 'av-twitter-link', true );
	$av_gplus 		= get_post_meta( $post->ID, 'av-gplus-link', true );
	$av_instagram 	= get_post_meta( $post->ID, 'av-instagram-link', true );

	echo "<div class='avstudio-metabox'>";
		echo "<style>";
		echo ".metabox-section { float:left;width:100%;padding:10px 0 }";
		echo ".metabox-section label { margin-right:20px;font-weight:bold;width:20%;display:inline-block }";
		echo "</style>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<label for='av-job-position'>".esc_attr__( 'Job  Position', 'trend' )."</label>";
		echo '<input type="text" name="av-job-position" value="' . esc_attr( $job_position ) . '" size="70" />';
		echo "</div>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<h2>Social Links:</h2>";
		echo "</div>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<label for='av-facebook-link'>".esc_attr__( 'Facebook', 'trend' )."</label>";
		echo '<input type="text" name="av-facebook-link" value="' . esc_attr( $av_facebook ) . '" size="70" />';
		echo "</div>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<label for='av-twitter-link'>".esc_attr__( 'Twitter', 'trend' )."</label>";
		echo '<input type="text" name="av-twitter-link" value="' . esc_attr( $av_twitter ) . '" size="70" />';
		echo "</div>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<label for='av-gplus-link'>".esc_attr__( 'Google Plus', 'trend' )."</label>";
		echo '<input type="text" name="av-gplus-link" value="' . esc_attr( $av_gplus ) . '" size="70" />';
		echo "</div>";
		#---------------------------------------------------------------
		echo "<div class='metabox-section'>";
		echo "<label for='av-instagram-link'>".esc_attr__( 'Instagram', 'trend' )."</label>";
		echo '<input type="text" name="av-instagram-link" value="' . esc_attr( $av_instagram ) . '" size="70" />';
	echo "</div>";
	echo "<div style='clear:both'></div>";
	echo "</div>";
}


/* When the post is saved, saves our custom data.*/
function save_member_meta_box( $post_id ) {
	// Check if our nonce is set.
	if ( ! isset( $_POST['member_nonce'] ) ) {
		return;
	}
	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['member_nonce'], 'member_details_nonce' ) ) {
		return;
	}
	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'member' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	// Sanitize user input.
	$job_position 	= sanitize_text_field( $_POST['av-job-position'] );
	$av_facebook 	= sanitize_text_field( $_POST['av-facebook-link'] );
	$av_twitter 	= sanitize_text_field( $_POST['av-twitter-link'] );
	$av_gplus 		= sanitize_text_field( $_POST['av-gplus-link'] );
	$av_instagram 	= sanitize_text_field( $_POST['av-instagram-link'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'av-job-position', $job_position );
	update_post_meta( $post_id, 'av-facebook-link', $av_facebook );
	update_post_meta( $post_id, 'av-twitter-link', $av_twitter );
	update_post_meta( $post_id, 'av-gplus-link', $av_gplus );
	update_post_meta( $post_id, 'av-instagram-link', $av_instagram );
}
add_action( 'save_post', 'save_member_meta_box' );






#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------
# CUSTOM META BOXES FOR PAGES
#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------
function page_add_meta_box() {
    add_meta_box( 'page-details', esc_attr__( 'Page Details', 'trend' ), 'show_page_metabox_callback', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'page_add_meta_box' );


/* Prints the box content. */
function show_page_metabox_callback( $post ) {
    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'page_details_nonce', 'page_nonce' );

    $select_revslider_shortcode = get_post_meta( $post->ID, 'select_revslider_shortcode'    , true );
    $page_title_on_off         	= get_post_meta( $post->ID, 'page_title_on_off'       		, true );
    $select_page_sidebar        = get_post_meta( $post->ID, 'select_page_sidebar'       	, true );
    $comments_on_off        	= get_post_meta( $post->ID, 'comments_on_off'       		, true );
    $breadcrumbs_on_off        	= get_post_meta( $post->ID, 'breadcrumbs_on_off'       		, true );
    $page_spacing        		= get_post_meta( $post->ID, 'page_spacing'       		, true );
    $widgetized_before_footer   = get_post_meta( $post->ID, 'widgetized_before_footer'       		, true );

    echo "<div class='metabox-page custom_metas'>";
    echo "<label for='page_title_on_off' class='meta_box_label'>".esc_attr__( 'Show page title', 'trend' )."</label>";
    echo '<select name="page_title_on_off" id="page_title_on_off">';
    echo '<option value="yes" '.($page_title_on_off == 'yes' ? 'selected=""' : '').'>Yes - Show title</option>';
    echo '<option value="no" '.($page_title_on_off == 'no' ? 'selected=""' : '').'>No - Hide title</option>';
    echo '</select>';
    echo "<small>".esc_attr__( '* Enable or Disable the title of the page', 'trend' )."</small>";
    echo "</div>";

	global $wpdb;
	$limit_small 	= 0;
	$limit_high 	= 50;
	$tablename 		= $wpdb->prefix . "revslider_sliders";
	$sql 			= $wpdb->prepare( "SELECT * FROM $tablename LIMIT %d, %d", $limit_small, $limit_high);
	$sliders 		= $wpdb->get_results($sql, ARRAY_A);

    echo "<div class='metabox-page custom_metas'>";
    echo "<label for='select_revslider_shortcode' class='meta_box_label'>".esc_attr__( 'Select Revolution Slider', 'trend' )."</label>";
    echo '<select id="select_revslider_shortcode" name="select_revslider_shortcode">';
    echo '<option value="">Choose a slider</option>';
    if ($sliders) {
	    foreach($sliders as $slide){
	        echo '<option value="'.$slide['alias'].'" '.($select_revslider_shortcode == $slide['alias'] ? 'selected=""' : '').'>'.$slide['title'].'</option>';
	    }
    }
    echo "</select>";
    echo "</div>";
    ?>

    <div class='metabox-page custom_metas'>
    	<label for='select_page_sidebar' class='meta_box_label'><?php echo esc_attr__( 'Select sidebar', 'trend' ); ?></label>
		<select id="select_page_sidebar" name="select_page_sidebar">
		<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
		    <option <?php if ($select_page_sidebar == $sidebar['id']) { echo "selected"; } ?> value="<?php echo esc_attr($sidebar['id']); ?>">
		        <?php echo ucwords( $sidebar['name'] ); ?>
		    </option>
		<?php } ?>
		</select>
		<small><?php echo esc_attr__( '* If template is "Page - no sidebar", the sidebar will not be shown', 'trend' ); ?></small>
    </div>
    <?php

    echo "<div class='metabox-page custom_metas'>";
    echo "<label for='comments_on_off' class='meta_box_label'>".esc_attr__( 'Enable/Disable comments', 'trend' )."</label>";
    echo '<select name="comments_on_off" id="comments_on_off">';
    echo '<option value="no" '.($comments_on_off == 'no' ? 'selected=""' : '').'>Off - Hide comments</option>';
    echo '<option value="yes" '.($comments_on_off == 'yes' ? 'selected=""' : '').'>On - Show comments</option>';
    echo '</select>';
    echo "<small>".esc_attr__( '* Enable or Disable comments.', 'trend' )."</small>";
    echo "</div>";

    echo "<div class='metabox-page custom_metas'>";
    echo "<label for='breadcrumbs_on_off' class='meta_box_label'>".esc_attr__( 'Page title-breadcrumbs', 'trend' )."</label>";
    echo '<select name="breadcrumbs_on_off" id="breadcrumbs_on_off">';
    echo '<option value="no" '.($breadcrumbs_on_off == 'no' ? 'selected=""' : '').'>Off - Hide</option>';
    echo '<option value="yes" '.($breadcrumbs_on_off == 'yes' ? 'selected=""' : '').'>On - Show</option>';
    echo '</select>';
    echo "</div>";

    echo "<div class='metabox-page custom_metas'>";
    echo "<label for='page_spacing' class='meta_box_label'>".esc_attr__( 'Page top/bottom spacing', 'trend' )."</label>";
    echo '<select name="page_spacing" id="page_spacing">';
    echo '<option value="high-padding" '.($page_spacing == 'high-padding' ? 'selected=""' : '').'>High Padding</option>';
    echo '<option value="no-padding" '.($page_spacing == 'no-padding' ? 'selected=""' : '').'>No Padding</option>';
    echo '<option value="no-padding-top" '.($page_spacing == 'no-padding-top' ? 'selected=""' : '').'>No Padding top</option>';
    echo '<option value="no-padding-bottom" '.($page_spacing == 'no-padding-bottom' ? 'selected=""' : '').'>No Padding bottom</option>';
    echo '</select>';
    echo "</div>";

    echo "<div class='metabox-page custom_metas'>";
    echo "<label for='widgetized_before_footer' class='meta_box_label'>".esc_attr__( 'Enable/Disable widgetized areas before footer', 'trend' )."</label>";
    echo '<select name="widgetized_before_footer" id="widgetized_before_footer">';
    echo '<option value="no" '.($widgetized_before_footer == 'no' ? 'selected=""' : '').'>Disabled</option>';
    echo '<option value="yes" '.($widgetized_before_footer == 'yes' ? 'selected=""' : '').'>Enabled</option>';
    echo '</select>';
    echo "<small>".esc_attr__( '* Enable or Disable Widgetized areas before footer.', 'trend' )."</small>";
    echo "</div>";
}


/* When the post is saved, saves our custom data.*/
function save_page_meta_box( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['page_nonce'] ) ) {
        return;
    }
    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['page_nonce'], 'page_details_nonce' ) ) {
        return;
    }
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */
    // Sanitize user input.
	$select_page_sidebar		= sanitize_text_field( $_POST['select_page_sidebar'] );
	$page_title_on_off 			= sanitize_text_field( $_POST['page_title_on_off'] );
	$select_page_sidebar 		= sanitize_text_field( $_POST['select_page_sidebar'] );
	$comments_on_off 			= sanitize_text_field( $_POST['comments_on_off'] );
	$breadcrumbs_on_off 		= sanitize_text_field( $_POST['breadcrumbs_on_off'] );
	$page_spacing 				= sanitize_text_field( $_POST['page_spacing'] );
	$widgetized_before_footer 	= sanitize_text_field( $_POST['widgetized_before_footer'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'select_revslider_shortcode'    , sanitize_text_field( $_POST['select_revslider_shortcode'] ) );
    update_post_meta( $post_id, 'page_title_on_off'     		, sanitize_text_field( $_POST['page_title_on_off'] ) );
    update_post_meta( $post_id, 'select_page_sidebar'     		, sanitize_text_field( $_POST['select_page_sidebar'] ) );
    update_post_meta( $post_id, 'comments_on_off'     			, sanitize_text_field( $_POST['comments_on_off'] ) );
    update_post_meta( $post_id, 'breadcrumbs_on_off'     		, sanitize_text_field( $_POST['breadcrumbs_on_off'] ) );
    update_post_meta( $post_id, 'page_spacing'     				, sanitize_text_field( $_POST['page_spacing'] ) );
    update_post_meta( $post_id, 'widgetized_before_footer'     	, sanitize_text_field( $_POST['widgetized_before_footer'] ) );
}
add_action( 'save_post', 'save_page_meta_box' );
?>