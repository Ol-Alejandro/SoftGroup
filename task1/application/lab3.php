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
            buildTable($arrClubs);
            fclose ($file);     
        ?>
</center>        
            
  