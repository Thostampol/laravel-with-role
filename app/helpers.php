<?php 
function set_active($path, $active = 'active-bd active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}