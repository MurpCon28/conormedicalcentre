<p>When first installing the project go to your host file and open as admin in <b>C:\Windows\System32\drivers\etc\hosts</b> , then add
	<b>127.0.0.1       conormedical.centre</b>   to the file and save.</p>
<p>In the .env file, edit it in atom, replace <b>APP_NAME</b>  to <b>ConorMedicalCentre</b>  , <b>APP_URL</b>  to <b>http://ConorMedicalCentre.test </b> , <b>DB_DATABASE</b> to <b>conor_medicalcentre</b>
<b>DB_USERNAME to homestead</b>
and <b>DB_PASSWORD to secret </b>.</p>
<p>In gitbash run <b>npm install</b> and <b>npm run watch</b>.</p>
<p>Some times when trying to load the page a 502 error will occur and you cant load the page, to solve this in gitbash after vagrant ssh run <b> sudo service php7.4-fpm start </b> to fix and refresh the web page to fix the 502 error.</p>
