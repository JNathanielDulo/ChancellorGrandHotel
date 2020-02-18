<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE notification SET notif_status=1 WHERE notif_status=0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM notification ORDER BY notif_no DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <a href="http://localhost/seorabeol95/include/admin/transaction.php" class="dropdown-item">
     '.$row["notif_subject"].' <br><small>'.$row["notif_time"].'</small> </a>';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="dropdown-item">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM notification WHERE notif_status=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
