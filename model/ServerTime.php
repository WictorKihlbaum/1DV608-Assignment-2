<?php

/**
 * Created by PhpStorm.
 * User: wictor
 * Date: 2015-09-13
 * Time: 14:36
 */
class ServerTime {

    public static function getServerTime() {
        return date("l") . ", the " . date("jS") . " of " . date("F Y") . ", The time is " . date("H:i:s");
    }
}