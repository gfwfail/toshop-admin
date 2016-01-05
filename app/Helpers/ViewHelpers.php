<?php
/**
 * Created by PhpStorm.
 * User: luye
 * Date: 16/1/5
 * Time: 下午2:45
 */

function random_color_part() {
    $n=mt_rand( 0, 255 );
    return [str_pad( dechex( $n ), 2, '0', STR_PAD_LEFT),str_pad( dechex( $n*0.9 ), 2, '0', STR_PAD_LEFT)];
}


function random_color() {

    $r = random_color_part();
    $g = random_color_part();
    $b = random_color_part();

    $color =  '#'.$r[0] . $g[0] . $b[0];
    $highlight = '#'.$r[1] . $g[1] . $b[1];

    return [$color,$highlight];
}