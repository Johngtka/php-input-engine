<?php
// tworzenie tablicy asocjacyjnej (skojażeniowej) z przypisanymi danymi przesłanymi post z formulaża
// zalecam jescze dodać wyćiszenie tej tablicy w postaci @, które spowoduje że nawet jeśli jakaś wartość z tej tablicy nie zostanie wypełniona to tablica nie będzie zgłaszać błędów

$data = @[
    'name' => $_POST['name'],
    'surname' => $_POST['surname']
];

/* 
    jeszcze jedna rada dla was, bo w sumie to nie potrzebujecie dodawać wyciszenia tej tablicy, ale na wszelki je zostawcie, ponieważ takie wyciszenie bardziej opłaca się w przypadku checkboxów w formulażu:
        - po pierwsze jak wiemy to checkboxy mogą przesyłać wartość boolean (true lub false)
        - jak umieścimy posty tych checkboxów w tablicy i zacnaczymy np 1 z 4 to bez wyciszenia tablicy tych checkboxów pojawią się 3 błędy, dotyczące nie zaznaczenia pozostałych (ale to zależy od intencji projektu)
*/

// jak chcecie podpiąć nowe pole z formulaża do tablicy wystarczy, że dodaće innego inputa dowolnego tyupu i nadacie mu name a w tablicy dopiszecie 'nazwe danej' => $_POST['nazwa_pola_z_formulaża']

/* 
    sekcja na dole dotyczy sprawdzania poprawności połączenia i zapytań
    sekcja try jest odpowiedzialna za poprawne połączenie z bazą
    a sekcja catch za błędne połączenie
*/

// Generalnie jest wiele metod na takie działanie ale ta jest w miare prosta

try {
    // otwarcie połączenia (host, user, hasło, baza danych)
    $conn = new mysqli('localhost', 'root', '', 'test');
    // w razie pytań zapytajcie chatgpt
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // ten kod konfiguruje MySQLi w celu raportowania błędów i korzystania z trybu ścisłego do ich obsługi

} catch (mysqli_sql_exception $event) {
    // w catch ustawiacie sobie wyjątki mysqli_sql_exception na zmienną która będzie aktywowana jeśli coś pójdzie nie tak
    // powoduje przechwycenie błędu i wyświetlenie go
    echo "Błąd połączenia z bazą danych: " . $event->getMessage();
    // zakończenie programu (boo po co ma się dalej program wykonywać)
    exit;
}

// tutaj możecie pisać swój kod do np wyświetlenia html lub danych etc.

/* 
    jeśli nie chcecie się bawić w required w html form 
    to w tym if (na dole) musicie wypisać te wszystkie wymagane przez was np $data['nazwa_pola_w_tablicy_($data)']
    ale required bardzo ułątwia sprawę z konkretyzacją danych
*/
// aktualnie ten warunek oznacza jeśli cokolwiek istnieje w tablicy $data to wykonaj kod
if (isset($data)) {
    // wykonanie polecenia (gdy jest więcej wartości do przesłania to musimy w values je wpisać)
    $conn->query("INSERT INTO test VALUES(NULL,'$data[name]','$data[surname]')");
}
// zamknięcie połączenia
$conn->close();
