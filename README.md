<p>When first installing the project go to your host file and open as admin in C:\Windows\System32\drivers\etc\hosts , then add
	127.0.0.1       conormedical.centre   to the file and save.</p>
<p>In the .env file, edit it in atom, replace APP_NAME to ConorMedicalCentre , APP_URL to http://ConorMedicalCentre.test , DB_DATABASE to conor_medicalcentre
DB_USERNAME to homestead
and DB_PASSWORD to secret .</p>
<p>In gitbash run npm install and npm run watch.</p>
<p>Some times when trying to load the page a 502 error will occur and you cant load the page, to solve this in gotbash after vagrant ssh run sudo service php7.4-fpm start to fix and refresh the web page to fix the 502 error.</p>
