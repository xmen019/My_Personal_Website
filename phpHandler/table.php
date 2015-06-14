<?php
	$vote = $_REQUEST["vote"];
	$filename = "poll_result.txt";
	$content = file($filename);
	$array = explode("||", $content[0]);
	$yes = $array[0];
	$no = $array[1];
	$voted = true;
	
	if($vote == 0){
		$yes = $yes + 1;
	}
	if($vote == 1){
		$no = $no + 1;
	}
	$insertVote = $yes. "||" .$no;
	$fp = fopen($filename,"w");
	fputs($fp, $insertVote);
	fclose($fp);
?>

<table class="result">
	<tr>
		<td>Yes:</td>
		<td>
			<img src="Img/bar.jpg" alt="bar" width="<?php echo (200*round($yes/($yes+$no),2));?>" height="20"/>
			<?php echo(100*round($yes/($yes+$no),2)); ?>%
		</td>
	</tr>
	<tr>
		<td>No:</td>
		<td>
			<img src="Img/bar.jpg" alt="bar" width="<?php echo(200*round($no/($no+$yes),2)); ?>" height="20"/>
			<?php echo(100*round($no/($yes+$no),2)); ?>%
		</td>
	</tr>
</table>
