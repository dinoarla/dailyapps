<?php
$tp = $data['threepointsd'][0];
?>

<ol class="breadcrumb">
  <li><a href="<?= BASE_PATH ?>">Beranda</a></li>
  <li><a href="<?= BASE_PATH."/threepoints" ?>">Threepoints</a></li>
  <li class="active"><?= $tp['judul'] ?></li>
</ol>

<div class="row">
	<div class="col-md-12">
		
		<div class="row">
			<div class="col-md-12">
				<h3 class="nama-produk"> <?= $tp['judul'] ?></h3>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
	        	<span class='label label-primary'>Threepoints</span>
	        	<span class='label label-warning'><i class='far fa-clock'></i> Produksi <?= tgl_indonesia($tp['produksi']) ?></span>
	            <span class='label label-success'><i class='far fa-eye'></i> <?= $tp['hits'] ?></span>
	       	</div>
	    </div>

	    <br>

	    <div class="row">
			<div class="col-md-4">
				<div class="box-produk">
	        		<img alt='TP-01' class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $tp['gambar_threepoints'] ?>">
	        	</div>
	       	</div>
	       	<div class="col-md-4">
	       		<div class="box-produk">
	        		<img alt='TP-02' class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $tp['gambar_threepointsd'] ?>">
	        	</div>
	       	</div>
	       	<div class="col-md-4">
	       		<div class="box-produk">
	        		<img alt='TP-03' class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $tp['gambar_threepointst'] ?>">
	        	</div>
	       	</div>
	       	<div class="col-md-4">
	       		<div class="box-produk">
	        		<img alt='TP-04' class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $tp['gambar_threepointse'] ?>">
	        	</div>
	       	</div>
	       	<div class="col-md-4">
	       		<div class="box-produk">
	        		<img alt='TP-05' class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $tp['gambar_threepointsl'] ?>">
	        	</div>
	       	</div>
	       	<div class="col-md-4">
	       		<div class="box-produk">
	        		<img alt='TP-06' class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $tp['gambar_threepointsen'] ?>">
	        	</div>
	       	</div>
	    </div>

	    

	</div>
</div>