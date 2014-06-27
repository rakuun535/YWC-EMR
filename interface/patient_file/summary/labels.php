<?php
require('PDF_Label.php');

$pid = $_GET["pid"];
$DOB = $_GET["DOB"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$sex = $_GET["sex"];
$phone_home = $_GET["phone_home"];
$ss = $_GET["ss"];
//$street = $_GET["street"];
//$city = $_GET["city"];
//$state = $_GET["state"];
//$postal_code = $_GET["postal_code"];
$fs_provider = $_GET["fs_provider"];
$fs_allergies = $_GET["fs_allergies"];
$fs_meds = $_GET["fs_meds"];
$policy_number = $_GET["policy_number"];
$doi = $_GET["effdate"];
$employer_name = $_GET["employer_name"];
$employer_phone = $_GET["employer_phone"];
$employer_fax = $_GET["employer_fax"];
$doi_fixed = date("m-d-Y", strtotime($doi));
$DOB_fixed = date("m-d-Y", strtotime($DOB));

/*------------------------------------------------
To create the object, 2 possibilities:
either pass a custom format via an array
or use a built-in AVERY name
------------------------------------------------*/

// Example of custom format
// $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99, 'height'=>38, 'font-size'=>14));

// Standard format
$pdf = new PDF_Label('LHR5160');

$pdf->AddPage();

// Print labels
for($i=1;$i<=30;$i++) {
	$text = sprintf("%s\n%s\n%s\n", "$policy_number DOI $doi_fixed", "$employer_name $employer_fax", "$lname, $fname DOB $DOB_fixed");
	$pdf->Add_Label($text);
}

// Print labels
/* for($i=1;$i<=20;$i++) {
	$text = sprintf("%s\n%s\n%s\n%s %s, %s", "Laurent $i", 'Immeuble Toto', 'av. Fragonard', '06000', 'NICE', 'FRANCE');
	$pdf->Add_Label($text);
} */

$pdf->Output();
?>
