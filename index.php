<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="styles/css/main_styles.css" type="text/css">
	<script type='text/javascript' src='jquery.min.js'></script>

	<style>
		img{
			width: 300px;
			height: 300px;
			padding:0;
			margin: 0;
			opacity: 0.7;
			float:left;
		}

        img:hover{
            opacity: 1;
        }

        #gallery{
            width: 900px;
            margin: 0 auto;
        }
	</style>

	<?php
		// Supply a user id and an access token
		$userid = "User-ID-Goes-Here";
		$accessToken = "1699286015.ab103e5.0d0e15129ddf4bf8a7a14b1c062da20a";
		$tagName = "pug";

		// Gets our data
		function fetchData($url){
		     $ch = curl_init();
		     curl_setopt($ch, CURLOPT_URL, $url);
		     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		     curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		     $result = curl_exec($ch);
		     curl_close($ch);
		     return $result;
		}

		// Pulls and parses data.
		$result = fetchData("https://api.instagram.com/v1/tags/{$tagName}/media/recent?access_token=$accessToken&count=100");
		$result = json_decode($result);
	?>

	<div id="gallery">
        <div class="section" id="block1">
        <?php

            $pos = 0;
            $

        ?>
		<?php foreach ($result->data as $post): ?>

			<img src="<?= $post->images->standard_resolution->url ?>">

            <?php
                $pos ++;

                if($pos % 3 == 0){ ?>

                    </div>
                    <div class="section" id="block<?php echo $pos; ?>">
                <?php
                }
            ?>



		<?php endforeach ?>
	</div>
</html>