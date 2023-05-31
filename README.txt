1) Podesiti Xampp/Appache kao i za svaki drugi projekat
2) Ekstraktovati (unzip) dreamteam.zip u neki folder i folder prekopirati u Xampp Appache projektni folder (u zavisnoti od verzije, "apps" ili "htdocs")
3) u MySql-u (phpmyadmin) kreirati bazu ""dreamteam"
3) Startovati dreamteam.sql script u MySql-u (phpmyadmin) nad bazom "dreamteam"
4) podesiti sql user detalje u projektnifolder/lib/DataSource.php fajlu
PRIMER:
    const HOST = 'localhost';
    const USERNAME = 'sa';
    const PASSWORD = 'Terasa';
    const DATABASENAME = 'dreamteam';

Ako bi se koristili ovi podaci, potrebno je kreirati MySql user-a "sa" sa passwordom "Terasa" koji bi imao prvileges nad bazom "dreamteam"

5) pristupiti aplikaciji preko localhost/projektnifolder

	(ako se koristi drugi port ili host, podesiti virtualhosts u httpd.config-u)

6) pristup Home stranici ima samo ulogovani user
7) 3 tipa user-a
	1) administrator: admin psw:admin123 - predefinisan
	2) customer: user psw:admin123 - a moze da se kreira i poreko Register.php strane 
	3) agent/agencija - kreirati preko Register strane