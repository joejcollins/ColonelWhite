<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <h1>Echo</h1>
 <?php echo '<p>Hello World</p>'; ?>

<h1>Working Directory</h1>
<?php echo '<p>' . getcwd() . '</p>'; ?>

<h1>SQLite</h1>
<?php
$dir = 'sqlite:./data/data.sqlite';
$dbh = new PDO($dir) or die("cannot open the database");
$query = "select * from tbl1";
foreach ($dbh->query($query) as $row) {
    echo $row[0]."<br/>";
}
$dbh = null;
?>

 </body>
</html>