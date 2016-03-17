<?php


$hostdir= dirname(__FILE__) . '/html/' ;
//获取本文件目录的文件夹地址
$filesnames = scandir($hostdir);
//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames
//print_r ($filesnames);
foreach ($filesnames as $key => $value) {
	# code...
	if (strpos($value,'.html')) {
		# code...
		echo '<a href="./html/'.$value.'" target="_blank">'.$value.'</a><br>';
	}
	
}

?>