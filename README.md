#  PHP on GAE

Want to test this on GAE

```
<?php
$dir = 'sqlite:./data/data.sqlite';
$dbh = new PDO($dir) or die("cannot open the database");
$query = "select * from tbl1";
foreach ($dbh->query($query) as $row) {
    echo $row[0];
}
$dbh = null;
?>
```

So install sqlite3 and create a database.

    sudo apt install sqlite3 php-sqlite3

Create a database like this

    sqlite3 ex1
    SQLite version 3.8.5 2014-05-29 12:36:14
    Enter ".help" for usage hints.
    sqlite> create table tbl1(one varchar(10), two smallint);
    sqlite> insert into tbl1 values('hello!',10);
    sqlite> insert into tbl1 values('goodbye', 20);
    sqlite> select * from tbl1;
    hello!|10
    goodbye|20
    sqlite>.exit

Then run the built in server to confirm it works.

    php -S localhost:8080

The plan is to get this to work on GAE so run with this:

    dev_appserver.py --php_executable_path=/usr/bin/php app.yaml

But get this error

    ERROR 2018-11-12 06:05:27,828 module.py:1652] The PHP runtime requires the "bccomp" function, which is not defined.

So I installed like this

    sudo apt-get install php-bcmath

And got this error message

    NOTICE: Not enabling PHP 7.2 FPM by default.
    NOTICE: To enable PHP 7.2 FPM in Apache2 do:
    NOTICE: a2enmod proxy_fcgi setenvif
    NOTICE: a2enconf php7.2-fpm
    NOTICE: You are seeing this message because you have apache2 package installed.

Ran again like this

    dev_appserver.py --php_executable_path=/usr/bin/php app.yaml

And got these kind of errors

    PHP Warning:  PHP Startup: Unable to load dynamic library 'bz2.so'
    PHP Warning:  PHP Startup: Unable to load dynamic library 'mcrypt.so'

The php.ini is served from the application and currently looke like this, so might be the source of the errors.

    date.timezone = America/New_York
    extension=bcmath.so
    extension=bz2.so
    extension=curl.so
    extension=gd.so
    extension=gettext.so
    extension=mcrypt.so
    extension=mysqli.so
    extension=mysql.so
    extension=openssl.so
    extension=pdo_mysql.so
    extension=soap.so
    extension=zip.so

...so I cut it down to this

    output_buffering = "On"
    display_errors = On
    date.timezone = America/New_York
    extension=bcmath.so
    extension=curl.so
    extension=gd.so
    extension=gettext.so
    extension=zip.so

Now I get these warnings 

    PHP Warning:  Module 'bcmath' already loaded in Unknown on line 0
    PHP Warning:  Module 'curl' already loaded in Unknown on line 0

So I think the php.ini is irrelevant but I reduced it to

    output_buffering = "Off"
    display_errors = On
    date.timezone = America/New_York

Works on GAE but not locally.

# Try Azure

https://docs.microsoft.com/en-gb/azure/app-service/web-sites-php-configure#how-to-enable-extensions-in-the-default-php-runtime

https://crap.scm.azurewebsites.net/


PHP_INI_SCAN_DIR and value d:\home\site\ini

D:\home\site\ini>type extensions.ini
; Enable Extensions
extension=D:\home\site\ext\php_sqlite3.dll
extension=D:\home\site\ext\php_pdo_sqlite.dll
D:\home\site\ini>cd ..

D:\home\site>cd ext

D:\home\site\ext>ls
php_pdo_sqlite.dll
php_sqlite3.dll