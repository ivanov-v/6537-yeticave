<?php
    function renderTemplate($path, $data) {
        if(!file_exists($path)) {
            return "";
        }

        ob_start('ob_gzhandler');
        extract($data, EXTR_SKIP);
        require_once($path);

        return ob_get_clean();
    }

    function format_time($seconds) {
        $hours = $seconds / 3600;
        $floor_hours = floor($hours);
        $floor_minutes = floor(($hours - $floor_hours) * 60);

        return to_decade($floor_hours) . ':' . to_decade($floor_minutes);
    }

    function to_decade($num) {
        return $num > 9 ? $num : '0' . $num;
    }
?>