<?php
$list = array("notes");
			   $fp= fopen('file.csv', 'w');
			   fputcsv($fp, $list);
			   fclose($fp);
			   ?>
