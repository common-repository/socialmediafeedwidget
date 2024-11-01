<?php

        /**
         * Plugin Name: SocialMediaFeedWidget
         * Plugin URI: https://maxweb.co 
         * Description: Add your Facebook Page as a Widget. Visitors can like and share your Facebook Page without leaving your website.
         * Version: 1.0.0
         * Requires at least: 5.4.2
         * Author: Max-Web
         * Stable tag: 1.0.0
         * Text Domain: socialmediafeedwidget
         */

        require_once ABSPATH . 'wp-includes/class-wp-widget.php';

        /**
         * Admin Notice 
         */

        $admin_notices = plugin_dir_path( __FILE__ ) . 'AdminNotices/vendor/autoload.php';
        require_once($admin_notices);

        /**
         * Namespace for the WP_Notice Class
         */

        use TDP\WP_Notice as SOCIALMEDIAFEEDNOTICE;

        /**
         * Object Initialization Function
         */

        function review_notice() 
        {
                return SOCIALMEDIAFEEDNOTICE::instance();
        }

        /**
         * Function to display the link and content of the admin notice
         */

        review_notice()->register_notice( 'my_notice',
         'info',
         '<h3>SocialMediaFeedWidget</h3> <br/>
         Thank you for downloading the SocialMediaFeedWidget plugin. <br/>
         If you like the plugin, please leave a review. 
         <br/><br/>
         <a href="https://wordpress.org/support/plugin/socialmediafeedwidget/reviews/#new-post" target="_blank">Leave a Review</a>
         ' );

        /**
         * Adds Foo_Widget widget.
         */
        class Social_Media_Feed_Widget extends WP_Widget {

        /**
         * Register widget with WordPress.
         */
        function __construct() {
                parent::__construct(
                'social_media_feed_widget', // Base ID
                esc_html__( 'Social Media Feed Widget', 'social_media_feed_widget' ), // Name
                array( 'description' => esc_html__( 'Add Facebook Page as a widget', 'social_media_feed_widget' ), ) // Args
                );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
                echo $args['before_widget'];
                if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                }

                // Facebook Widget IFRAME
                ?>
                <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $instance['facebook-page-url']; ?>&tabs=timeline&small_header=<?php echo $instance['facebook-small-header']; ?>&adapt_container_width=true&hide_cover=<?php echo $instance['facebook-hide-cover']; ?>&show_facepile=<?php echo $instance['facebook-friends-and-likes']; ?>" 
                width="<?php echo $instance['facebook-frame-width']; ?>" 
                height="<?php echo $instance['facebook-frame-height'] ?>" 
                style="border:none;overflow:hidden" 
                scrolling="no" 
                frameborder="0" 
                allowTransparency="true" 
                allow="encrypted-media">
                </iframe>
                <?php

                echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {

                // Widget Title
                $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
                // Facebook Page URL
                $facebook_page_url = ! empty( $instance['facebook-page-url'] ) ? $instance['facebook-page-url'] : '';
                // IFRAME Width
                $facebook_frame_width = ! empty( $instance['facebook-frame-width'] ) ? $instance['facebook-frame-width'] : '';
                // IFRAME Height
                $facebook_frame_height = ! empty( $instance['facebook-frame-height'] ) ? $instance['facebook-frame-height'] : '';
                // Small Header
                $facebook_small_header = ! empty( $instance['facebook-small-header'] ) ? $instance['facebook-small-header'] : '';
                // Facebook Friends and likes
                $facebook_friends_and_likes = ! empty( $instance['facebook-friends-and-likes'] ) ? $instance['facebook-friends-and-likes'] : '';
                // Facebook Hide Cover
                $facebook_hide_cover = ! empty( $instance['facebook-hide-cover'] ) ? $instance['facebook-hide-cover'] : '';
                ?>
                <p>

                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'social_media_feed_widget' ); ?></label> 
                <input style="border: 2px solid #f2f2f2;" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook-page-url' ) ); ?>"><?php esc_attr_e( 'Facebook Page URL:', 'social_media_feed_widget' ); ?></label> 
                <input style="border: 2px solid #f2f2f2;" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook-page-url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook-page-url' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook_page_url ); ?>">

                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook-frame-width' ) ); ?>"><?php esc_attr_e( 'Frame Width:', 'social_media_feed_widget' ); ?></label> 
                <input style="border: 2px solid #f2f2f2;" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook-frame-width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook-frame-width' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook_frame_width ); ?>">

                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook-frame-height' ) ); ?>"><?php esc_attr_e( 'Frame Height:', 'social_media_feed_widget' ); ?></label> 
                <input style="border: 2px solid #f2f2f2;" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook-frame-height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook-frame-height' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook_frame_height ); ?>">

                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook-small-header' ) ); ?>"><?php esc_attr_e( 'Show Small Header:', 'social_media_feed_widget' ); ?></label> 
                <select style="border: 2px solid #f2f2f2;" name="<?php echo esc_attr($this->get_field_name('facebook-small-header')); ?>" id="<?php echo esc_attr($this->get_field_id('facebook-small-header')); ?>" class="widefat">
                <option  value="true" <?php !empty(selected( $instance['facebook-small-header'], 'true' )); ?> >Yes</option> 
                <option  value="false" <?php !empty(selected( $instance['facebook-small-header'], 'false' )); ?> >No</option> 
                </select>

                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook-friends-and-likes' ) ); ?>"><?php esc_attr_e( 'Show Friends & Likes:', 'social_media_feed_widget' ); ?></label> 
                <select style="border: 2px solid #f2f2f2;" name="<?php echo esc_attr($this->get_field_name('facebook-friends-and-likes')); ?>" id="<?php echo esc_attr($this->get_field_id('facebook-friends-and-likes')); ?>" class="widefat">
                <option  value="true" <?php !empty(selected( $instance['facebook-friends-and-likes'], 'true' )); ?> >Yes</option> 
                <option  value="false" <?php !empty(selected( $instance['facebook-friends-and-likes'], 'false' )); ?> >No</option> 
                </select>

                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook-hide-cover' ) ); ?>"><?php esc_attr_e( 'Hide Cover Photo:', 'social_media_feed_widget' ); ?></label> 
                <select style="border: 2px solid #f2f2f2;" name="<?php echo esc_attr($this->get_field_name('facebook-hide-cover')); ?>" id="<?php echo esc_attr($this->get_field_id('facebook-hide-cover')); ?>" class="widefat">
                <option  value="true" <?php !empty(selected( $instance['facebook-hide-cover'], 'true' )); ?> >Yes</option> 
                <option  value="false" <?php !empty(selected( $instance['facebook-hide-cover'], 'false' )); ?> >No</option> 
                </select>

                </p>
                <?php 

        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
                $instance = array();

                // Update Title 
                $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

                // Update Facebook Page URL 
                $instance['facebook-page-url'] = ( ! empty($new_instance['facebook-page-url']) ) ? sanitize_text_field($new_instance['facebook-page-url']) : '';

                // Update Facebook Frame Width
                $instance['facebook-frame-width'] = ( ! empty($new_instance['facebook-frame-width']) ) ? sanitize_text_field($new_instance['facebook-frame-width']) : '';

                // Update Facebook Frame Height
                $instance['facebook-frame-height'] = ( ! empty($new_instance['facebook-frame-height']) ) ? sanitize_text_field($new_instance['facebook-frame-height']) : '';

                // Update Facebook Small Header
                $instance['facebook-small-header'] = ( ! empty($new_instance['facebook-small-header']) ) ? sanitize_text_field($new_instance['facebook-small-header']) : '';

                // Update Facebook Friends & Likes
                $instance['facebook-friends-and-likes'] = ( ! empty($new_instance['facebook-friends-and-likes']) ) ? sanitize_text_field($new_instance['facebook-friends-and-likes']) : '';

                // Update Facebook Cover Photo
                $instance['facebook-hide-cover'] = ( ! empty($new_instance['facebook-hide-cover']) ) ? sanitize_text_field($new_instance['facebook-hide-cover']) : '';

                return $instance;
        }

        } 

        // register Social_Media_Feed widget
        function register_foo_widget() {
        register_widget( 'Social_Media_Feed_Widget' );
        }
        add_action( 'widgets_init', 'register_foo_widget' );

?>