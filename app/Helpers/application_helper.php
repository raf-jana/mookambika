<?php

/**
 * Get full page title
 */
if (!function_exists('fullTitle')) {

    function fullTitle($pageTitle = '') {
        if (!$pageTitle) {
            return config('app.name');
        }
        return $pageTitle . ' | ' . config('app.name');
    }

}
/*
 * |--------------------------------------------------------------------------
 * | IP address of the current user
 * |--------------------------------------------------------------------------
 * |
 */
if (!function_exists('getUserIp')) {

    function getUserIp($integer_format = true) {
        $ip_address = Request::ip();

        return $integer_format ? ip2long($ip_address) : $ip_address;
    }

}

/*
 * |--------------------------------------------------------------------------
 * | User agent (web browser) being used by the current user
 * |--------------------------------------------------------------------------
 * |
 */
if (!function_exists('getUserAgent')) {

    function getUserAgent() {
        return (!isset($_SERVER ['HTTP_USER_AGENT'])) ? false : $_SERVER ['HTTP_USER_AGENT'];
    }

}

/*
 * Generate a globally unique identifier
 */
if (!function_exists('generateGUID')) {

    function generateGUID($opt = false) { // Set to true/false as your default way to do this.
        if (function_exists('com_create_guid')) {
            if ($opt) {
                return com_create_guid();
            } else {
                return trim(com_create_guid(), '{}');
            }
        } else {
            mt_srand((float) microtime() * 10000); // optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $left_curly = $opt ? chr(123) : ''; // "{"
            $right_curly = $opt ? chr(125) : ''; // "}"
            $uuid = $left_curly . substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen . substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12) . $right_curly;

            return $uuid;
        }
    }

}

/*
 * Generate unique file name
 */
if (!function_exists('generateFileName')) {

    /**
     * Return the custom name for uploaded file.
     *
     * @param
     *        	$id
     * @param string $moduleName        	
     *
     * @return string
     */
    function generateFileName($fileExtension) {
        return time() . '-' . uniqid() . '.' . $fileExtension;
    }

}

if (!function_exists('classActivePath')) {

    function classActivePath($path) {
        return Request::is($path) ? ' class="active"' : '';
    }

}

/*
 * Render HTML helper block
 */
if (!function_exists('classHelperBlock')) {

    function classHelperBlock($errors, $name) {
        if ($errors->has($name)) {
            return '<span class="help-block">' . $errors->first($name) . '</span>';
        }
    }

}
/*
 * Render HTML 'has-error' class
 */
if (!function_exists('classHasError')) {

    function classHasError($errors, $name, $class = 'has-error') {
        if ($errors->has($name)) {
            return $class;
        }

        return '';
    }

}
/*
 * Render HTML 'has-error' class
 */
if (!function_exists('classControlLabel')) {

    function classControlLabel($errors, $name, $class = 'has-error') {
        if ($errors->has($name)) {
            return [
                'class' => 'control-label'
            ];
        }

        return [];
    }

}

if (!function_exists('humanFilesize')) {

    /**
     * Get a readable file size.
     *
     * @param
     *        	$bytes
     * @param int $decimals        	
     * @return string
     */
    function humanFilesize($bytes, $decimals = 2) {
        $size = [
            'B',
            'kB',
            'MB',
            'GB',
            'TB',
            'PB'
        ];

        $floor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $floor)) . @$size [$floor];
    }

}

