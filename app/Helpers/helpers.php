<?php

if (!function_exists('settings')) {
    function settings() {
        return \Modules\Setting\Entities\Setting::firstOrFail();
    }
}

if (!function_exists('format_currency')) {
    function format_currency($value) {
        if (settings()->default_currency_position == 'prefix') {
            $formatted_value = settings()->currency->symbol . number_format($value, 2, settings()->currency->decimal_separator, settings()->currency->thousand_separator);
        } else {
            $formatted_value = number_format($value, 2, settings()->currency->decimal_separator, settings()->currency->thousand_separator) . settings()->currency->symbol;
        }

        return $formatted_value;
    }
}