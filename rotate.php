<?php
function getRand($proArr) {
    $data = '';
    $proSum = array_sum($proArr);
    foreach ($proArr as $k => $v) {
        $randNum = mt_rand(1, $proSum);
        //echo $randNum.'=>'.$v.'<br>'; 
        if ($randNum <= $v) {
            $data = $k;
            break;
        } else {
            $proSum -= $v;
        }
    }
    unset($proArr);
    return $data;
}

//prize表示奖项内容， angle表示奖项对应角度，v表示中奖几率(若数组中每个奖项的v的总和为100，如果v的值为1，则代表中奖几率为1%，依此类推)
$prize_arr = array(
    '0' => array('id' => 1, 'prize' => '一等奖', 'angle' => 0+10*360, 'v' => 1),
    '1' => array('id' => 2, 'prize' => '二等奖', 'angle' => 120+10*360, 'v' => 2),
    '2' => array('id' => 3, 'prize' => '三等奖', 'angle' => 240+10*360, 'v' => 7),
    '3' => array('id' => 4, 'prize' => '再接再厉', 'angle' => 150+10*360, 'v' => 10),
    '4' => array('id' => 5, 'prize' => '要加油哦', 'angle' => 265+10*360, 'v' => 15),
    '5' => array('id' => 6, 'prize' => '谢谢参与', 'angle' => 330+10*360, 'v' => 65)
);

foreach ($prize_arr as $k=>$v) {
    $arr[$v['id']] = $v['v'];
}

$prize_id = getRand($arr);
$res = $prize_arr[$prize_id - 1]; //中奖项 

$data['id'] = $res['id'];
$data['prize'] = $res['prize'];
$data['angle'] = $res['angle'];

echo json_encode($data);

?>


