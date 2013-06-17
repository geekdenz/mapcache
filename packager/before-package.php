<?php
e("Installing dependencies...");
$apt_deps = array(
    'apache2-threaded-dev',
    'libpng12-dev',
    'libcurl4-gnutls-dev',
    'libpcre3-dev',
    'libpixman-1-dev',
    'libfcgi-dev',
    'libgdal-dev',
    'libgeos-dev',
    'libsqlite3-dev',
    'libjpeg-dev',
    'libjpeg8-dev',
    'libjpeg-turbo8-dev',
    'libtiff4-dev',
    'gcc',
    'make',
    'cmake',
);
x("sudo apt-get install -y ". implode(' ', $apt_deps));
e("Compiling MapCache...");
x("mkdir build");
$pwd = trim(`pwd`);
$prefix = "'$pwd/build'";
x("cd $prefix && cmake --enable-debug ..");
$root = str_replace("'", '', $prefix .'/root');
x("cd $prefix && mkdir -p $root && make DESTDIR=$root ".
"&& make install DESTDIR=$root");
x("cp -Rp $root/* $pwd/packager/root");
