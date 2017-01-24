<center>
   <h2>Інформація з файлу</h2>
        <?php
        $file = fopen("data/file.txt","r");  
        if(!$file) {
                echo("Помилка відкриття файлу");
                exit();
            }
        else {
			print "<table class = 'clubsTable'>";
			print "<tr> <td> Назва клубу </td><td> Країна </td><td> Рік заснування </td> <td> Президент </td> <td> Бюджет </td> <td> Трофеї
            </td> </tr>";
			while (!feof($file)) { 
				$arrClubs= explode("/",fgets($file)); 
				print "<tr>";
                foreach($arrClubs as $value){
                    print( "<td>".$value."</td>");
               }
                print("</tr>");
			}
			print "</table>";
		}
          fclose ($file);   
        ?>        
</center>        
        