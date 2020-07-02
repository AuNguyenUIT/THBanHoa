<?php
 if(isset($_SESSION["giohang"]))
  {
	  $giohang=$_SESSION["giohang"];
	  if(count($giohang)>0)
	  {
	 	  $sl=0;
		  $tongtien=0;
	  foreach($giohang as $h)
	  
	   {
		   if(isset($h[2]) && isset($h[3]))
		   {	$sl=$sl+$h[2];
            $tongtien+=$h[2]*$h[3];

		   }
		  
		}
		 echo "Số lượng :".$sl;
		 echo"<br>Tổng tiển :".number_format($tongtien);
		 echo"<br><a href='dathang.php'>Chi tiết</a>";
	  }
}

?>