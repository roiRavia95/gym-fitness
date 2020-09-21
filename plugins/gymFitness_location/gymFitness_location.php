<?php
/* 
Plugin Name: Gym Fitness - Location
Plugin URI:
Description: Add Map to any page
Version: 1.0
Author: Roi Ravia
Text Domain: gym-fitness
*/

if (!defined('ABSPATH')) die();

function gymFitness_location_shortCode()
{
    $location = get_field("location");
?>
    <div class="location">
        <input type="hidden" id="lat" value="<?php echo $location["lat"] ?>">
        <input type="hidden" id="lng" value="<?php echo $location["lng"] ?>">
        <input type="hidden" id="address" value="<?php echo $location["address"] ?>">
        <div id="map"></div>

    </div>
<?php
};

add_shortcode("gymfitness_location", "gymFitness_location_shortCode");



// Adding css and js files for map

function gymFitness_location_scripts()
{

    if (is_page("contact-us")) {

        //Leaflet CSS
        wp_enqueue_style("leafletcss", "//unpkg.com/leaflet@1.7.1/dist/leaflet.css", array(), "1.7.1");

        //Leaflet JS
        wp_enqueue_script("leafletjs", "//unpkg.com/leaflet@1.7.1/dist/leaflet.js", array(), "1.7.1", true);

        wp_enqueue_script("gymFitness_leaflet", plugins_url("/js/gymFitness_leaflet.js", __FILE__), array(), "1.0.0", true);
    }
}

add_action("wp_enqueue_scripts", "gymFitness_location_scripts");
