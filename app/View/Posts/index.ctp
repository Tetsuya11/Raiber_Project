<?php
foreach ($posts as $post){
	echo "<a href=\"".
		//$post["Post"]["url"]."\">".
		$post["Post"]["title"]."</a><br>".
		$post["Post"]["message"].
		$post["Post"]["created"]."<br><br>";
}