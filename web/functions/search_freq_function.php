<?php
/**
 * Created by PhpStorm.
 * User: erfan
 * Date: 5/7/18
 * Time: 1:59 AM
 */
require_once("function.php");

function add_freq($specility) {

    $result = query("SELECT count FROM search_frequency WHERE specility = '{$specility}'");
    confirm($result);

    $single_result = fetch_array($result);
    $count = $single_result['count'] + 1;


    $query = query("UPDATE search_frequency SET
                        count = '{$count}'
                        WHERE specility = '$specility'
                        ");
    confirm($query);
}