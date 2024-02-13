<?php ob_start(); ?>
<html>
<style type="text/css">
	table {
    border-collapse: collapse;
    padding-left: 5px;

}

table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 8px;
    text-align: left;
   
}
h3{
	margin-bottom: 1px;
	margin-top: 1px;
}
p{
	margin-bottom: 1px;
	margin-top: 1px;
}
</style>
<head>
	<title>Cetak PDF</title>
</head>
<body style="font-size: 8px;">
	<?php 

 $nmbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$bln=$_GET['bln'];
$thn=$_GET['thn'];

	?>
<h3 style="text-align: center; font-size: 16px">LAPORAN KEBERANGKATAN</h3>
<h3 style="text-align: center; font-size: 13px;">Kalimantung Boat's</h3>
<p style="text-align: center;">@pariwisatasumatera / 085270840356</p>
<hr>
<p style="text-align: center; margin-bottom: 5px;"> Periode : <?php if(!$bln=="") echo $nmbulan[(int) $bln - 1]; ?> <?php if(!$thn=="") echo $thn; ?> </p>
<table border="0" width="50%">
<tr>

	<th width='5'>NO</th>
	<th width='40'>KODE TIKET</th>
	<th width='40'>TANGGAL</th>
	<th width='20'>JAM</th>
	<th width='60'>TUJUAN</th>
	<th width='60'>KAPAL</th>
	<th width='60'>NAHKODA</th>
	<th width='30'>JUMLAH PENUMPANG</th>
	<th width='60'>SURAT IZIN</th>
	<th width='20'>STATUS</th>

</tr>
<?php
// Load file koneksi.php
include "../../config/koneksi.php";


$sql = mysqli_query($koneksi,"SELECT tiket.id_nahkoda,tiket.id_kapal,tiket.id_tujuan,nahkoda.nama_nah,tujuan.nama_tujuan,kapal.nama_kapal,berangkat. * FROM tiket,nahkoda,tujuan,kapal,berangkat WHERE tujuan.kode_tujuan=tiket.id_tujuan and kapal.kode_kapal=tiket.id_kapal and nahkoda.kode_nah=tiket.id_nahkoda and tiket.kode_tiket=berangkat.id_tiket and month(tanggal)='$bln' and year(tanggal)='$thn'"); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

 

		$no=0;$tot=0;
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    	$no++;

    	
			 if($data['status']=="P"){
			 	$stt="Pergi";
			 }else{
			 	$stt="Balik";
			 }

        echo "<tr>";
        echo "<td  width='5'>".$no."</td>";
        echo "<td  width='40'>".$data['id_tiket']."</td>";
        echo "<td width='40'>".date('d F Y',strtotime($data['tanggal']))."</td>";
         echo "<td width='20'>".date('H:i',strtotime($data['tanggal']))."</td>";
        echo "<td  width='60'>".$data['id_kapal'].'/'.$data['nama_tujuan']."</td>";
         echo "<td  width='60'>".$data['id_kapal'].'/'.$data['nama_kapal']."</td>";
        echo "<td  width='60'>".$data['id_nahkoda'].'/'.$data['nama_nah']."</td>";
        echo "<td  width='30'>".$data['jml_penumpang']."</td>";
        echo "<td  width='60'>".$data['no_surat_izin']."</td>";
        echo "<td  width='20'>".$stt."</td>";
        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
}

?>
</table>
<br>
<p style="text-align: right; margin-top: 10px; margin-right: 9px;"> Padang, <?php echo date('d'); ?> <?php echo $nmbulan[(int) date('m') - 1]; ?> <?php echo date('Y'); ?> </p>
<br>
<br>
<br>
<p style="text-align: right; margin-top: 5px; margin-right: 9px;"><b>Pimpinan</b></p>
</body>
</html>
<?php
$html =ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('laporan_keberangkatan.pdf', 'D');
?>

