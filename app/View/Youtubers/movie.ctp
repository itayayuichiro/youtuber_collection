<!DOCTYPE html>
<html lang="en">

  <head>
  <?php include('./head_parts.php'); ?>
  </head>

  <body>
	  <?php include('./header.php'); ?>

    <!-- Page Content -->
    <div class="container">
	<?php
		include('./db_connect.php');
		include('./counter.php');
	    $query = "select avg(kikaku_point) as kikaku_point,avg(movie_point) as movie_point from evaluations where channel_id = ".$_GET['id'];
	    $result = mysql_query($query);
	    $result_array = mysql_fetch_assoc($result);
	    $kikaku_point = $result_array['kikaku_point'];
	    $movie_point = $result_array['movie_point'];
		$query = "select * from youtubers where id = ".$_GET['id'];
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$query = "select * from popular_movie where youtuber_id = ".$_GET['id'];
		$result = mysql_query($query);
	 ?>

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">
     	
  	  <br><span class="sub_title"><?php echo $row['sub_name'] ?></span>
	  </h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid main_img" src="<?php echo $row['profile_img'] ?>" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">総合評価</h3>
          <p><span class="score">
          <?php 
          echo round(($kikaku_point+$movie_point)/2, 1);
          ?>
          </span>点</p>
          <h3 class="my-3">企画力</h3>
          <p><span class="star_1">
          <?php
            for ($i=0; $i < floor($kikaku_point/10); $i++) { 
              echo "★";
            }
            for ($i=0; $i < 10-floor($kikaku_point/10); $i++) { 
              echo "☆";
            }
          ?>
          </span></p>
          <h3 class="my-3">映像編集力</h3>
          <p><span class="star_2">
          <?php
            for ($i=0; $i < floor($movie_point/10); $i++) { 
              echo "★";
            }
            for ($i=0; $i < 10-floor($movie_point/10); $i++) { 
              echo "☆";
            }
          ?>
          </span></p>

          <h3 class="my-3">概要</h3>
          <p><?php echo $row['channel_about'] ?><br>(公式サイトより引用)</p>
          <h3 class="my-3">ソーシャル</h3>
          <ul>
          	<?php if (!empty($row['twitter'])) { ?>
            <li><a href="<?php echo $row['twitter'] ?>">twitter</a></li>
          	<?php } ?>
          	<?php if (!empty($row['instagram'])) { ?>
            <li><a href="<?php echo $row['instagram'] ?>">instagram</a></li>
          	<?php } ?>
          	<?php if (!empty($row['google_plus'])) { ?>
            <li><a href="<?php echo $row['google_plus'] ?>">google+</a></li>
          	<?php } ?>
          </ul>
        </div>

      </div>
      <!-- /.row -->
      <!-- Related Projects Row -->
      <h3 class="my-4">人気動画</h3>
      <div class="row">
      <?php while ($row = mysql_fetch_assoc($result)) { ?>
         <iframe class="if_rame" src="https://www.youtube.com/embed/<?php echo split('v=',$row['movie_url'])[1] ?>" frameborder="0" allowfullscreen></iframe>
      <?php } ?>
      </div>
      <a href="./movies.php?youtuber_id=<?php echo $_GET['id'] ?>" title="">動画の一覧を見る</a>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    <br><br>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- web広告 -->
	<ins class="adsbygoogle"
	     style="display:block"
	     data-ad-client="ca-pub-1646080327489742"
	     data-ad-slot="7735261008"
	     data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
