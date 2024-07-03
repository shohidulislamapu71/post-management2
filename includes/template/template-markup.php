<div class="wrap">
            <div class="tablenav top">
                <div class="alignleft actions bulkactions">
                    <form method="get">
                        <input type="hidden" name="page" value="post-managements">
                        
                        <?php $selected_category = isset( $_GET['category-id'] ) ? $_GET['category-id'] : '-1';

                        var_dump( $selected_category);
                        ?>
                        <select name="category-id" id="category-selector">
                            <option value="-1" <?php echo $s =  selected( '-1', $selected_category );var_dump($s); ?>>All Categories</option>
                            <?php foreach ( $get_list_categorys as $get_list_category ): ?>
                                <option value="<?php echo $get_list_category->term_id; ?>" <?php $a = selected( $get_list_category->term_id, $selected_category ); var_dump($a);?> >
                                    <?php echo $get_list_category->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" class="button action" value="Apply">
                    </form>
                </div>
            </div>
            <table class="wp-list-table widefat fixed striped table-view-list posts">
                <thead>
                    <tr>
                        <th>Post Title</th>
                        <th>Post Content</th>
                        <th>Post Category</th>
                        <th>Post Tags</th>
                        <th>Author Name</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       foreach ( $posts as $post ){

                            $get_author_name    = get_user_by('id',$post->post_author);
                            $get_post_date      = get_the_date('l, F j, Y',$post->ID);
                            $get_categorys      = get_the_category($post->ID);
                            $get_tags           = get_the_tags($post->ID);

                            ?>
                                <tr>
                                    <td><?php echo $post->post_title; ?></td>
                                    <td><?php echo wp_trim_words($post->post_content,4); ?></td>
                                    <td>
                                        <?php 
                                            foreach ( $get_categorys as $get_category ){
                                                echo $get_category->name. ', ';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            foreach ( $get_tags as $get_tag ){
                                                echo $get_tag->name. ', ';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $get_author_name->data->display_name; ?></td>
                                    <td><?php echo $get_post_date; ?></td>
                                </tr>     
                            <?php
                        }     
                    ?>
                     
                </tbody>
            </table>
        </div>
