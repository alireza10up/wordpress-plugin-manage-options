<?php

add_action('admin_menu', function () {
    add_menu_page(
        'Manage Option',
        'Manage Option',
        'manage_option',
        'manage-option',
        fn () => mo_inc(),
        'dashicons-editor-table'
    );
});