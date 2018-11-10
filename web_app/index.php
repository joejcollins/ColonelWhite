<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?> 
 <?php echo '<p>'.getcwd().'</p>'; ?> 
 <?php
$myfile = fopen("./data/data.txt", "r") or die("Unable to open file!");


echo fread($myfile,filesize("./data/data.txt"));
fclose($myfile);
?>
 </body>
</html>