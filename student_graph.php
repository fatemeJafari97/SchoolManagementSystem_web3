<?php
$conn=new mysqli("localhost","root","","school");
$total=$conn->query("select Student_id from students")->num_rows;
$boys=$conn->query("select Student_id from students where gender='male'")->num_rows;

$boysPrecentage=$boys*360/$total;
$girlsPrecentage=360-$boysPrecentage;



header("Content-type:image/png");
   $img=imagecreate(500, 500);
   
    imagecolorallocate($img, 255, 255, 255);
	
   $lineColor=imagecolorallocate($img,255, 255, 255);
   $color1=imagecolorallocate($img, 255, 0, 0);
   $color2=imagecolorallocate($img, 0, 0, 250);

     imagefilledarc($img, 250, 240, 300, 300, 0, $girlsPrecentage, $color1, IMG_ARC_EDGED);
     imagefilledarc($img, 250, 240, 300, 300, $girlsPrecentage, 360, $color2, IMG_ARC_EDGED);
     imagestring($img, 18, 280, 290, "girls", $lineColor);
      imagestring($img, 18, 160, 180, "boys ", $lineColor);
   imagepng($img);
   imagedestroy($img);
 
   ?>
   
   <a href="index.php">برگشت</a>