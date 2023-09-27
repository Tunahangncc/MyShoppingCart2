<?php

use \Illuminate\Support\Facades\Session;

// Session Message
function setSessionMessage($sessionMessage, $type = 'success') {
    Session::put('alert-message', $sessionMessage);
    Session::put('alert-type', $type);
}
