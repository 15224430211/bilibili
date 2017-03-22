<?php
$a = mysqli_connect("127.0.0.1", "root", "", "bilibili");
$sql = '
SELECT
animation_detail.id,
animation_detail.`name`,
animation_detail.update_time,
animation_detail.click_count,
animation_detail.comment_count,
animation_detail.fav_count,
animation_detail.coin_count,
animation_detail.image_name,
animation_detail.length,
animation_detail.detail
FROM
animation_detail';
$result = mysqli_fetch_all(mysqli_query($a, $sql), MYSQLI_ASSOC);
echo json_encode(myfunction($result), JSON_UNESCAPED_UNICODE);


function myfunction($result)
{
    $fuck = array();
    foreach ($result as $key => $value) {
        $fuck[$value['id']] = $value;
    }
    return $fuck;
}

