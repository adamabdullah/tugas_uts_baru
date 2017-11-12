
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$server = "localhost"; //ganti sesuai server Anda
$username = "root"; //ganti sesuai username Anda
$password = ""; //ganti sesuai password Anda
$db_name = "tugasphp11"; //ganti sesuatu nama database Anda

$username1=$_SESSION["siakad1"];
$pass=$_SESSION["siakad2"];
$db = mysqli_connect($server, $username, $password, $db_name);
$login = mysqli_query($db,"select * from mhs where npm='$username1' AND password='$pass'");
//untuk mengirimkan perintah dari isi variabel $login ke server mysql.


$result = mysqli_num_rows($login);
//untuk mengambil jumlah baris dari isi variabel $login
$baru=mysqli_fetch_array($login);
//untuk mengambil jumlah baris dari isi variabel $login
//echo $result. "ini jumlah baris nya";

if ($baru["npm"] == isset($username1))
{
	echo "Selamat datang ".$baru["nama"];
	echo "<br>";
	for ($i=2;$i<=5;$i++)
	{
		echo $baru[$i];
		echo "<br>";
	}
	
	//jika jumlah baris lebih dari 0 maka variabel baru akan menampilkan data mysql yang berasal dari variabel login. 

	
}
else {
	echo "gak bisa";
}


?>
<p>Ingin kembali logout ? Silahkan klik di link dibawah ini</p>

<p><a href='http://localhost/praktikum/belajar/logout.php'>Logout</a></p>

</body>

</html>