@extends('template.default')

@section('title', 'my view')
@section('content')
<h1>My View</h1>
<?php
    echo "My View Content";
    echo "<br>";
    echo "Line 2";
?>
<br>
<?php
$myval = "Hello PHP";
?>
<br>
<?php
$myval = 1;
echo $myval;

# การสร้าง array ใน PHP
$myarray = Array(1,2,3,4);
$myarray2 = [1,2,3,4];
$myarray3[] = 1;
$myarray3[] = 2;
$myarray3[] = 3;
$myarray3[] = 4;
echo $myarray[0];
echo "<br>";
print_r($myarray2);
echo "<br>";
var_dump($myarray3);
?>

<?php
$myarry4 = [
    "name" => "John",
    "age" => 30,
    "city" => "New York",
    0,
    1
];
print_r($myarry4);
foreach ($myarry4 as  $key => $value) {
    echo "<br>Key: " .$key . "Value: " .$value;
}

foreach ($myarry4 as $value) {
    echo "<br>Value: " .$value;
}
$myval = "A";
$myVal = "F";

for ($i = 0; $i < 10 ; $i++) {
    echo $myval++;
    echo "<br>";
}

function myFunction(){
    return "My Function Called";
}

echo MYFuncTION();

$a = 10;
if ($a < 10) {
    echo "a < 10";
} else {
    if ($a == 10)
    echo "a == 10";
else {
    echo "a > 10";
}
}
?>

@endsection