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
<?php

$dir = './data/data.sqlite';
$dbh  = new PDO($dir) or die("cannot open the database");
$query =  "select * from tbl1";
foreach ($dbh->query($query) as $row)
{
    echo $row[0];
}
$dbh = null;
?>


 </body>
</html>