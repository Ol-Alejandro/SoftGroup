<center>
   <h2>Інформація з файлу</h2>
    <br>
        <?php
        require '/php/code.php';
        $file = fopen("data/file.txt","r");  
        if(!$file) {
                echo("Помилка відкриття файлу");
                exit();
            }
        else {
            $arrClubs = array();
			while (!feof($file)) { 
				$arrClubs[] = explode("/",fgets($file)); 
			}
        }   
        usort($arrClubs, 'sortClubs');
        $arrClubs = array_reverse($arrClubs);
        print "<table class = 'clubsTable'>";
        print "<tr> <td> Назва клубу </td><td> Країна </td><td> Рік заснування </td> <td> Президент </td> <td> Бюджет </td> <td> Трофеї
            </td> </tr>"; 
       
        $sum = 0;
        $count = 0;    
        foreach($arrClubs as $club){
                print "<tr>";
                foreach($club as $value){
                    print( "<td>".$value."</td>");
               }
                print("</tr>");
                if($club[1] == "Україна"){
                    $sum+=$club[4];
                    $count++;
                }
        }
        print "</table>";
        print "<br>";
        
        if($count != 0)
            print ("Середній бюджет українських футбольних клубів: ".$sum / $count);
        else
             print ("Олігархи не мають грошей на футбол");
        fclose ($file);     
        ?>
</center>        
            
  