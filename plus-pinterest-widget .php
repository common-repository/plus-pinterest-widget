<?php
/**
 * @package  Plus Pinterest Widget
*/
/*
Plugin Name: Plus Pinterest Widget
Plugin URI: https://wordpress.org/plugins/plus-pinterest-widget/
Description: Thanks for installing Plus Pinterest Widget. This display Pinterest widget on wordpress website.
Version: 1.0
Author: Jose Porit
Author URI: https://wordpress.org/support/profile/twitterslider
*/

class PlusPinterest extends WP_Widget{
    
    public function __construct() {
        $params = array(
            'description' => 'Thanks for installing Plus Pinterest Widget',
            'name' => 'Plus Pinterest Widget'
        );
        parent::__construct('PlusPinterest','',$params);
    }
    
    public function form($instance) {
        extract($instance);
        
        ?>
<!-- here will put all widget configuration -->

<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('title');?>"
    name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Plus Pinterest Widget"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('href');?>">Pinterest user URL : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('href');?>"
    name="<?php echo $this->get_field_name('href');?>"
        value="<?php echo !empty($href) ? $href : ""; ?>" />
</p>
<p><strong>You must have to input a value to display the pinterest widget: example: https://www.pinterest.com/pinterest/</strong></p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Board Width : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('width');?>"
    name="<?php echo $this->get_field_name('width');?>"
        value="<?php echo !empty($width) ? $width : "500"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('height');?>"> height : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('height');?>"
    name="<?php echo $this->get_field_name('height');?>"
        value="<?php echo !empty($height) ? $height : "500"; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('imgwidth');?>">Image width : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('imgwidth');?>"
    name="<?php echo $this->get_field_name('imgwidth');?>"
        value="<?php echo !empty($imgwidth) ? $imgwidth : "120"; ?>" />
</p>








<?php
    }
    
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
        if(empty($title)) $title = "Plus Pinterest Widget";
        if(empty($href)) $href = "";
        if(empty($width)) $width = "500";
        if(empty($height)) $height = "500";
        if(empty($imgwidth)) $imgwidth = "120";
        echo $before_widget;
            echo $before_title . $title . $after_title;


            
            ?>

    


<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
        

<a data-pin-do="embedUser" data-pin-board-width="<?php echo $width;?>" data-pin-scale-height="<?php echo $height;?>" data-pin-scale-width="<?php echo $imgwidth;?>" href="<?php echo $href;?>"></a>
<div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;"><a href="https://www.nationalcprassociation.com/faqs/" target="_blank" style="color: #808080;">Learn more</a></div>
<?php
        echo $after_widget;
    }
}

add_action('widgets_init','register_PlusPinterest');
function register_PlusPinterest(){
    register_widget('PlusPinterest');
    
}