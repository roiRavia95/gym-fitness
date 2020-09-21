<?php
/* 
Plugin Name: Gym Fitness - Widgets
Plugin URI:
Description: Adds a new widgets to WordPress
Version: 1.0
Author: Roi Ravia
Text Domain: gym-fitness
*/

if (!defined('ABSPATH')) die();

//Example for a Basic Widget -

class My_Widget extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'my_widget',
            'description' => 'My Widget is awesome',
        );
        parent::__construct('my_widget', 'My Widget', $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
    }
}

add_action('widgets_init', function () {
    register_widget('My_Widget');
});

//Advanced Widget

class GymFitness_Classes_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'foo_widget', // Base ID
            esc_html__('Gym Fitness - Classes List', 'text_domain'), // Name
            array('description' => esc_html__('Display different classes in the widget', 'text_domain'),) // Args
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
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

?>
        <ul class="sidebar-classes-list">
            <?php
            $args = array(
                'post_type' => 'gym-fitness_classes',
                'posts_per_page' => $instance['quantity']
            );
            $classes = new WP_Query($args);
            while ($classes->have_posts()) : $classes->the_post();
            ?>
                <li class="sidebar-class">
                    <div class="sidebar-widget-image">
                        <?php the_post_thumbnail("thumbnail") ?>
                    </div>

                    <div class="class-content">
                        <a href="<?php the_permalink() ?>">
                            <h3 class="text-primary"> <?php the_title() ?></h3>
                        </a>
                        <?php
                        $startTime = get_field("start-time");
                        $endTime = get_field("end_time");
                        ?>
                        <p><?php echo the_field("class_days") . " - $startTime to $endTime"; ?></p>
                    </div>
                </li>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>

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
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'text_domain');
        $quantity = !empty($instance['quantity']) ? $instance['quantity'] : esc_html__('1', 'text_domain');
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" min=1>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('quantity')); ?>"><?php esc_attr_e('Amount of classes:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('quantity')); ?>" name="<?php echo esc_attr($this->get_field_name('quantity')); ?>" type="number" value="<?php echo esc_attr($quantity); ?>" min=1>
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
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';


        $instance['quantity'] = (!empty($new_instance['quantity'])) ? sanitize_text_field($new_instance['quantity']) : '';

        return $instance;
    }
}

function register_GymFitness_Classes_Widget()
{
    register_widget('GymFitness_Classes_Widget');
}
add_action("widgets_init", "register_GymFitness_Classes_Widget");
