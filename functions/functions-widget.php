<?php 

/* --------------------------------------------------------------------------------------- Advertise Widget */

class Advertise extends WP_Widget {

    function Advertise() {
        parent::__construct(false, $name = 'Advertise 125px x 125px');	
    }
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $img1 = apply_filters('widget_title', $instance['img1']);
        $img2 = apply_filters('widget_title', $instance['img2']);
        $img3 = apply_filters('widget_title', $instance['img3']);
        $img4 = apply_filters('widget_title', $instance['img4']);
        $link1 = apply_filters('widget_title', $instance['link1']);
        $link2 = apply_filters('widget_title', $instance['link2']);
        $link3 = apply_filters('widget_title', $instance['link3']);
        $link4 = apply_filters('widget_title', $instance['link4']);
        
        ?>
              <?php echo $before_widget; ?>
              
              
                  <?php if ( $title ) {
                        echo $before_title . $title . $after_title; }
                        ?>
                        
                
                <div class="madza_widget_advertise_box1"><a href="<?php echo $link1; ?>"><img src="<?php echo $img1; ?>" /></a></div>
                <div class="madza_widget_advertise_box2"><a href="<?php echo $link2; ?>"><img src="<?php echo $img2; ?>" /></a></div>
                <div class="madza_widget_advertise_box3"><a href="<?php echo $link3; ?>"><img src="<?php echo $img3; ?>" /></a></div>
                <div class="madza_widget_advertise_box4"><a href="<?php echo $link4; ?>"><img src="<?php echo $img4; ?>" /></a></div><div class="clear"></div>
                  
              <?php echo $after_widget; ?>
        <?php
    }
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
    $instance['img1'] = strip_tags($new_instance['img1']);
    $instance['img2'] = strip_tags($new_instance['img2']);
    $instance['img3'] = strip_tags($new_instance['img3']);
    $instance['img4'] = strip_tags($new_instance['img4']);
    $instance['link1'] = strip_tags($new_instance['link1']);
    $instance['link2'] = strip_tags($new_instance['link2']);
    $instance['link3'] = strip_tags($new_instance['link3']);
    $instance['link4'] = strip_tags($new_instance['link4']);
        return $instance;
    }
    function form($instance) {				
        $title = esc_attr($instance['title']);
        $img1 = esc_attr($instance['img1']);
        $img2 = esc_attr($instance['img2']);
        $img3 = esc_attr($instance['img3']);
        $img4 = esc_attr($instance['img4']);
        $link1 = esc_attr($instance['link1']);
        $link2 = esc_attr($instance['link2']);
        $link3 = esc_attr($instance['link3']);
        $link4 = esc_attr($instance['link4']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', "madza_translate" ); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        
            <p><label for="<?php echo $this->get_field_id('img1'); ?>"><?php _e('Image 1 URL(125px x 125px):', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('img1'); ?>" name="<?php echo $this->get_field_name('img1'); ?>" type="text" value="<?php echo $img1; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Image 1 Link:', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $link1; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('img2'); ?>"><?php _e('Image 2 URL(125px x 125px):', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('img2'); ?>" name="<?php echo $this->get_field_name('img2'); ?>" type="text" value="<?php echo $img2; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e('Image 2 Link:', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $link2; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('img3'); ?>"><?php _e('Image 3 URL(125px x 125px):', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('img3'); ?>" name="<?php echo $this->get_field_name('img3'); ?>" type="text" value="<?php echo $img3; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e('Image 3 Link:', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo $link3; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('img4'); ?>"><?php _e('Image 4 URL(125px x 125px):', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('img4'); ?>" name="<?php echo $this->get_field_name('img4'); ?>" type="text" value="<?php echo $img4; ?>" /></label></p>
            
            <p><label for="<?php echo $this->get_field_id('link4'); ?>"><?php _e('Image 4 Link:', "madza_translate"); ?> <input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo $link4; ?>" /></label></p>
        <?php 
    }

} 

add_action('widgets_init', create_function('', 'return register_widget("Advertise");'));

?>