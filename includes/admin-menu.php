<?php
class Post_Management_Admin_Menu {
    
    public function __construct () {
        add_action( 'admin_menu',[ $this,'admin_menu' ] );
    }
    public function admin_menu () {
        add_menu_page( 'Post Management', 'Post Management', 'manage_options', 'post-managements', array ( $this,'post_management_menu' ), 'dashicons-chart-pie', 2 );
    }
    public function post_management_menu () {


        // Check if a category ID is set and get its value
        if ( isset ( $_GET[ 'category-id' ] ) ) {
            $selected_category_id = intval ( $_GET [ 'category-id' ] );
        } else {
            $selected_category_id = -1;
        }
        // Set up post query arguments
        $post_args = array (
            'posts_per_page'    => -1, // Get all posts
            'post_type'         => 'post',
        );
        // Modify query if a specific category is selected
        if ( $selected_category_id != -1 ) {
            $post_args [ 'category__in' ] = array ( $selected_category_id );
        }
                       
        $posts              = get_posts($post_args);
        $get_list_categorys = get_categories();
        $get_tag_list       = get_tags();

        //


        

        
        require_once __DIR__ . '/template/template-markup.php';

       
    }

}
?>