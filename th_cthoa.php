<?php
$mahoa=0;
if(isset($_GET["mahoa"]))
 {
	 $mahoa=$_GET["mahoa"];
	 include_once("xl_csdl.php");
	 $banghoa=Doc_Bang("select * from hoa where mahoa=".$mahoa);

foreach($banghoa as $hoa)
{
	    echo"<table widht='100%' cellpadding='10px'><tr><td><img src='hinh_anh/".$hoa[4]."'/></td>
		   <td><b>".$hoa[2]."</b><br><i>Giá bán </i>".number_format($hoa[3])."vnđ<br><i>Thành phần chính</i><br>".$hoa[5]."<br><a href='index.php?maloai=".$hoa[1]."'>Về trang chủ</a></td></tr></table>";
}
	 }

?>