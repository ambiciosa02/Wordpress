<?php
/**
 * PHP file overriding parent functions
 */
if (!defined('ABSPATH')) {
    exit('No direct access allowed!');
}

/**
 * Override the form in parent theme
 *
 * @return  void
 */
function itre_property_filter_form() {
    $init_for = $_GET['for'] ?? '';
    $init_type = $_GET['type'] ?? '';
    $init_place = $_GET['place'] ?? '';
    ?>
    <div class="itre-property-filter-wrapper container">
        <div class="itre-property-filter">
            <form id="itre-property-filter-form" action="<?php echo get_post_type_archive_link('property'); ?>" method="get">
                <div class="row align-items-center">
                <div class="filter-fields col-md-9">

                    <div class="row">

                        <div class="itre-type form-control-wrapper col-md-4">
                            <select id="for" name="for">
                                <option value=""><?php _e('Sale or Rent', 'it-real-estate'); ?></option>
                                <option value="sale" <?php selected($init_for, 'sale'); ?>><?php _e('Sale', 'it-real-estate'); ?></option>
                                <option value="rent" <?php selected($init_for, 'rent'); ?>><?php _e('Rent', 'it-real-estate'); ?></option>
                            </select>
                        </div>

                        <div class="itre-type form-control-wrapper col-md-4">
                            <?php
                            $types_list = wp_list_pluck( get_terms(['taxonomy' => 'property-type']), 'name', 'slug' );
                            ?>
                            <select id="type" name="type">
                                <option value="0"><?php _e('Type', 'it-real-estate'); ?></option>
                                <?php foreach($types_list as $key => $value) {
                                    printf('<option value="%s" %s>%s</option>', esc_attr($key), selected($init_type, $key, false), esc_html($value));
                                } ?>
                            </select>
                        </div>

                        <div class="itre-type form-control-wrapper col-md-4">
                            <?php
                            $locations_list = wp_list_pluck( get_terms(['taxonomy' => 'location']), 'name', 'slug' );
                            ?>
                            <select id="place" name="place">
                                <option value="0"><?php _e('Location', 'it-real-estate'); ?>
                                <?php foreach($locations_list as $key => $value) { ?>
                                    <option value="<?php echo esc_attr($key); ?>" <?php selected($init_place, $key); ?>><?php echo esc_html($value); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="filter-btn col-md-3">
                    <input type="submit" value="<?php esc_attr_e('Search', 'it-real-estate'); ?>"/>
                </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}