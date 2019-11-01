<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $musicnum = 5678 ?>
		<p>
			I love music.
			I have <?= $musicnum ?> total songs,
			which is over <?= $musicnum / 10 ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

			<?php
				$line = $_GET["line"];
				$links = array('"https://www.billboard.com/archive/article/201910">2019-11',
				'"https://www.billboard.com/archive/article/201910">2019-10',
				'"https://www.billboard.com/archive/article/201909">2019-09',
				'"https://www.billboard.com/archive/article/201908">2019-08',
				'"https://www.billboard.com/archive/article/201907">2019-07');
				if ($_GET["line"] == null) $line = 5; ?>
				<ol>
					<?php
					for ($i = 0; $i < $line; $i++) { ?>
						<li><a href=<?= $links[$i] ?></a></li>
						<?php
					}
					?>
				</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<?php
				$musics = file("Favorite.txt");
			?>
			<ol>
				<?php
					foreach ($musics as $music) { ?>
						<li><a href=http://en.wikipedia.org/wiki/<?= $music ?></a><?= $music ?></li>
				<?php
					}
				?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
  			<?php
				 	$musics = glob("lab5/musicPHP/songs/*.mp3");
					function sizeorder($music) {
						return (int)(filesize($music)/1024);
					}
					usort($musics, "sizeorder");
					foreach ($musics as $music) {
						$tokens = explode("/", $music);
						?>
						<li class = "mp3item">
							<a href=<?= $music ?> download><?= $tokens[3] ?></a><?php print " (" . (int)(filesize($music)/1024) . "KB)" ?>
						</li>
						<?php
  			 	} ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$musics2 = array_reverse(glob("lab5/musicPHP/songs/*.m3u"));
					foreach($musics2 as $music2) {
						$tokens2 = explode("/", $music2);
						?>
						<li class="playlistitem"><?= $tokens2[3] ?>:
				<ul>
					<?php
						shuffle($musics);
						foreach($musics as $music) {
						$tokens = explode("/", $music);
						?>
							<li><?= $tokens[3] ?></li> <?php
						} ?>
				</ul>
			</li>
				<?php
					}
				?>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
