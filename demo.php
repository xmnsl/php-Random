<?php
/**
 * Created by PhpStorm.
 * User: sunlei
 * Date: 2019/2/27
 * Time: 15:03
 */

$arr = [];
for($i = 1;$i<=10001;$i++){
    $arr[] = $i;
}

$user_num = count($arr);
$group_max_num = 5;
$mod = $user_num % $group_max_num;
$group = ceil($user_num/$group_max_num);
$group_arr = [];
for($i = 1;$i<= $group; $i++){
    $group_arr[] = random($arr,$group_max_num);
}
if($mod == 1){
    $count = count($group_arr);
    $last = array_merge($group_arr[$count-2],$group_arr[$count-1]);
    unset($group_arr[$count-2],$group_arr[$count-1]);
    $chunk = array_chunk($last,ceil(count($last)/2));
    $group_arr = array_merge($group_arr,$chunk);
}


/**
 * 随机获取数组值
 * @param $array
 * @param null $number
 * @return array
 */
function random(&$array, $number = null)
{
    $requested = is_null($number) ? 1 : $number;
    $count = count($array);
    if (is_null($number)) {
        return $array[array_rand($array)];
    }

    if ((int) $number === 0) {
        return [];
    }
    $keys = array_rand($array, $requested > $count ? $count :$number);
    $results = [];
    foreach ((array) $keys as $key) {
        $results[] = $array[$key];
        unset($array[$key]);
    }
    return $results;
}