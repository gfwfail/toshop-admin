<?php
/**
 * Created by PhpStorm.
 * User: luye
 * Date: 15/12/28
 * Time: 下午10:48
 */
function int2currency($int) {
    return '$'.money_format('%i',($int)/100);
}
