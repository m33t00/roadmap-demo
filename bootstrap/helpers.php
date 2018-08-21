<?php

if (!function_exists('str_plural_ru')) {
    function str_plural_ru(int $count, string $one, string $two, string $many): string
    {
        $res = (int) ($count > 20 ? $count%10 : $count);

        switch (true) {
            case $res > 4 and $res <= 20:
            case $res === 0:
                return $many;
            case $res === 1:
                return $one;
            case $res > 1 and $res < 5:
                return $two;
            default:
                return $one;
        }
    }
}
