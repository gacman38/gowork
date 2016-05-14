<?PHP
    //funkcja służy do sprawdzenia konfiguracji php
    //phpinfo();
//inicjacja połaczenia z bazą danych (mysql)

//adres serwera np localhost lub 127.0.0.1
//$baza=new mysqli('adres_serwera_bazy_danych_ip/domena','login_bazy_danych','haslo_bazy_danych','nazwa_bazy_danych');

function connectDB(){
    //połączenie z bazą
$baza=new mysqli('localhost','root','','baza_gracjan');
   //sprawdzanie tego połączenia
    //skSładowa (connect_errnoprzyjmuje):
    //true-błąd połączenia z bazą
    //false-nie ma bledu, udało się połączyć
    if($baza->connect_errno){
        echo "numer błedu".$baza->connect_errno;
       return false; 
    }else{
        return $baza;
    }
}
function showComments($db){
    //zapytanie SQL zapisane jako zmienna tekstowa (string)
    $sqlQuery = 'SELECT * FROM comments';
    //$db->query to metoda która zwraca wyniki zapytania przekazanego jako argument tej metody
    $rezultat = $db->query($sqlQuery);
    //rezultat=jakis wynik ->true jezeli zapytanie sie udało/poprawne
    //rezultat =false -błedne zapytanie SQL
    if($rezultat){
        echo "liczba komentarzy".$rezultat->num_rows;
        echo "<br />";
       echo "<table border=\"1\">
  <tr>
    <th>id</th>
    <th>komentarz</th> 
    <th>data</th>
  </tr>";
        while($wiersz = $rezultat->fetch_object()){
            echo "<tr>";
            echo "<td>";
            echo $wiersz->id;
            echo"</td>";
            echo"<td>";
            echo $wiersz->comment;
            echo"</td>";
            echo"<td>";
            echo $wiersz->createdate;
            echo"</td>";
             echo"</tr>";
            
        }
        echo "</table>";
    }else{
        echo "błędne zapytanie SQL"; 
    }
    echo $rezultat->num_rows;
}//koniec metody
//funkcja potrzebuje do zmiany komentarza informacji o id komentarza, samym tekscie-komentarza, i baza danych
function changeComments($id,$comment,$db){
   $sqlQuery = 'update comments set comment='.$comment.'where comments.id'.$id; 
   $rezultat = $db->query($sqlQuery);
     if($rezultat){
        echo"udało się zaktualizowac :";
         echo "<br />";
         echo"liczba wierszy".$db->affect_rows;
    }else{
        echo "błędne zapytanie SQL".$sqlQuery;
    }
    
}
function addComment ($comment,$baza){
    $aktualnaData = date('Y-m-d:H:i:s');
    $sqlQuery="insert into comments (comment,createdate)values
    ('".$comment."','".$aktualnaData."')";
    echo $sqlQuery;
}
//częśc głowna programu
$mojaBaza = connectDB();
//funkcja wbudowana a mysqli służy do zamknięcia połączenia
//wywołanie metody wraz z przekazanych do niej obiektem -baza danych
showComments($mojaBaza);
changeComments(2,"nowytrzeci komentarz",$mojaBaza);
$mojaBaza->close();
addComment("nowy super komentarz",$mojaBaza);
showComments($mojaBaza);
?>