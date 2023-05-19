# Neuron PHP Training 1

# Tugas
Mengubah data dari : 
```
X, -9\\\10\100\-5\\\0\\\\, A
Y, \\13\\1\, B
Z, \\\5\\\-3\\2\\\800, C
```

Menjadi :
```
X, -9, A, 1
X, -5, A, 2
Z, -3, C, 1
X, 0, A, 3
Y, 1, B, 1
Z, 2, C, 2
Z, 5, C, 3
X, 10, A, 4
Y, 13, B, 2
X, 100, A, 5
Z, 800, C, 4
```

## Code
```php
include "./Sorting.php";

$data = <<<'EOD'

        X, -9\\\10\100\-5\\\0\\\\, A

        Y, \\13\\1\, B

        Z, \\\5\\\-3\\2\\\800, C

        EOD;

$mengurutkan = new Mengurutkan($data);
$mengurutkan->sort();
$mengurutkan->print(true); // true untuk menampilkan tabel, false untuk menampilkan text
```

## Hasil
### Tabel
![image](https://github.com/chandika7d/training-php-1/assets/20274245/4cddb661-55fb-4515-b071-e54ba191d847)

### Text
![image](https://github.com/chandika7d/training-php-1/assets/20274245/8cfd2bfc-31b3-45dd-a47a-f483efe1bb30)
