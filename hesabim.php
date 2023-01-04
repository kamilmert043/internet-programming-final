<?php include 'header.php';
if (!$_SESSION['userkullanici_mail']) {
	header("Location: index.php?durum=yetkisizGiris");
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p >Bilgilerinizi aşağıdan düzenleyebilirsiniz...</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kayıt Bilgileri</div>
				</div>



				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">
					</div>
					
				</div>

				
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="kullanici_il" placeholder="Yaşadığınız İl"   value="<?php echo $kullanicicek['kullanici_il'] ?>">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="kullanici_ilce" placeholder="Yaşadığınız İlçe"  value="<?php echo $kullanicicek['kullanici_ilce'] ?>">
					</div>
				</div>

				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">



				<button type="submit" name="kullanicibilgiguncelle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
				</form>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifre Değişikliği</div>
				</div>


				<center><a href="sifre-guncelle">Şifremi Değiştir<img width="400" src=""></a></center>
			</div>
		</div>
	</div>

<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>