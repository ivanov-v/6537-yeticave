<?php
function renderTemplate($path, $data) {
    if(!file_exists($path)) {
        return "";
    }

    ob_start('ob_gzhandler');
    extract($data, EXTR_SKIP);
    require_once $path;

    return ob_get_clean();
}
?>