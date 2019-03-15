<?php

// Pattern: 'route' => 'controller/action'

return array(
    // Admin panel
    Config::get_data("admin_token_prefix").'admin_panel_main' => 'admin/panel',
    Config::get_data("admin_token_prefix").'admin_panel' => 'admin/auth',

    // Api routes
    'get_about_ads' => 'api/about',
    'get_jobs' => 'api/getAllJobs',
    'get_resume' => 'api/getAllresume',
    'get_services' => 'api/getAllservices',
    'for_developers' => 'other/forDevelopers',
    'error_api' => 'api/HelpError',
    'get_api' => 'api/router',
    'admin_menu' => 'ads/admin',

    // Other
    'parsing_vk' => 'admin/parsing',
    'rook_panel_site' => 'admin/check',
    'refresh_ads_time' => 'mess/timeAdsRefresh',
    'testing' => 'test/search',
    'agreement' => 'mess/agreement',
    'new_password' => 'mess/newPassword',
    'plus_bonus' => 'mess/plusBonus',
    'editing_test' => 'mess/editTest',
    'editing_ads' => 'ads/editAds',
    'now_time' => 'mess/nowTime',
    'promo_code' => 'mess/promo',
    'highlight' => 'mess/highlightAds',
    'vip_state' => 'mess/vipTime',
    'delete' => 'mess/deleteAds',
    'tags' => 'other/tags',
    'message' => 'mess/index',
    'new_user' => 'mess/newUser',
    'enter_user' => 'mess/loginTest',
    'my_cabinet' => 'ads/cabinet',

    // Verefication
    'send_verification' => 'mess/verSend',
    'code_verification' => 'mess/verCode',

    // Auth user
    'login' => 'mess/login',
    'reg' => 'mess/reg',
    'exit' => 'room/exit',
    'vk_login' => 'mess/vk',

    // Ads
    'jobs' => 'ads/getAllJobs',
    'resume' => 'ads/getAllresume',
    'services' => 'ads/getAllservices',
    'about' => 'ads/about',

    // Plus ads
    'plus_jobs' => 'room/plusAdsTest',
    'plus_resume' => 'room/plusAdsTest',
    'plus_services' => 'room/plusAdsTest',
    'plus_ads' => 'room/plus',

    // Errors page
    '404' => 'mess/404',
    'authentication_warning' => 'mess/auth_Warning',

    // Landing
    'hello' => 'other/index',
    '' => 'other/index'
);
