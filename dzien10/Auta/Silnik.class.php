<?php
class Silnik{
    //public oznacza możliwość zmiany tej zmiennej 
    //private oznacza że zmienna określona tylko w tej klasie oraz nie jest mozliwa jego zmiana poza klasą
    private $typ;
    private $moc;
    
    //metoda będaca konstruktorem obiektu
    //wywoływana zawsze przy tworzeniu obiektu
    public function __construct($rodzaj,$km){
        $this->typ = $rodzaj;
        $this->moc = $km;
    }
}
?>