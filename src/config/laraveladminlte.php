<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Look & feel customizations
    |--------------------------------------------------------------------------
    |
    | Make it yours.
    |
    */

    // Project name. Shown in the breadcrumbs and a few other places.
    'project_name' => env('APP_NAME', 'AdminLTE'),

    // Menu logos
    'logo_lg'   => '<b>Admin</b>LTE',
    'logo_mini' => '<b>A</b>LT',

    // Developer or company name. Shown in footer.
    'developer_name' => 'Upgrade-IT',

    // Developer website. Link in footer.
    'developer_link' => 'http://upgradeit.com.ar',

    // Show powered by Laravel AdminLTE in the footer?
    'show_powered_by' => true,

    // The AdminLTE skin. Affects menu color and primary/secondary colors used throughout the application.
    'skin' => 'skin-blue',
    // Options: skin-black, skin-blue, skin-purple, skin-red, skin-yellow, skin-green, skin-blue-light, skin-black-light, skin-purple-light, skin-green-light, skin-red-light, skin-yellow-light

    'view_notifications' => true,
    /*
    |--------------------------------------------------------------------------
    | Registration Open
    |--------------------------------------------------------------------------
    |
    | Choose whether new users/admins are allowed to register.
    | This will show up the Register button in the menu and allow access to the
    | Register functions in AuthController.
    |
    | By default the registration is open only on localhost.
    */

    'registration_open' => env('ADMINLTE_REGISTRATION_OPEN', env('APP_ENV') === 'local'),

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */

    // The prefix used in all base routes (the 'admin' in admin/dashboard)
    // You can make sure all your URLs use this prefix by using the AdminLTE::url() helper instead of url()
    'route_prefix' => 'admin',
    'route_dashboard' => 'dashboard',

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    */

    // Fully qualified namespace of the User model
    'user_model_fqn' => '\App\User',

];
