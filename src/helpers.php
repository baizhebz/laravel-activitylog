<?php

use Spatie\Activitylog\ActivityLogger;

if (! function_exists('activity')) {
    /**
     * @param string|null $logName
     * @return \Spatie\Activitylog\ActivityLogger
     */
    function activity($logName = null)
    {
        $defaultLogName = config('laravel-activitylog.default_log_name');

        return app(ActivityLogger::class)->useLog($logName === null ? $defaultLogName : $logName);
    }
}

if (! function_exists('string_between')) {
    /**
     * Get the string between the given start and end.
     *
     * @param $string
     * @param $start
     * @param $end
     * @return string
     */
    function string_between($string, $start, $end)
    {
        if ($start == '' && $end == '') {
            return $string;
        }
        if ($start != '' && strpos($string, $start) === false) {
            return '';
        }
        if ($end != '' && strpos($string, $end) === false) {
            return '';
        }
        if ($start == '') {
            return substr($string, 0, strpos($string, $end));
        }
        if ($end == '') {
            return substr($string, strpos($string, $start) + strlen($start));
        }
        $stringWithoutStart = explode($start, $string)[1];
        $middle = explode($end, $stringWithoutStart)[0];
        return $middle;
    }
}