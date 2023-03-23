W tym poradniku nauczycie się wstawiać dane do tabeli w SQL za pomocą PHP.
Kurs będzie podzielony na kilka etapów.
Polecenia w tym pliku wykonujcie i analizujcie powoli i przy najmniej 2 razy je czytajcie.

WARNING: czytajcie dokładnie komentarze załączone w kodzie to zrozumiecie

konieczne nażędzia:
 - jakiś edytor (vscode zalecane)
 - XAMPP z serwerami (Apache i MySQL)

Etap 1 Przygotowanie projektu:
 - jako pierwsze musicie wrzucić cały folder z tym projektem do folderu C:/xampp/htdocs
 - włączcie Apache i MySQL w xampp i w przeglądarce wpiszcie jako pierwsze (localhost/nazwa_folderu_z_projektem)
 - jako drógie wpiszcie 127.0.0.1/phpmyadmin

Powinna wam się w przeglądarce otworzyć strona testowa z formulażem jak wpiszecie localhost/nazwa_folderu_z_projektem
a teraz wejdźcie do phpmyadmin i do bazy test zaimportujcie plik test.sql załączony w folderze
I teraz się zastanówcie jaki macie pomysł na ten projekt, co to ma być?

Etap 2:

To teraz zobaczcie co znajduje się w index.html

I teraz zobaczcie co się stanie jak wypełnicie formulaż i prześlecie dane, powinno nic się nie pokazać, jeśli tak jest to dobrze.

Teraz zerknijcie na formulaż w html, jak widzicie to inputy text mają required ponieważ bądźmy szeczeży nie potrzebujemy tutaj required w php ponieważ jest to trochę więcej roboty, ale jak jest tak to możecie pomyśleć że jak user nie poda jakiejś danej w formulażu, która nie jest wymagana w projekcie (input bez required) to spoko ale musicie tą nawet pustą daną wysłać w zapytaniu bo mogą się pojawiać problemy z bazą danych.

To teraz zerknijcie do input.php