<?php

class C
{
    public $awal;
    public $akhir;
    public $posisi;
    public $data;
}
function _sort($a, $b)
{
    return $a->data == $b->data ? 0 : (($a->data > $b->data) ? 1 : -1);
}

function _filter_null($var)
{
    return $var !== null && $var !== "";
}

function filter_null($a)
{
    $a = array_filter($a, "_filter_null");
    return array_values($a);
}

function sortingData($data)
{

    $lines = explode("\n", $data);
    $lines = filter_null($lines);

    $o_c = [];

    foreach ($lines as $line) {
        $fl = explode(",", str_replace(" ", "", $line));
        $fl = filter_null(explode("\\", $fl[1]));
        sort($fl);

        $awal = substr($line, 0, 1);
        $akhir = substr($line, -1);

        foreach ($fl as $key2 => $b) {
            $c = new C();
            $c->awal = $awal;
            $c->akhir = $akhir;
            $c->posisi = $key2 + 1;
            $c->data = (int) $b;
            $o_c[] = $c;
        }
    }

    usort($o_c, '_sort');

    return $o_c;
}


$data = <<<'EOD'

X, -9\\\10\100\-5\\\0\\\\, A

Y, \\13\\1\, B

Z, \\\5\\\-3\\2\\\800, C

EOD;

$data = sortingData($data);

foreach ($data as $key => $value) {
    echo " $value->awal,";
    echo " $value->data,";
    echo " $value->akhir,";
    echo " $value->posisi";
    echo "<br>";
}