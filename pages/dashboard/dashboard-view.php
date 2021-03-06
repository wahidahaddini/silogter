<?php
if(isset($_SESSION['id_pegawai'])){
	$id_pegawai = $_SESSION['id_pegawai'];
	if($id_pegawai!=0){
		$query_nm_pegawai = $connect->query("SELECT nama as nm_pegawai FROM pegawai WHERE id_pegawai='$id_pegawai'"); 
		foreach ($query_nm_pegawai as $data) {
			$nm_pegawai = $data['nm_pegawai'];
		}
	}
}
function hitungRow($id,$table){
	include "config/koneksi.php";
	$query = $connect->prepare("SELECT $id FROM $table");
	$query->execute();
	$jml = $query->rowCount();
	return $jml;
}
?>
<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="footer-wrap pd-20 bg-white border-radius-4 box-shadow mb-30">
				Selamat Datang <?php echo $nm_pegawai; ?>
			</div>
			<div class="row clearfix progress-box">
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-building"></i>
								</div>
							</div>
							<div class="project-info-right">
								<p class="weight-400 font-18 text-muted">Supplier</p>
								<span class="no text-blue weight-500 font-24"><?php echo hitungRow("id_supplier","supplier"); ?></span>
							</div>
						</div>
						<div class="project-info-progress text-center">
							<a class="btn btn-outline-primary " href="?pages=supplier">Click To Detail</a>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-hospital-o"></i>
								</div>
							</div>
							<div class="project-info-right">
								<p class="weight-400 font-18 text-muted">Instansi Penerima</p>
								<span class="no text-blue weight-500 font-24"><?php echo hitungRow("id_instansi_penerima","instansi_penerima"); ?></span>
							</div>
						</div>
						<div class="project-info-progress text-center">
							<a class="btn btn-outline-primary " href="?pages=instansi_penerima">Click To Detail</a>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-tasks"></i>
								</div>
							</div>
							<div class="project-info-right">
								<p class="weight-400 font-18 text-muted">Kat. Logistik</p>
								<span class="no text-blue weight-500 font-24"><?php echo hitungRow("id_kat_logistik","kat_logistik"); ?></span>
							</div>
						</div>
						<div class="project-info-progress text-center">
							<a class="btn btn-outline-primary " href="?pages=kategori_logistik">Click To Detail</a>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-thermometer-1"></i>
								</div>
							</div>
							<div class="project-info-right">
								<p class="weight-400 font-18 text-muted">Logistik</p>
								<span class="no text-blue weight-500 font-24"><?php echo hitungRow("id_logistik","logistik"); ?></span>
							</div>
						</div>
						<div class="project-info-progress text-center">
							<a class="btn btn-outline-primary " href="?pages=logistik">Click To Detail</a>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-archive"></i>
								</div>
							</div>
							<div class="project-info-right">
								<p class="weight-400 font-18 text-muted">Trx Logistik Masuk</p>
								<span class="no text-blue weight-500 font-24"><?php echo hitungRow("no_regist_masuk","trx_logistik_masuk"); ?></span>
							</div>
						</div>
						<div class="project-info-progress text-center">
							<a class="btn btn-outline-primary " href="?pages=logistik_masuk">Click To Detail</a>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-archive"></i>
								</div>
							</div>
							<div class="project-info-right">
								<p class="weight-400 font-18 text-muted">Trx Logistik Keluar</p>
								<span class="no text-blue weight-500 font-24"><?php echo hitungRow("no_regist_keluar","trx_logistik_keluar"); ?></span>
							</div>
						</div>
						<div class="project-info-progress text-center">
							<a class="btn btn-outline-primary " href="?pages=logistik_keluar">Click To Detail</a>
							
						</div>
					</div>
				</div>
			</div>
			
			<?php include('include/footer.php'); ?>
		</div>

</div>