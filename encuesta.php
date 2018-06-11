<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$itil = $array[0];
$cmmi = $array[1];

if ($vote == 0) {
  $itil = $itil + 1;
}
if ($vote == 1) {
  $cmmi = $cmmi + 1;
}

//insert votes to txt file
$insertvote = $itil."||".$cmmi;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

 <h4>Resultados:</h4>   
<table>
<tr>
<td>ITIL:</td>
<td>
<img src="barra.gif"
width='<?php echo(100*round($itil/($itil+$cmmi),2)); ?>'
height='20'>
<?php echo(100*round($itil/($cmmi+$itil),2)); ?>%
</td>
</tr>

<tr>
<td>CMMI:</td>
<td>
<img src="barra.gif"
width='<?php echo(100*round($cmmi/($cmmi+$itil),2)); ?>'
height='20'>
<?php echo(100*round($cmmi/($cmmi+$itil),2)); ?>%
</td>
</tr>   
</table>