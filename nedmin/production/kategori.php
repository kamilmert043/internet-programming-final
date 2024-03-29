<?php 
include 'header.php';


$kategorisor=$db->prepare("SELECT * FROM kategori");
$kategorisor->execute();
?>
<head>  </head>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kategori Listeleme<small>
                        <?php 

                        if (isset($_GET['durum'])=="ok") {?>

                        <b style="color:green;">İşlem Başarılı...</b>

                        <?php } elseif (isset($_GET['durum'])=="no") {?>

                        <b style="color:red;">İşlem Başarısız...</b>

                        <?php }

                        ?>
                    </small></h2>
                    <div class="clearfix"></div>
                    <div align="right"><a href="kategori-ekle.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a></div>
                  </div>
                  <div class="x_content">
                    <!-- Div içerik başlangıç -->


                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <th>Sıra No</th>
                          <th>Kategori Adı</th>
                          <th>Kategori Sıra</th>
                          <th>Kategori Durum</th>
                          <th></th>
                          <th></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $say=0;
                        while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){ $say++?>
                        <tr>
                        <td><?php echo $say;?></td>
                          <td><?php echo $kategoricek['kategori_ad'];?></td>
                          <td><?php echo $kategoricek['kategori_sira'];?></td>
                          <td><?php
                          
                          if($kategoricek['kategori_durum']==1){?>
                          <center><button class="btn btn-success">Aktif</button></center>
                           
                          <?php }
                          else{?>
                          <center><button class="btn btn-danger">Pasif</button></center>
                          <?php } ?>
                          
                          </td>
                          <td><center><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id'];?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../netting/islem.php?kategori_id=<?php echo $kategoricek['kategori_id'];?>&kategorisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>

                    <!-- Div İçerik Bitiş -->
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
        <!-- /page content -->

        <?php 
include 'footer.php';
?>