<!-- Introduction Row -->
<h1 class="my-4">Youtuberコレクション<br>
<span class="sub_title">あなたにあったYoutuberがきっと見つかる</span>
</h1>
<p></p>
<!-- Team Members Row -->
<div class="row">
	<?php
		foreach ($youtubers_data as $row) {
			?>
		<div class="col-lg-4 col-sm-6 text-center mb-4">
			<a href="./detail.php?id=<?php echo $row['Youtuber']['id'] ?>">
		  <img class="rounded-circle img-fluid d-block mx-auto" src="<?php echo $row['Youtuber']['profile_img'] ?>" alt="">
		  <h3><?php echo $row['Youtuber']['channel_name'] ?>
		  </h3>
		  <p><?php echo $row['Youtuber']['sub_name'] ?></p>
			</a>
		</div>

		<?php 
		}
	 ?>
	  <p><a href="./search.php?all=yes">Youtuber一覧を見る</a></p>
</div>
<div class="row">
	<div class="col-lg-12">
	  <h2 class="my-4">事務所から探す</h2>
	</div>

	<?php
		foreach ($offices_data as $row) {
			?>
		<div class="col-lg-4 col-sm-6 text-center mb-4">
			<a href="./search.php?office=<?php echo $row['Office']['office_name'] ?>">
		  <img class="rounded-circle img-fluid d-block mx-auto" src="<?php echo $row['Office']['office_image_url'] ?>" alt="">
		  <h3><?php echo $row['Office']['office_name'] ?>
		  </h3>
		    </a>
		</div>
		<?php 
		}
	 ?>
</div>