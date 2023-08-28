<?php
/**
 * Plugin Name: Conditional Disable Plugins
 * Description: Disables selected plugins or all plugins for a specific IP address.
 * Version: 1.0
 * Author: Lukasz Siwicki
 */

add_filter( 'option_active_plugins', 'conditionally_disable_plugins' );

function conditionally_disable_plugins( $plugins ) {
    // Check for the specific IP address
    if ( $_SERVER['REMOTE_ADDR'] == '122.123.124.125' ) {

        // List of plugins to disable
        $plugins_to_disable = array(
            'wp-file-manager/file_folder_manager.php',
            'plugin-folder2/main-plugin-file2.php',
            // ... add more plugins as needed
            // 'all', - add this to disable all plugins
        );

        // If "all" option added in , disable all plugins
        if ( in_array( 'all', $plugins_to_disable ) ) {
            return array();
        }

        foreach ( $plugins_to_disable as $plugin_path ) {
            $key = array_search( $plugin_path, $plugins );
            if ( false !== $key ) {
                unset( $plugins[ $key ] );
            }
        }
    }

    return $plugins;
}
