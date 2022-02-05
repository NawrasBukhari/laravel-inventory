<?php

function format_money($money)
{
    if(!$money) {
        return "0.00 ₸";
    }

    $money = number_format($money);

    if(strpos($money, '-') !== false) {
        $formatted = explode('-', $money);
        return "$formatted[1] ₸";
    }

    return "$money ₸";

}
function format_weight($weight)
{
    if(!$weight){
        return"0.00 КГ";
    }
    $format_weight = number_format($weight);
    if(strpos($weight, '-') !== false) {
        $formatted = explode('-', $weight);
        return "$formatted[1] КГ";
    }
    return "$weight КГ";
}