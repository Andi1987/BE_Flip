<?php

// Third-party parts
function flip_request($path = null, $method = null, $data = null, $alt_link = false) {
    if ($method != "") {
        $CI = &get_instance();

        if ($alt_link == false) {
            $flip_api_host = $CI->config->item('flip_api_host');
        } 

        switch ($method) {
            case 'POST':
                log_message('ERROR', 'INITIATE AOL DATA REQUEST');
                $request = Requests::post($flip_api_host . $path, array(), $data);
                log_message('ERROR', 'CLOSE AOL DATA REQUEST');
                break;

            case 'GET':

                /* COMMENT BELOW IF EMERGENCY */
                log_message('ERROR', 'INITIATE AOL DATA REQUEST');
                $request = Requests::get($flip_api_host . $path, array(), array('timeout' => '240'));
                log_message('ERROR', 'CLOSE AOL DATA REQUEST');

                break;

            default:
                return false;
        }

        $body = $request->body;

        return json_decode($body, true);
    } else {
        return false;
    }
}

