<?php 
  /*Custom Post type start*/
  
add_action('init', 'byc_cw_post_type_tracking_details');
function byc_cw_post_type_tracking_details() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
		);
	$labels = array(
		'name' => _x('Home Post', 'plural'),
		'singular_name' => _x('Tracking', 'singular'),
		'menu_name' => _x('Tracking', 'admin menu'),
		'name_admin_bar' => _x('tracking', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New tracking details'),
		'new_item' => __('New tracking details'),
		'edit_item' => __('Edit tracking details'),
		'view_item' => __('View tracking details'),
		'all_items' => __('All tracking'),
		'search_items' => __('Search tracking details'),
		'not_found' => __('No news found.'),
		);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'tracking'),
		'has_archive' => true,
		'hierarchical' => false,
		);
	register_post_type('tracking', $args);
 
      //To add categories in your existing custom post					
   add_action( 'init', 'byc_wpshout_add_taxonomies_to_tracking' );		
  function byc_wpshout_add_taxonomies_to_tracking() {				
	register_taxonomy_for_object_type( 'category', 'tracking' );		
	register_taxonomy_for_object_type( 'difficulty', 'tracking' );		
	register_taxonomy_for_object_type( 'post_tag', 'tracking' );		
	}									 

}


function byc_get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}


function byc_get_current_page_name() {
    if (is_category() || is_single()) {
       
        the_category(' &bull; ');
            if (is_single()) {
                
                the_title();
            }
    } elseif (is_page()) {
       
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}


/*Custom Login Failed*/

		add_action( 'wp_login_failed', 'byc_custom_login_fail' );
		function byc_custom_login_fail( $username ) {
		
		// Getting URL of the login page
		$referrer = $_SERVER['HTTP_REFERER'];    
		// if there's a valid referrer, and it's not the default log-in screen
		if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) {
			wp_redirect( get_permalink( 288 ) . "?login_failed" ); 
			exit;
		}
		}
		
/* Where to go if any of the fields were empty */
		add_filter('authenticate', 'byc_verify_user_pass', 1, 3);
		function byc_verify_user_pass($user, $username, $password) 
		{
	// Getting URL of the login page
		//$referrer = $_SERVER['HTTP_REFERER'];    
			if($username == "" || $password == "") 
			{
				wp_redirect( get_permalink( 288 ) . "?login_empty" ); 
				
			}
		
		}

/**********************************************
	Block Others user for Wordpress Dashboard
***********************************************/

add_action( 'admin_init', 'byc_vendor_no_admin_access', 100 );
function byc_vendor_no_admin_access() {
      
    /* check the role of current loged in user for redirection */
    global $wp_roles;
   $currentrole ='';
        
   foreach ( $wp_roles->role_names as $role => $name ) {
       if ( current_user_can( $role ) ){
            $currentrole = $role;
       }
    }
       if(!defined('DOING_AJAX') && (!$currentrole || ($currentrole != 'administrator'))){
           wp_redirect(site_url());
        }
}		

/* ---------------------------------------------------------------------------
/* ---------------------------------------------------------------------------
*  Extra User Field Options
* --------------------------------------------------------------------------- */

