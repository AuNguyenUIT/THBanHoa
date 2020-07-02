<?php


//Lấy mã hoa duoc chon
$tenhoa="";

if(isset($_POST["ten"]))
 {
	 $tenhoa=$_POST["ten"];
	 include_once("xl_csdl.php");
$banghoa=Doc_Bang("select * from hoa where tenhoa like'%".$tenhoa."%' or mota like '%".$tenhoa."%'");
echo"<table width='100%' cellpadding='10px'>";
$dem=0;
foreach($banghoa as $hoa)
{
	if($dem%2==0)
		echo "<tr>";
	 echo "<td><img src='hinh_anh/".$hoa[4]."'/></td>
		   <td><b>".$hoa[2]."</b><br><i>Giá bán </i>".number_format($hoa[3])."vnđ<br><i>Thành phần chính</i><br>".$hoa[5]."<br><a href='trang_1.php?maloai=".$hoa[1]."'>Về trang chủ</a></td>";
		$dem++;
	if($dem%2==0)
	 echo"</tr>";
		   
}
echo"</table>";
	 }

?>