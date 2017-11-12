<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php

session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
	// untuk mengecek apakah ada button submit yang diklik oleh user
	class coba1{
	function header1()
	{
		header( "Refresh: 0; url=http://localhost/praktikum/belajar/koneksi.php" );
	}
	}
	$fungsi1 = new coba1();
	//	Menghasilkan metode permintaan yang digunakan untuk mengakses halaman (seperti POST)
	$server = "localhost"; //ganti sesuai server Anda
	$username = "root"; //ganti sesuai username Anda
	$password = ""; //ganti sesuai password Anda
	$db_name = "tugasphp11"; //ganti sesuatu nama database Anda
	$username1=$_POST["username1"];
	$pass=$_POST["password2"];
	$db = mysqli_connect($server, $username, $password, $db_name);
	$login = mysqli_query($db,"select * from mhs where npm='$username1' AND password='$pass'");
	//untuk mengirimkan perintah dari isi variabel $login ke server mysql. (mysqli_query
	$baru=mysqli_fetch_array($login);
	//fetch_array berguna untuk memanggil isi tabel dari sebuah database
	//echo $result. "ini jumlah baris nya";
	//echo "<br>";
		//echo "<br>";
		//echo "Anda gagal sebanyak = "	. $_SESSION["gagal2"];

	if ($baru["npm"] == isset($username1))  
	{
		//jika jumlah baris lebih dari 0 maka variabel baru akan menampilkan data mysql yang berasal dari variabel login.
		$_SESSION["siakad1"]=$username1;
		$_SESSION["siakad2"]=$pass;
		$fungsi1->header1();
		//header( "Refresh: 0; url=http://localhost/praktikum/belajar/koneksi.php" );
		
	/*	echo "<br>";
		echo "Selamat datang ".$baru["nama"]. " dengan NPM ". $baru["npm"];
		$_SESSION['berhasil']=$username1;
		echo "Password benar";
		$baru2 = implode (" ", $baru);*/
	
	}
	
	else if (isset($username1) && $baru["npm"] != $username1) 
	{
		echo "gagal";
		$_SESSION["gagal2"]++;
		echo "<br>";
		echo "Anda gagal sebanyak = "	. $_SESSION["gagal2"];
		if ($_SESSION["gagal2"] >= 1 && $_SESSION["gagal2"] <= 5)
		{
			header( "Refresh: 0; url=http://localhost/praktikum/belajar/gagalsekali.php" );
		}
		
		else if ($_SESSION["gagal2"] >= 6)
		{
			header( "Refresh: 0; url=http://localhost/praktikum/belajar/gagal.php" );
		}
	}
	
}



		
 
 
?>
<body>
<form action="" method="POST" >

<table width="200″ border="0">
<tr>
<td colspan="2″><div align="center">Halaman Login </div></td>
</tr>
<tr>
<td>Username</td>
<td><input type="text" name="username1"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password2"></td>
</tr>
<tr>
<td><input type="submit" name="Submit" value="Login"> </td>
<td> </td>
</tr>
</table>
</form>


</body>
</html>