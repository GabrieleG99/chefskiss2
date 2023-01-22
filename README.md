# chefskiss

Prerequisiti:
1. Avere preinstallato un ambiente xampp (https://www.apachefriends.org/it/download.html) con versione php inferiore ad 8
2. Aver configurato xampp con il file xamppfiles/phpmyadmin/config.inc.php impostando il campo password = "pippo"
3.DAL TERMINALE!! Accedere alla cartella XAMPP/bin, impostare la nuova password in modalità amministratore su mariadb tramite il comando "./mariadb-admin password". Inserire "pippo" nel campo password che verrà mostrato sul terminale.


Modalità di istallazione:
1. Decomprimere l'archivio 
2. Spostare la cartella chefskiss in xampp/htdocs
3. Avviare xampp ed accedere alla dashboard (tutte le password sono impostate a "pippo")
4. Una volta fatto l'accesso in phpMyAdmin importare il database tramite il file "chefskiss.sql"
5. Visualizzare l'applicazione tramite browser all'indirizzo localhost/chefskiss


N.B. per accedere con diritti elevati fare l'accesso con email: admin@admin.it password: admin
