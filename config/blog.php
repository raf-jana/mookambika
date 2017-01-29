<?php

return [
    // Default Avatar
    'default_avatar' => env('DEFAULT_AVATAR') ?: '/uploads/default_profile_pics/Abul-Kalam-Azad.jpg',
    // Default Icon
    'default_icon' => env('DEFAULT_ICON') ?: '/images/favicon.ico',
    'admin_full_name' => env('ADMIN_FULL_NAME', ''),
    'admin_email' => env('ADMIN_EMAIL', 'nag.samayam@gmail.com'),
    'admin_mobile_number' => env('ADMIN_MOBILE_NUMBER', ''),
    'uploads' => [
        'storage' => env('FILESYSTEM_DISK', 'local')
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Application Services enabled status
     * |--------------------------------------------------------------------------
     * |
     * | 
     */

    // Mail enabled status
    'mail_enabled' => env('MAIL_ENABLED', false),
    /*
      |--------------------------------------------------------------------------
      | Request Logging
      |--------------------------------------------------------------------------
      |
      | One app I'm working on requires logging every action on the site. This
      | can be accomplished with middleware:
      |
     */
    'request_log_enabled' => env('BLOG_REQUEST_LOG_ENABLED', false),
    // Reviews
    'reviews' => [
        'items_show_before_read_more' => 10
    ],
    // News
    'news' => [
        'items_show_before_read_more' => 10
    ],
    // FAQs
    'faqs' => [
        'items_show_before_read_more' => 10
    ],
    // Features
    'features' => [
        'number' => 2
    ],
    // Photos.
    'gallery' => [
        'number' => 2
    ],
    // Social Share
    'social_share' => [
        'article_share' => env('ARTICLE_SHARE') ?: true,
        'discussion_share' => env('DISCUSSION_SHARE') ?: true,
        'sites' => env('SOCIAL_SHARE_SITES') ?: 'google,twitter,weibo',
        'mobile_sites' => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'google,twitter,weibo,qq,wechat'
    ],
    // Google Analytics
    'google' => [
        'id' => env('GOOGLE_ANALYTICS_ID', 'Google-Analytics-ID'),
        'open' => env('GOOGLE_OPEN') ?: false
    ],
];
