<?php

function _sort($a, $b)
{
    return $a->data == $b->data ? 0 : (($a->data > $b->data) ? 1 : -1);
}

function _filter_null($var)
{
    return $var !== null && $var !== "";
}

class Item
{
    public $awal;
    public $akhir;
    public $posisi;
    public $data;
}
class Mengurutkan
{
    protected $raw;
    protected $formatted = [];

    function __construct($raw)
    {
        $this->raw = $raw;
    }

    function filter_null($a)
    {
        $a = array_filter($a, "_filter_null");
        return array_values($a);
    }

    function sort()
    {
        $lines = explode("\n", $this->raw);
        $lines = $this->filter_null($lines);

        foreach ($lines as $line) {
            $fl = explode(",", str_replace(" ", "", $line));
            $fl = $this->filter_null(explode("\\", $fl[1]));
            sort($fl);

            $awal = substr($line, 0, 1);
            $akhir = substr($line, -1);

            foreach ($fl as $key2 => $b) {
                $c = new Item();
                $c->awal = $awal;
                $c->akhir = $akhir;
                $c->posisi = $key2 + 1;
                $c->data = (int) $b;
                $this->formatted[] = $c;
            }
        }

        usort($this->formatted, '_sort');

        return $this->formatted;
    }

    function print($as_table = false)
    {
        if (count($this->formatted) > 0) {
            if ($as_table) {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Awalan</th>";
                echo "<th>Data</th>";
                echo "<th>Akhiran</th>";
                echo "<th>Posisi</th>";
                echo "</tr>";

                foreach ($this->formatted as $key => $value) {
                    echo "<tr>";
                    echo "<td>$value->awal</td>";
                    echo "<td>$value->data</td>";
                    echo "<td>$value->akhir</td>";
                    echo "<td>$value->posisi</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else
                foreach ($this->formatted as $value) {
                    echo " $value->awal,";
                    echo " $value->data,";
                    echo " $value->akhir,";
                    echo " $value->posisi";
                    echo "<br>";
                }
        }
    }
}