<?php

// Fungsi untuk mengenkripsikan text
function Encipher($pswd, $text)
{
	// strtolower berfungsi untuk mengonversikan key ke huruf kecil
	$pswd = strtolower($pswd); 
	
	// menginisialisasi variabel
	$code = "";
	$ki = 0;
	$kl = strlen($pswd); //strlen berfungsi untuk menghitung jumlah karakter pada pswd
	$length = strlen($text);//strlen berfungsi untuk menghitung jumlah karakter pada text
	
	// Membuat perulangan menggunakan for
	for ($i = 0; $i < $length; $i++)
	{
		// jika $text merupakan abjad maka akan di encrypt
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}
			
			// lowercase
			else
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}
			
			// mengupdate index key nya
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// mengembalikan nilai $text
	return $text;
}

// fungsi untuk mendeskripsikan text
function Decipher($pswd, $text){
	// mengonversikan key ke huruf kecil
	$pswd = strtolower($pswd);
	
	// inisialisasi variabel
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	// membuat perulangan menggunakan for
	for ($i = 0; $i < $length; $i++)
	{
		// jika $text merupakan abjad maka akan di encrypt
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
			
			// lowercase
			else
			{
				$x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("a");
				
				$text[$i] = chr($x);
			}
			
			// mengupdate index key nya
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// mengembalikan nilai
	return $text;
}

?>