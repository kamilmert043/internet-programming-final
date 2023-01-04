﻿
<?php 

include 'header.php';



$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
	'id' => 0
));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>

	<?php include 'slider.php' ?>


</div>
<div class="f-widget featpro">
	<div class="container">
		<div class="title-widget-bg">
			<div class="title-widget">Öne Çıkan Ürünler</div>
			<div class="carousel-nav">
				<a class="prev"></a>
				<a class="next"></a>
			</div>
		</div>
		<div id="product-carousel" class="owl-carousel owl-theme">

			<?php 
			$urunsor=$db->prepare("SELECT * FROM urun where urun_durum=:urun_durum and urun_onecikar=:urun_onecikar");
			$urunsor->execute(array(
				'urun_durum' => 1,
				'urun_onecikar' => 1
				));

			
			while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {


					$urun_id=$uruncek['urun_id'];
					$urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira ASC limit 1 ");
					$urunfotosor->execute(array(
						'urun_id' => $urun_id
						));

					$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

					
				?>



				<div class="item">
					<div class="productwrap">
						<div class="pr-img">
							<div class="hot"></div>
							<a href="urun-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>"><img  src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
							<div class="pricetag blue"><div class="inner"><span><?php echo $uruncek['urun_fiyat'] ?> TL</span></div></div>
						</div>
						<span class="smalltitle"><a href="urun-<?=seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"]?>"><?php echo $uruncek['urun_ad'] ?></a></span>
						<span class="smalldesc">Ürün Kodu.: <?php echo $uruncek['urun_id'] ?></span>
					</div>
				</div>

				<?php } ?>

			</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $hakkimizdacek['hakkimizda_baslik'];  ?></div>
			</div>
			<p class="ct">
				<?php 
				
				echo substr($hakkimizdacek['hakkimizda_icerik'],0,1000)."..."; ?>
			</p>
			<a href="hakkimizda.php" class="btn btn-default btn-red btn-sm">Devamını Oku</a>
			
			<div class="spacer"></div>
		</div><!--Main content-->
		<?php include 'sidebar.php'; ?>
	</div>
</div>

<?php 

include 'footer.php';
?>
