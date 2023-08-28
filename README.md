# wp-conditional-disable-plugins
Disabling plugins of your choice for certain IP address - makes debugging easy.

# How to use
Change the following to an IP address that this condition should work on:

```
    if ( $_SERVER['REMOTE_ADDR'] == '122.123.124.125' ) {
```

Add a plugin folder and main plugin file inside an array that needs to be disabled:

```
        $plugins_to_disable = array(
            'wp-file-manager/file_folder_manager.php',
            'plugin-folder2/main-plugin-file2.php',
        );
```

If you want to disable all plugins use `all` inside an array:

```
        $plugins_to_disable = array(
            'all',
        );
```

Enjoy debugging !
