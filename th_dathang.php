<?php
    if(isset($_SESSION["giohang"]))
	{
		$giohang=$_SESSION["giohang"];
		if(count($giohang)>0)
		{
            if( !empty($_POST["ho_ten"]) && !empty($_POST["email"]) && !empty($_POST["dien_thoai"]) && !empty($_POST["dia_chi"]))
			{
                include_once("xl_csdl.php");
                $hoten=$_POST["ho_ten"]; 
                $email= $_POST["email"];
                $dienthoai= $_POST["dien_thoai"];
                $diachi= $_POST["dia_chi"];
                if(isset($_SESSION["makh"]))
                        $makh=$_SESSION["makh"];	
                else{
                    $makh=0;
                } 
                $ngaydh=date("Y-m-d H:s:i"); 
                $caulenh="insert into donhang(ngaydh,makh,hoten,diachi,dienthoai,email,trangthai) values('".$ngaydh."',".$makh.",'".$hoten."','".$diachi."','".$dienthoai."','".$email."',1)";			
                Ghi_Du_Lieu($caulenh);
                $bangdh=Doc_Bang("select max(sodh)as sodhmoi from donhang");
        
                foreach($bangdh as $dh)
                {
                    $sodh=$dh[0];
                    $caulenh="insert into ctdonhang(sodh,mahoa,soluong,dongia,thanhtien)
                    values";
                    foreach($giohang as $h)
                    if(isset($h[1]) && isset($h[2]) && isset($h[3]) && isset($h[0])){
                        $caulenh=$caulenh."(".$sodh.",".$h[0].",".$h[2].",".$h[3].",".($h[2]*$h[3])."),";
                        $caulenh=substr($caulenh,0,strlen($caulenh)-1);
                    }
                    //Gửi Mail
                    Ghi_Du_Lieu($caulenh);
                    unset($_SESSION["giohang"]);
                    echo "<script>
                    alert('Chúc mừng bạn đã mua hàng');
                    location.replace('index.php');
                    </script>"; 
                }
            }     
            else if(isset($_SESSION["makh"]))
            {
                $hoten=$_SESSION["tenkh"];
                $makh=$_SESSION["makh"];
                $email= $_SESSION["email"];
                $dienthoai= $_SESSION["dienthoai"];
                $diachi= $_SESSION["diachi"];
            }
        }
    }
?>
<form name="form1" method="post">
    <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td><span class="style3">Họ Tên:</span></td>
            <td><input name="ho_ten" type="text" id="ho_ten" value="<?php echo $hoten?>" size="30"></td>
        </tr>
        <tr>
            <td><span class="style3">Số Điện Thoại :</span></td>
            <td><input name="dien_thoai" type="text" id="dien_thoai" value="<?php echo $dienthoai?>" size="30"></td>
        </tr>
        <tr>
            <td><span class="style3">Email:</span></td>
            <td><input name="email" type="text" id="email" value="<?php echo $email?>" size="30"></td>
        </tr>
        <tr>
            <td><span class="style3">Địa chỉ giao hàng:</span></td>
            <td><input name="dia_chi" type="text" id="dia_chi" value="<?php echo $diachi?>" size="30"></td>
        </tr>
        <tr>
            <td height="30" colspan="2" align="center"><input type="submit" name="cmddathang" value="Đặt hàng"></td>
        </tr>
    </table>
</form>