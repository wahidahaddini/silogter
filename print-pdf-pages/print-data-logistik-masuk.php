<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Cetak Bukti -'.$_GET['val'];
include '../config/koneksi.php';
include '../vendors/mpdf60/mpdf.php';
$no_regist_masuk = $_GET['val'];
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->

<h4 style="text-align: center;">
	INSTALASI PERBEKALAN FARMASI KABUPATEN LUMAJANG
	<br>
	JL. MAHAKAM NO. 103 TELP. 0334-882981 LUMAJANG
</h4>
<h5 style="text-align: center;">
	<u>Laporan Data Logistik Masuk</u><br>Per Tanggal <?php echo date("d-m-Y"); ?>
</h5>
<table border="1" style="border-collapse: collapse;width: 100%">
	<thead>
		<tr>
			<th>No</th>
			<th>No Regist</th>
			<th style="width: 20%;text-align: center;">Tgl Regist Masuk</th>
			<th>Nama Supplier</th>
			<th>Nama Pegawai</th>
			<th>Grand Total</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$no = 1;
		$query = $connect->query("SELECT * FROM trx_logistik_masuk");
		foreach($query as $data){
		?>
		<?php
			
			$query2 = $connect->query("SELECT * FROM trx_logistik_masuk JOIN supplier ON trx_logistik_masuk.id_supplier=supplier.id_supplier JOIN pegawai ON trx_logistik_masuk.id_pegawai=pegawai.id_pegawai WHERE no_regist_masuk='$data[no_regist_masuk]'");
			foreach ($query2 as $data2) {
		?>
		<tr>
			<td style="text-align: center;"><?php echo $no++."."; ?></td>
			<td style="text-align: center;"><?php echo $data2['no_regist_masuk']; ?></td>
			<td style="text-align: center;"><?php echo $data2['tgl_regist']; ?></td>
			<td style="text-align: center;"><?php echo $data2['nm_supplier']; ?></td>
			<td style="text-align: center;"><?php echo $data2['nama']; ?></td>
			<td style="text-align: right;"><?php echo "Rp. ".number_format($data2['grand_total'],2,',','.'); ?></td>
			<?php if ($data2['status']==1) {
			?>
			<td style="text-align: center;">Selesai</td>
			<?php } else if($data2['status']==2) { ?>
			<td style="text-align: center;">Cancel</td>
			<?php } else { ?>
			<td style="text-align: center;">Proses</td>
		<?php } ?>
		</tr>
		<?php
			}
		}
		?>
		
	</tbody>
</table>




<!--CONTOH Code END-->
 
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>