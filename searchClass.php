
<?php

$className=$_GET['className'];

$sql=new mysqli("localhost","root","","school");

$res=$sql->query("select * from classes where Class_name like '%$className%' ");
 if($res->num_rows>=1){
  $counter=1;
  ?>
   <table border="1" style="width:100% !important" class="table table-striped">
          <tr>

                                      <td>نام</td>
                                      <td>فیس</td>
                                      <td>زمان شروع</td>
                                      <td>تاریخ شروع</td>
                                      <td>اتاق</td>
          </tr>
<?php
  while($rows=$res->fetch_assoc()){
 ?>
          <tr>
           <td><?php echo $rows['Class_name']?></td>
           <td><?php echo $rows['Class_fees']?></td>
           <td><?php echo $rows['start_time']?></td>
           <td><?php echo $rows['start_date']?></td>
           <td><?php echo $rows['room_no']?></td>
          </tr>
      
<?php 
$counter++;
}
?>
</table>
<?php
}
 else{
  echo "<p style='color:red; border:none; width:100%; text-align:center'>متاسفانه هیچ نتیجه پیدا نشد.</p>";
 }
?>
  