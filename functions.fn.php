<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 19/01/15
 * Time: 23:43
 */


/**
 * @return bool
 */
function isConnected()
{
    if (!empty($_SESSION['username']) && $_SESSION['status'] == 'connected') {
        return true;
    } else {
        return false;
    }
}