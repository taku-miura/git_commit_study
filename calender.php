<?php

// 現在の年月を取得
$year = date('Y');
$month = date('n');

// 月末日を取得
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

$calendar = array();
$j = 0;

// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {

	// 曜日を取得
	$week = date('w', mktime(0, 0, 0, $month, $i, $year));

	// 1日の場合
	if ($i == 1) {

		// 1日目の曜日までをループ
		for ($s = 1; $s <= $week; $s++) {

			// 前半に空文字をセット
			$calendar[$j]['day'] = '';
			$j++;

		}

	}

	// 配列に日付をセット
	$calendar[$j]['day'] = $i;
	$j++;

	// 月末日の場合
	if ($i == $last_day) {

		// 月末日から残りをループ
		for ($e = 1; $e <= 6 - $week; $e++) {

			// 後半に空文字をセット
			$calendar[$j]['day'] = '';
			$j++;

		}

	}

}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>カレンダー</title>
</head>
<body>
<p><?php echo $year; ?>年<?php echo $month; ?>月のカレンダー</p>
<table>
<tr>
<th>日</th>
<th>月</th>
<th>火</th>
<th>水</th>
<th>木</th>
<th>金</th>
<th>土</th>
</tr>

<tr>
<?php $cnt = 0; ?>
<?php foreach ($calendar as $key => $value): ?>

<td>
<?php $cnt++; ?>
<?php echo $value['day']; ?>
</td>

<?php if ($cnt == 7): ?>
</tr>
<tr>
<?php $cnt = 0; ?>
<?php endif; ?>

<?php endforeach; ?>
</tr>
</table>
</body>
</html>
