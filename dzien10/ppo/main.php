<?php
require_once('Dystrybutor.class.php');
//stworzenie nowego obiektu Dystrybutor i przypisanie go do zmiennej "dystrybutor"

$Dystrybutor1 = new Dystrybutor();
//przypisanie zmiennych składowych
$Dystrybutor1->waga=50;
$Dystrybutor1->baniak= TRUE;
$Dystrybutor1->zasilanie= TRUE;
$Dystrybutor1->stanWody= 100;

$mojKubeczek = new Kubeczek();
$mojKubeczek->pojemnosc = 0;
$mojKubeczek->zawartosc="brak";

echo "stanWody:".$Dystrybutor1->stanWody->stanWody;
echo "<br />";
//napelniamy kubeczek
$mojKubeczek->pojemnosc=$Dystrybutor1->lejWode();
$Dystrybutor1->lejWode($kubeczek);
echo "Stan wody:".$Dystrybutor1->stanWody;
echo "<br />";
echo"stan wody w kubeczku:".$mojKubeczek->pojemnosc;
echo "<br />";
?>