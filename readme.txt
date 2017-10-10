=== Easy Digital Downloads Payment Gateway - tpay.com  ===
Contributors: tpay.com
Donate link: http://tpay.com/
Tags: edd,easy digital downloads, transferuj, tpay.com, payment, polish gateway, polska brama płatności, bramka płatności, płatności internetowe
Requires at least: 2.3.5
Tested up to: 4.8.1
Stable tag: 2.0
License: GPLv2
Accept payments from all major polish banks directly on your Easy Digital Downloads site via tpay.com polish payment gateway system.

== Description ==

Brama płatności dla pluginu Easy Digital Downloads.

tpay.com to system szybkich płatności online należący do spółki Krajowy Integrator Płatności SA. Misją przedsiębiorstwa jest wprowadzanie oraz propagowanie nowatorskich metod płatności i rozwiązań płatniczych zapewniających maksymalną szybkość i bezpieczeństwo dokonywanych transakcji.

Jako lider technologiczny, tpay.com oferują największą liczbę metod płatności na rynku. W ofercie ponad 50 sposobów zapłaty znajdą Państwo m.in. największy wybór e-transferów, Zintegrowaną Bramkę Płatności Kartami, mobilną galerię handlową RockPay oraz narzędzie do zbiórek pieniężnych w sieci – serwis eHat.me. Dodatkowe funkcjonalności systemu obejmują pełen design w RWD, przelewy masowe oraz udostępnione biblioteki mobilne i dodatki do przeglądarek automatyzujące przelewy. tpay.com oferuje również płatności odroczone, raty online Premium SMS oraz płatność za pomocą kodu QR.

tpay.com zapewnia najwyższy poziom bezpieczeństwa potwierdzony certyfikatem PCI DSS Level 1. System gwarantuje wygodę oraz możliwość natychmiastowej realizacji zamówienia. Oferta handlowa tpay.com jest dokładnie dopasowana do Twoich potrzeb.

tpay.com Online Payment System belongs to Krajowy Integrator Płatności Inc. The company’s mission is to introduce and promote innovative payment methods and solutions ensuring maximum speed and safety of online transactions.

As technological leader, tpay.com offers the largest number of payment methods on market. Among over 50 ways of finalizing transactions you will find the widest choice of direct online payments, Integrated Card Payment Gate, mobile shopping center – RockPay and group payments tool – eHat.me. Additional features include: RWD design, mass pay-outs, mobile libraries and payment automation application. You can also pay using postponed payment, online installments, Premium SMS and QR code payment.

The highest level of security of payments processed by tpay.com is verified by PCI DSS Level 1 certificate. System guarantees convenience and instant order execution. Our business offer is flexible and prepared according to your needs.


== Installation ==

= WYMAGANIA =

Aby korzystać z płatności tpay.com w platformie Easy Digital Downloads niezbędne jest:

a)	Posiadanie konta w systemie tpay.com
b)	Aktywna wtyczka Easy Digital Downloads dla Wordpressa.
c)	Pobranie plików instalacyjnych modułu z katalogu wtyczek Wordpress:
d)  Aktywna waluta PLN


= INSTALACJA MODUŁU =

-  Instalacja automatyczna
a)	Przejdź do „Wtyczki” następnie „Dodaj nową” i w miejscu „Szukaj wtyczek”  wyszukaj „tpay Gateway Easy Digital Download”
b)	W „Wynikach wyszukiwania” pojawi się moduł płatności Tpay, który należy zainstalować.


-  Instalacja ręczna
a)	Przejdź do zakładki „Wtyczki” i wybierz „Dodaj nową”. Następnie skorzystaj z opcji „Wyślij wtyczkę na serwer”.
b)	Wybierz pobrany moduł tpay.com i zainstaluj.


1.	Przejdź do panelu administracyjnego i otwórz zakładkę „Wtyczki”. Kliknij „Włącz” przy pozycji „tpay Gateway Easy Digital Download ”.


2.	Przejdź do „Produkty cyfrowe” i wybierz „Ustawienia” .

Po czym z listy dostępnych opcji należy wybrać zakładkę „Bramki płatności”.

Teraz należy włączyć moduł Transferuj zaznaczając dostępne  przy nazwie pole:


Następnie można przejść do ustawień modułu, które znajdują się poniżej w sekcji  „Ustawienia dla tpay.com”:

a. Wyświetlana nazwa – należy wpisać tpay.com
b. ID Sprzedawcy – jest to ID nadane Sprzedawcy podczas rejestracji konta w systemie tpay.com, służy jako login podczas logowania do Panelu Odbiorcy Płatności w systemie tpay.com
c. Kod bezpieczeństwa – kod, który jest dostępny w Panelu Odbiorcy Płatności w systemie tpay.com w zakładce „Ustawienia” -> „Powiadomienia” sekcja „Bezpieczeństwo”.
d. Widok dla kanałów płatności – opcja, która pozwala Sprzedawcy ustawić formę wyboru kanału płatności przez Klienta sklepu. Dostępne są trzy warianty wyboru kanału płatności, a zalecaną i jednocześnie metodą domyślną jest opcja „Ikony banków na stronie sklepu”. Poniżej znajduje się opis każdej z opcji:

•	Ikony banków na stronie sklepu – Klient po wybraniu metody płatności tpay.com na stronie Sprzedawcy wybiera bank z którego chce skorzystać. Podczas wyboru są prezentowane loga wszystkich dostępnych banków.


•	Lista banków na stronie sklepu - Klient po wybraniu metody płatności tpay.com na stronie Sprzedawcy wybiera bank z którego chce skorzystać. Podczas wyboru są prezentowane nazwy wszystkich dostępnych banków w formie listy rozwijanej.


•	Przekierowanie na tpay.com – Klient po wybraniu metody płatności tpay.com na stronie Sprzedawcy zostaje przekierowany do Panelu Transakcyjnego na stronę tpay.com, gdzie dokonuje wyboru kanału płatności.



= Testy =

Moduł był testowany na systemie zbudowanym z wersji Easy Digital Downloads 2.8.6 i Wordpress 4.8.1.


= KONTAKT =

W razie potrzeby odpowiedzi na pytania powstałe podczas lektury lub szczegółowe wyjaśnienie kwestii technicznych prosimy o kontakt poprzez formularz znajdujący się w Panelu Odbiorcy lub na adres e-mail: pt@tpay.com
== Changelog ==
v2.0
Implementacja bibliotek PHP tpay.com
Zmiana widoków i design wtyczki
Usprawnione bezpieczeństwo odbierania danych transakcji
Dodana obsługa i logowanie błędów
Naprawa istniejących błędów
Optymalizacja kodu źródłowego

v1.4
Poprawiono przesyłanie kanału płatności oraz przekierowanie do panelu transakcyjnego.

v1.1
Dodano adresy nowych serwerów powiadomień.
Prosimy wykonać aktualizację ze względu na nadchodzącą zmianę adresów serwerów powiadomień.

== Frequently Asked Questions == 
Feel free to contact us on info@tpay.com
== Upgrade Notice ==

== Screenshots == 
no screenshots 

== Upgrade Notice ==

= 2.0 =
Przed aktualizacją do wersji 2.0 prosimy upewnić się, że Państwa serwer PHP działa w wersji 5.6 lub wyższej.
