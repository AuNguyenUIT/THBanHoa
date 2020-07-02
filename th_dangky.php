
<script language="javascript" type="text/jscript">
const check=()=>{
    let mk=document.querySelector("#mat_khau");
    let mk1=document.querySelector("#mat_khau1");
    if(mk.value!==mk1.value){
        alert("Mật khẩu xác nhận không trùng với mật khẩu");
        mk1.value="";
    }
}


</script>

<?php
    if(isset($_POST['ten_dn'])&& isset($_POST['mat_khau'])&& isset($_POST['mat_khau1'])&& isset($_POST['email'])&& isset($_POST['dia_chi']) && isset($_POST['so_dt']) && isset($_POST['ho_ten']))
    {
        include_once('xl_csdl.php');
        $caulenh="select TenDN from khachhang where TenDN='".$_POST["ten_dn"]."'";
        $bangkh=Doc_Bang($caulenh);
      
        if($bangkh->rowCount()==0){
            $caulenh="insert into khachhang(TenDN, MatKhau, HoTen, DiaChi, DienThoai, Email) values('".$_POST["ten_dn"]."','".$_POST["mat_khau"]."','".$_POST["ho_ten"]."','".$_POST["dia_chi"]."','".$_POST["so_dt"]."','".$_POST["email"]."')";
            Ghi_Du_Lieu($caulenh);
            echo "<script>
            alert('Đăng Ký Thành Công');
            location.replace('index.php');
            </script>";
        }
        else{
            echo "<script>
            alert('Đăng Ký Thất Bại');
            location.replace('dangky.php');
            </script>";
        }

    }
?>

<form action="dangky.php" method="post" enctype="multipart/form-data" name="form1">
    <table width="70%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#E6F6D9">
        <tr bgcolor="#D7F2C5">
            <td colspan="2" bgcolor="#D7F2C5">
                <div align="center" class="style4"> ĐĂNG KÝ</div>
            </td>
        </tr>
        <tr>
            <td width="28%">
                <p class="style7">&nbsp;Tên đăng nhập: </p>
            </td>
            <td width="72%"><label>
                    <input name="ten_dn" type="text" id="ten_dn" size="35">
                </label></td>
        </tr>
        <tr>
            <td>
                <p class="style7">&nbsp;Mật khẩu:</p>
            </td>
            <td><label>
                    <input name="mat_khau" type="password" id="mat_khau">
                </label></td>
        </tr>
        <tr>
            <td><span class="style7">&nbsp;Mật khẩu xác nhận:</span></td>
            <td><input name="mat_khau1" type="password" id="mat_khau1" onblur="check()"></td>
        </tr>
        <tr>
            <td>
                <p class="style7">&nbsp;Họ và tên: </p>
            </td>
            <td><label>
                    <input name="ho_ten" type="text" id="ho_ten" size="35">
                </label></td>
        </tr>
        <tr>
            <td>
                <p class="style7">&nbsp;Địa chỉ email: </p>
            </td>
            <td><label>
                    <input name="email" type="text" id="email" size="35">
                </label></td>
        </tr>
        <tr>
            <td><span class="style7">&nbsp;Địa chỉ liên lạc:</span></td>
            <td><input name="dia_chi" type="text" id="dia_chi" size="45"></td>
        </tr>
        <tr>
            <td>
                <p class="style7">&nbsp;Số điện thoại: </p>
            </td>
            <td><label>
                    <input name="so_dt" type="text" id="so_dt">
                </label></td>
        </tr>
        <tr>
            <td height="35" colspan="2">
                <p align="center">
                    <label>
                        <input type="submit" name="Submit" value="Đăng ký">
                    </label>
                </p>
            </td>
        </tr>
    </table>
</form>