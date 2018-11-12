<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?>
 <?php echo '<p>' . getcwd() . '</p>'; ?>
 
 <?php
$dir = 'sqlite:./data/data.sqlite';
$dbh = new PDO($dir) or die("cannot open the database");
$query = "select * from tbl1";
foreach ($dbh->query($query) as $row) {
    echo $row[0];
}
$dbh = null;
?>

 </body>
</html>