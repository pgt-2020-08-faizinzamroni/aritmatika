<!DOCTYPE html>
<html>
<head>
	<title>Penjumlahan PHP</title>
</head>
<center><h1>Penjumlahan</h1></center>
<body>
<center>
<form methot="get" action="">
Nilai 1 = <input type="text" name="a"><br>
Nilai 2 = <input type="text" name="b"><br>
<input type="submit" name="submit" value="Jumlahkan">
</form>
<p>Hasil</p>
<table border="1">
	<tr>
<th>NO.</th>
<th>A</th>
<th>B</th>
<th>C</th>
<th>KET</th>
</tr>
<tbody>
<?php

if (isset($_GET['submit'])) {
	$a=$_GET['a'];
	$b=$_GET['b'];
	
	$c=$a+$b;

	echo $c;

	if ($c>=85) {
		$ket="A";
	}

	elseif ($c>=75) {
		$ket="B";
	}

	elseif ($c>=65) {
		$ket="C";
	}

	elseif ($c>=55) {
		$ket="D";
	}

	elseif ($c<55) {
		$ket="E";
	}
}

for ($i=0; $i<=10; $i++) {
	$a=$_GET['a'];
	$b=$_GET['b'];
	
	$c=$a+$b;

	if ($c>=85) {
		$ket="A";
	}

	elseif ($c>=75) {
		$ket="B";
	}

	elseif ($c>=65) {
		$ket="C";
	}

	elseif ($c>=55) {
		$ket="D";
	}

	elseif ($c<55) {
		$ket="E";
	}
}
//koneksi ke database mysql, silahkan di rubah dengan koneksi agan sendiri 
$koneksi = mysqli_connect("localhost","root","","databasepoltek"); 

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut 

if (mysqli_connect_errno()){  echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error(); }

$sql = mysqli_query($koneksi, "INSERT INTO aritnatika(a, b,
c, ket) VALUES('$a', '$b', '$c', '$ket')") or die(mysqli_error($koneksi));


if (isset($_GET['submit'])){
//query ke database SELECT tabel mahasiswa urut berdasarkan idyang paling besar
$sql = mysqli_query($koneksi,
"SELECT * FROM aritnatika") or die(mysqli_error($koneksi));
//jika query diatas menghasilkan nilai > 0 maka menjalankan script dibawah if...
if(mysqli_num_rows($sql) > 0){
//membuat variabel $no untuk menyimpan nomor urut
$no = 1;
//melakukan perulangan while dengan dari dari query $sql
while($data = mysqli_fetch_assoc($sql)){
//menampilkan data perulangan
echo '
<tr>
<td>'.$no.'</td>
<td>'.$data['a'].'</td>
<td>'.$data['b'].'</td>
<td>'.$data['c'].'</td>
<td>'.$data['ket'].'</td>
</tr>
';
$no++;
}
//jika query menghasilkan nilai 0
}else{
echo '
<tr>
<td colspan="6">Tidak ada data.</td>
</tr>
';
}

}
?>
</tbody>
</table>
</center>
</body>
</html>