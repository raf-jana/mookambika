<?php

/**
 * Format form validation error messages.
 *
 * @param array $messages
 *
 * @return array
 */
if (!function_exists('formatValidationMessages')) {

    function formatValidationMessages(Illuminate\Support\MessageBag $messages) {
        $errors = [];

        if ($messages->has('environment')) {
            $field = 'environment';
            $errors[] = getErrorMessage($field, $messages->first($field));
        }
        if ($messages->has('git_branch')) {
            $field = 'git_branch';
            $errors[] = getErrorMessage($field, $messages->first($field));
        }

        return $errors;
    }

}

/*
 * Get error message in array format with internal code
 *
 * @param
 *            $field
 * @param string $message
 * @return array
 */
if (!function_exists('getErrorMessage')) {

    function getErrorMessage($field, $message = '') {
        $errorMsg[$field] = [
            'field' => $field,
            'message' => $message,
        ];

        return $errorMsg[$field];
    }

}