/***********************Custom user feild Create Start**************************/
function byc_erp_add_custom_user_profile_fields( $user ) {
?>

        
 <!-- 
 ==========================================================================================================================================================
 -->
 
 
 <h2  class="extra_user_field" style="text-align:center; font-size: 30px; "><?php _e("Custom User Fields", "blank"); ?></h2>
    <h3><?php _e("User Details", "blank"); ?></h3>

    <table class="form-table" role="presentation">
    <tr>
		<th><label for="erp_address"><?php _e('Address:', 'erpcars'); ?></label></th>
         <td>
				<input type="text" name="erp_address" id="erp_address" value="<?php echo esc_attr( get_the_author_meta( 'erp_address', $user->ID ) ); ?>" class="regular-text" readonly /><br />
				<!--<span class="description"><?php _e('Your Address', 'erpcars'); ?></span>-->
			</td>

    </tr>
	
	<tr>
        <th><label for="erp_country"><?php _e("Country"); ?></label></th>
        <td>
            <input type="text" name="erp_country" id="erp_country" value="<?php echo esc_attr( get_the_author_meta( 'erp_country', $user->ID ) ); ?>" class="regular-text" readonly/><br />
        </td>
    </tr>
	
	
    <tr>
        <th><label for="erp_city"><?php _e("City"); ?></label></th>
        <td>
            <input type="text" name="erp_city" id="erp_city" value="<?php echo esc_attr( get_the_author_meta( 'erp_city', $user->ID ) ); ?>" class="regular-text" readonly /><br />
        </td>
    </tr>
    <tr>
    <th><label for="erp_zipcode"><?php _e("Postal Code"); ?></label></th>
        <td>
            <input type="text" name="erp_zipcode" id="erp_zipcode" value="<?php echo esc_attr( get_the_author_meta( 'erp_zipcode', $user->ID ) ); ?>" class="regular-text" readonly /><br />
        </td>
    </tr>
	
    </table>
	
<!-- Contact Deatails-->

	 <h3><?php _e("Contact Details", "blank"); ?></h3>
	 
	 <table class="form-table" role="presentation">
	 	<tr>
			<th> <label for="erp_phone"><?php _e("Phone"); ?></label> </th>
			<td> <input type="text" name="erp_phone" id="erp_phone" value="<?php echo esc_attr( get_the_author_meta( 'erp_phone', $user->ID ) ); ?>" class="regular-text" readonly/><br />
			</td>
		</tr>
		
		<tr>
			<th> <label for="erp_con_email"><?php _e("Contact Email"); ?></label> </th>
			<td> <input type="text" name="erp_con_email" id="erp_con_email" value="<?php echo esc_attr( get_the_author_meta( 'erp_con_email', $user->ID ) ); ?>" class="regular-text" readonly/><br />
            	
			</td>
		</tr>
		
	 </table>
	
	
	
<!-- Seller/ Buyer Deatails-->

	<h3><?php _e("Seller/Buyer Detail", "blank"); ?></h3>
	 
	 <table class="form-table" role="presentation">
		
		<tr>
			<th> <label for="erp_seller_buyer"><?php _e("Seller/Buyer"); ?></label> </th>
			<td> <input type="text" name="erp_seller_buyer" id="erp_seller_buyer" value="<?php echo esc_attr( get_the_author_meta( 'erp_seller_buyer', $user->ID ) ); ?>" class="regular-text" readonly/>
			</td>
		</tr>
		
		<tr>
			<th> <label for="erp_seller_buyer_email"><?php _e("Seller/Buyer Email"); ?></label> </th>
			<td> <input type="text" name="erp_seller_buyer_email" id="erp_seller_buyer_email" value="<?php echo esc_attr( get_the_author_meta( 'erp_seller_buyer_email', $user->ID ) ); ?>" class="regular-text" readonly/>
			</td>
		</tr>
		
	 </table>
	
	
	
	
<!-- Log In Deatails-->

	<h3><?php _e("Log In Detail", "blank"); ?></h3>
	 
	 <table class="form-table" role="presentation">
		
		<tr>
			<th> <label for="erp_password"><?php _e("Password"); ?></label> </th>
			<td> <input type="text" name="erp_password" id="erp_password" value="<?php echo esc_attr( get_the_author_meta( 'erp_password', $user->ID ) ); ?>" class="regular-text" readonly/>
			</td>
		</tr>
		
		<tr>
			<th> <label for="city"><?php _e("Confirm Password"); ?></label> </th>
			<td> <input type="text" name="erp_confirm_password" id="erp_confirm_password" value="<?php echo esc_attr( get_the_author_meta( 'erp_confirm_password', $user->ID ) ); ?>" class="regular-text" readonly/>
			</td>
		</tr>
		
	 </table>
 
 
 <!--
 	=======================================================================================================================================================
 -->

<?php } 

	function byc_erp_save_custom_user_profile_fields( $user_id ) {
	
		if ( !current_user_can( 'edit_user', $user_id ) )
			return FALSE;
	
		update_user_meta( $user_id, 'erp_address', $_POST['erp_address'] );
		update_user_meta( $user_id, 'erp_country', $_POST['erp_country'] );
		update_user_meta( $user_id, 'erp_city', $_POST['erp_city'] );
		update_user_meta( $user_id, 'erp_zipcode', $_POST['erp_zipcode'] );
		update_user_meta( $user_id, 'erp_phone', $_POST['erp_phone'] );
		
		update_user_meta( $user_id, 'erp_con_email', $_POST['erp_con_email'] );
		update_user_meta( $user_id, 'erp_seller_buyer', $_POST['erp_seller_buyer'] );
		update_user_meta( $user_id, 'erp_seller_buyer_email', $_POST['erp_seller_buyer_email'] );
		update_user_meta( $user_id, 'erp_password', $_POST['erp_password'] );
		update_user_meta( $user_id, 'erp_confirm_password', $_POST['erp_confirm_password'] );
		
		
		
	}

add_action( 'show_user_profile', 'byc_erp_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'byc_erp_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'byc_erp_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'byc_erp_save_custom_user_profile_fields' );
/***********************Custom user feild Create End**************************/