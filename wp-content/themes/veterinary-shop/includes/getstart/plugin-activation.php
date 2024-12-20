<?php
if ( ! class_exists( 'Veterinary_Shop_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Veterinary_Shop_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Veterinary_Shop_Plugin_Activation_WPElemento_Importer {

        private static $veterinary_shop_instance;
        public $veterinary_shop_action_count;
        public $veterinary_shop_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$veterinary_shop_instance) ) {
            self::$veterinary_shop_instance = new self();
          }
          return self::$veterinary_shop_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'veterinary_shop_recommended_plugins', array($this, 'veterinary_shop_recommended_elemento_importer_plugins_array') );

            $veterinary_shop_actions                   = $this->veterinary_shop_get_recommended_actions();
            $this->veterinary_shop_action_count        = $veterinary_shop_actions['count'];
            $this->veterinary_shop_recommended_actions = $veterinary_shop_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function veterinary_shop_recommended_elemento_importer_plugins_array($veterinary_shop_plugins){
            $veterinary_shop_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'veterinary-shop'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'veterinary-shop'),               
            );
            return $veterinary_shop_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'veterinary-shop-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('veterinary-shop-plugin-activation-script', 'veterinary_shop_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'veterinary-shop'),
                    'activating' => esc_html__('Activating', 'veterinary-shop'),
                    'error' => esc_html__('Error', 'veterinary-shop'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'veterinary-shop-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function veterinary_shop_get_recommended_actions() {

            $veterinary_shop_act_count  = 0;
            $veterinary_shop_actions_todo = get_option( 'recommending_actions', array());

            $veterinary_shop_plugins = $this->veterinary_shop_get_recommended_plugins();

            if ($veterinary_shop_plugins) {
                foreach ($veterinary_shop_plugins as $veterinary_shop_key => $veterinary_shop_plugin) {
                    $veterinary_shop_action = array();
                    if (!isset($veterinary_shop_plugin['slug'])) {
                        continue;
                    }

                    $veterinary_shop_action['id']   = 'install_' . $veterinary_shop_plugin['slug'];
                    $veterinary_shop_action['desc'] = '';
                    if (isset($veterinary_shop_plugin['desc'])) {
                        $veterinary_shop_action['desc'] = $veterinary_shop_plugin['desc'];
                    }

                    $veterinary_shop_action['name'] = '';
                    if (isset($veterinary_shop_plugin['name'])) {
                        $veterinary_shop_action['title'] = $veterinary_shop_plugin['name'];
                    }

                    $veterinary_shop_link_and_is_done  = $this->veterinary_shop_get_plugin_buttion($veterinary_shop_plugin['slug'], $veterinary_shop_plugin['name'], $veterinary_shop_plugin['function']);
                    $veterinary_shop_action['link']    = $veterinary_shop_link_and_is_done['button'];
                    $veterinary_shop_action['is_done'] = $veterinary_shop_link_and_is_done['done'];
                    if (!$veterinary_shop_action['is_done'] && (!isset($veterinary_shop_actions_todo[$veterinary_shop_action['id']]) || !$veterinary_shop_actions_todo[$veterinary_shop_action['id']])) {
                        $veterinary_shop_act_count++;
                    }
                    $veterinary_shop_recommended_actions[] = $veterinary_shop_action;
                    $veterinary_shop_actions_todo[]        = array('id' => $veterinary_shop_action['id'], 'watch' => true);
                }
                return array('count' => $veterinary_shop_act_count, 'actions' => $veterinary_shop_recommended_actions);
            }

        }

        public function veterinary_shop_get_recommended_plugins() {

            $veterinary_shop_plugins = apply_filters('veterinary_shop_recommended_plugins', array());
            return $veterinary_shop_plugins;
        }

        public function veterinary_shop_get_plugin_buttion($slug, $name, $function) {
                $veterinary_shop_is_done      = false;
                $veterinary_shop_button_html  = '';
                $veterinary_shop_is_installed = $this->is_plugin_installed($slug);
                $veterinary_shop_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $veterinary_shop_is_activeted = (class_exists($function)) ? true : false;
                if (!$veterinary_shop_is_installed) {
                    $veterinary_shop_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $veterinary_shop_plugin_install_url = wp_nonce_url($veterinary_shop_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $veterinary_shop_button_html        = sprintf('<a class="veterinary-shop-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($veterinary_shop_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'veterinary-shop'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'veterinary-shop')
                    );
                } elseif ($veterinary_shop_is_installed && !$veterinary_shop_is_activeted) {

                    $veterinary_shop_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($veterinary_shop_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $veterinary_shop_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $veterinary_shop_button_html = sprintf('<a class="veterinary-shop-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($veterinary_shop_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'veterinary-shop'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'veterinary-shop')
                    );
                } elseif ($veterinary_shop_is_activeted) {
                    $veterinary_shop_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'veterinary-shop'));
                    $veterinary_shop_is_done     = true;
                }

                return array('done' => $veterinary_shop_is_done, 'button' => $veterinary_shop_button_html);
            }
        public function is_plugin_installed($slug) {
            $veterinary_shop_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $veterinary_shop_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($veterinary_shop_installed_plugins[$veterinary_shop_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $veterinary_shop_keys = array_keys($this->get_installed_plugins());
            foreach ($veterinary_shop_keys as $veterinary_shop_key) {
                if (preg_match('|^' . $slug . '/|', $veterinary_shop_key)) {
                    return $veterinary_shop_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Veterinary_Shop_Plugin_Activation_WPElemento_Importer::get_instance();