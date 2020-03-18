<?php

if (strtolower(substr(PHP_OS, 0, 3)) == 'win') {
    $R  = '';
    $RR = '';
    $G  = '';
    $GG = '';
    $B  = '';
    $BB = '';
    $Y  = '';
    $YY = '';
    $X  = '';
} else {
    $R  = "\e[91m";
    $RR = "\e[91;7m";
    $G  = "\e[92m";
    $GG = "\e[92;7m";
    $B  = "\e[36m";
    $BB = "\e[36;7m";
    $Y  = "\e[93m";
    $YY = "\e[93;7m";
    $X  = "\e[0m";
}

echo $Y
    . '
   ______           _     __     _______ 
  / ____/___ _   __(_)___/ /    <  / __ \
 / /   / __ \ | / / / __  /_____/ / /_/ /
/ /___/ /_/ / |/ / / /_/ /_____/ /\__, / 
\____/\____/|___/_/\__,_/     /_//____/  
                                         
';
echo $R . "\n" . '+++++++++++++++++++++++++++++++++++++++';
echo $B . "\n" . 'Author  : Syn-arch                    ' . $R . '+';
echo $B . "\n" . 'Github  : https://github.com/syn-arch ' . $R . '+';
echo $B . "\n" . 'Date    : 18-03-2020                  ' . $R . '+';
echo $R . "\n" . '+++++++++++++++++++++++++++++++++++++++'. $G . $X . "\n";

function http_request($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$output = curl_exec($ch);
	curl_close($ch);

	return $output;
}

echo "\n";
echo "Pilih Informasi yang ingin dilihat =>" . "\n";
echo "1. Lihat informasi Covid-19 seluruh dunia" . "\n";
echo "2. Lihat informasi Covid-19 semua negara" . "\n";
echo "3. Lihat informasi Covid-19 berdasarkan negara" . "\n";

echo "\n";
echo "Pilih : "; $choice = trim(fgets(STDIN));

if ($choice == 1) {
	$result = json_decode(http_request("https://corona.lmao.ninja/all"), TRUE);
	echo $R . "\n" . '+++++++++++++++++++++++++++++++++++++++';
	echo "\n";
	echo "Tanggal\t\t: " . date("d-m-Y") . "\n";
	echo "Total Kasus\t: " . $result['cases'] . "\n";
	echo "Total Kematian\t: " . $result['deaths'] . "\n";
	echo "Total Sembuh\t: " . $result['recovered'] . "\n";
	echo $R . '+++++++++++++++++++++++++++++++++++++++'. "\n";
}

if ($choice == 2) {
	$result = json_decode(http_request("https://corona.lmao.ninja/countries"), TRUE);

	foreach ($result as $region) {
		echo $R . "\n" . '+++++++++++++++++++++++++++++++++++++++';
		echo "\n";
		echo "Tanggal\t\t: " . date("d-m-Y") . "\n";
		echo "Negara\t\t: " . $region['country'] . "\n";
		echo "Total Kasus\t: " . $region['cases'] . "\n";
		echo "Total Kematian\t: " . $region['deaths'] . "\n";
		echo "Total Sembuh\t: " . $region['recovered'] . "\n";
		echo $R . '+++++++++++++++++++++++++++++++++++++++'. "\n";
	}
}

if ($choice == 3) {
	echo "Masukan negara : "; $region = trim(fgets(STDIN));
	$result = json_decode(http_request("https://corona.lmao.ninja/countries/" . $region), TRUE);
	echo $R . "\n" . '+++++++++++++++++++++++++++++++++++++++';
	echo "\n";
	echo "Tanggal\t\t: " . date("d-m-Y") . "\n";
	echo "Negara\t\t: " . $result['country'] . "\n";
	echo "Total Kasus\t: " . $result['cases'] . "\n";
	echo "Total Kematian\t: " . $result['deaths'] . "\n";
	echo "Total Sembuh\t: " . $result['recovered'] . "\n";
	echo $R . '+++++++++++++++++++++++++++++++++++++++'. "\n";
}