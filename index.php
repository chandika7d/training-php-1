<?php
include "./Sorting.php";

$data = <<<'EOD'

        X, -9\\\10\100\-5\\\0\\\\, A

        Y, \\13\\1\, B

        Z, \\\5\\\-3\\2\\\800, C

        EOD;

$mengurutkan = new Mengurutkan($data);
$mengurutkan->sort();
$mengurutkan->print(true);