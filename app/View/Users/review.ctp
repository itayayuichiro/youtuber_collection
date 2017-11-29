<!-- Introduction Row -->
<h1 class="my-4">Youtuberコレクション<br>
<span class="sub_title">あなたにあったYoutuberがきっと見つかる</span>
</h1>
<p></p>
<!-- Team Members Row -->

<?php
	//$result = mysql_query($query);
	// $query = "select * from youtubers where id=".$_GET['id'];
	// $result = mysql_fetch_assoc(mysql_query($query));
	$img = $result['Youtuber']['profile_img'];
	$id = $result['Youtuber']['id'];
 ?>
<form action="./review" method="post" accept-charset="utf-8">
  <div class="row">
    <div class="col-sm-2">評価するYoutuber</div>
	<div>
		<input type="hidden" name="channel_id" value="<?php echo $id; ?>"></input>	
		<img src="<?php echo $img ?>" alt="" width="100px" height="100px">
	</div>
  </div>
	
  <div class="row">
    <div class="col-sm-2">見る頻度</div>
    <div class="col-sm-10 form-inline" style="padding: 3px;">
      <select class="form-control input-sm" id="hindo" name="hindo">
        <option>毎回見る</option>
        <option>よく見る</option>
        <option>たまに見る</option>
        <option>あまり見ない</option>
        <option>全く見ない</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">企画力</div>
    <div class="col-sm-10 form-inline" style="padding: 3px;">
      <select class="form-control input-sm star_1" id="kikaku_num" name="kikaku_num">
        <option value="10">★☆☆☆☆☆☆☆☆☆</option>
        <option value="20">★★☆☆☆☆☆☆☆☆</option>
        <option value="30">★★★☆☆☆☆☆☆☆</option>
        <option value="40">★★★★☆☆☆☆☆☆</option>
        <option value="50" selected="selected">★★★★★☆☆☆☆☆</option>
        <option value="60">★★★★★★☆☆☆☆</option>
        <option value="70">★★★★★★★☆☆☆</option>
        <option value="80">★★★★★★★★☆☆</option>
        <option value="90">★★★★★★★★★☆</option>
        <option value="100">★★★★★★★★★★</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">映像編集力</div>
    <div class="col-sm-10 form-inline" style="padding: 3px;">
      <select class="form-control input-sm star_2" id="movie_num" name="movie_num">
        <option value="10">★☆☆☆☆☆☆☆☆☆</option>
        <option value="20">★★☆☆☆☆☆☆☆☆</option>
        <option value="30">★★★☆☆☆☆☆☆☆</option>
        <option value="40">★★★★☆☆☆☆☆☆</option>
        <option value="50" selected="selected">★★★★★☆☆☆☆☆</option>
        <option value="60">★★★★★★☆☆☆☆</option>
        <option value="70">★★★★★★★☆☆☆</option>
        <option value="80">★★★★★★★★☆☆</option>
        <option value="90">★★★★★★★★★☆</option>
        <option value="100">★★★★★★★★★★</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">コメント</div>
    <div class="col-sm-10" style="padding: 3px;">
      <textarea class="form-control  input-sm" rows="3" id="comment" name="comment" placeholder="コメント"></textarea>
    </div>
  </div>
   
  <div class="text-center" style="padding: 30px;">
    <input type="submit" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span></button>
  </div>
</form>
