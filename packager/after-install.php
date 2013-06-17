<?php
//echo "after-install PHP...\n";
echo "Creating symlink to gdal lib...\n";
`ln -s /usr/lib/libgdal1.7.0.so.1 /usr/lib/libgdal.so.1`
