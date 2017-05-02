<!DOCTYPE html>
<html lang="en">
<head>
                //Melakukan koneksi ke mysql 
		<?php
                //username merupakan username dari akses mysql pada server atau hosting Anda
                //password merupakan password dari akses mysql pada server atau hosting Anda
		$conn = @mysql_connect('localhost','username','password');
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
                //database merupakan nama dari database Anda
		mysql_select_db('database', $conn);
	        ?>
                //
  <meta charset="utf-8" />
  <title>Website Pengumuman Hasil UN Tahun 2017</title>
  <meta name="description" content="web, website, pengumuman, hasil, un, uncbt, tahun, 2017" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
 
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
   
</head>
<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
	<center><img src="logo.png" /></center>
	<a class="nav-brand" href="#"><b>SMK Wachid Hasyim 2 Surabaya</b></a>
    <a class="nav-brand" href="#">Website Pengumuman Hasil Ujian Nasional</a>
	<a class="nav-brand" href="#">Tahun Pelajaran 2016-2017</a>
    <div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
        <section class="panel">
          <header class="panel-heading text-center">
            Silahkan Lihat Hasil 
          </header>
          <form class="panel-body" method="post" action="#">
            <div class="form-group">
              <label class="control-label">Masukkan Nomor UN Anda</label>
              <input type="text" name="no" placeholder="05-01-128-212-2" class="form-control" required>
            </div>
            <div class="line line-dashed"></div>
            <button class="btn btn-twitter btn-block" name="button" value="ok" type="submit">Cek Hasil</button>
          </form>
        </section>
      </div>
	  <?php
		 if(isset($_POST['no'])){
		     $no = $_POST['no'];
		 }else{
		     $no = "";
		 }
		 if(isset($_POST['button'])){
		     $button = $_POST['button'];
		 }else{
		     $button = "";
		 }
		 if($button == "ok"){
                     //Melakukan pengecekan apakah nomer sudah sebanyak 15 digit 
		     if(strlen($no) == 15){
                                //tabel merupakan nama tabel yang berisi data nilai dari peserta didik
				$result = mysql_query("SELECT * FROM `tabel` WHERE `NO` = '$no'");
				$row = mysql_fetch_row($result);

				$NO = $row[0];
				$NAMA = $row[1];
				$BIN = $row[2];
				$BIG = $row[3];
				$MAT = $row[4];
				$KOMP = $row[5];
				$JUMLAH = $row[6];
				$AVR = $row[7];
				$KET = "Anda Dinyatakan LULUS";
				
		        echo '<div class="col-md-4 col-md-offset-4 m-t-lg"><section class="panel">
                    <header class="panel-heading">Nama : '.$NAMA.'</header>
                    <table class="table table-striped m-b-none text-sm">
                      <thead>
                        <tr>
                          <th>Keterangan</th>                    
                          <th width="70">Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>                    
                          <td>Bhs. Indonesia</td>
                          <td class="text-success">
                          ' .$BIN.'
                          </td>
                        </tr>
                        <tr>                    
                          <td>Bhs. Inggris</td>
                          <td class="text-success">
                          ' .$BIG.'
                          </td>
                        </tr>
                        <tr>                    
                          <td>Matematika</td>
                          <td class="text-success">
                          ' .$MAT.'
                          </td>
                        </tr>
                        <tr>                    
                          <td>Kejuruan</td>
                          <td class="text-success">
                          ' .$KOMP.'
                          </td>
                        </tr>
						<tr>                    
                          <td>Jumlah</td>
                          <td class="text-success">
                          ' .$JUMLAH.'
                          </td>
                        </tr>
						<tr>                    
                          <td>Rata-Rata</td>
                          <td class="text-success">
                          ' .$AVR.'
                          </td>
                        </tr>
                      </tbody>
                    </table>
					<footer class="panel-heading"><b>'.$KET.'</b></footer>
                  </section></div>';
		     }else{
		         echo '<div class="col-md-4 col-md-offset-4 m-t-lg">
         <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                <i class="fa fa-ban-circle"></i><strong>Maaf!</strong> <a href="#" class="alert-link">Format Nomer Salah</a> Silahkan Cek Ulang.
              </div>
       </div>';
		     }
		 }
	  ?>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Tim IT SMK Wachid Hasyim 2 Surabaya<br>&copy; 2017</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
	<script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- app -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>
</body>
</html>
