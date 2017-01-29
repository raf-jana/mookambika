<?php

/**
 * Deploy Configuration
 */
return [
    'available_environments' => ['local', 'development', 'staging', 'master'],
    /**
     * 'production' remote settings
     */
    'git' => [
        'available_branches' => ['development', 'staging', 'master'],
        /**
         * Production key name, if you're using something other than 'production' as your production remote.
         */
        'fetch_branch' => env('DEPLOY_FETCH_BRANCH', 'master'),
        'push_branch' => env('DEPLOY_PULL_BRANCH', 'master'),
        'pull_branch' => env('DEPLOY_PUSH_BRANCH', 'master'),
        'checkout_branch' => env('DEPLOY_CHECKOUT_BRANCH', 'master'),
    ],
    /**
     * Commands to run on the remote server via SSH, will be run in the base directory specified in
     *  ./app/config/remote.php
     *
     * Depending on the status of PR #5531 (https://github.com/laravel/framework/pull/5531),
     *  you will either need to maintain your own copy of this array if you wish to change a single
     *  entry, or can just change the line you wish to change.
     *
     * Also note, if you wish to use a different set of commands, if that PR is approved, you will need to
     *  blank out the commands you do not wish to run. I.e:
     *     'tags' => '',
     *
     * Option tags are described in the README, but can either be defined with a default value as: {option|default}
     *  or without a default value as: {option}
     *
     * They are called via: ./artisan deploy --set-option=value
     */
    'commands' => [
        'down' => 'php artisan down',
        //'pull' => 'git pull -f origin ' . env('DEPLOY_PULL_BRANCH'),
        'composer' => 'composer install --no-interaction --prefer-dist --optimize-autoloader',
        'migrate' => env('APP_ENV') === 'production' ? 'php artisan migrate --force' : 'php artisan migrate',
        'up' => 'php artisan up'
    ]
];
