<center>
    <h2>Пошук у файлі</h2>
    <br>
    <?php
        require '/php/code.php';
        $file = fopen("data/file.txt","r");  
        $arrClubs = array();
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
    <div class="searchBlock">
        <form action="" method="post">
            <label for="search">Search</label>
            <input type="text" id="search" name="search">
            <input type="reset" value="Очистити">
            <input type="submit" value="Пошук" name="btnsearch">
        </form>
    </div>  
    <?php
        print "<br>";
        if($_POST['btnsearch']) {
            $f = false; 
            if (count($arrClubs)){
                foreach($arrClubs as $one) {
                    if(stristr($one[0], $_POST['search'])){
                        if($flag == false){
                            print "<table class = 'clubsTable'>";
                            print "<tr> <td> Назва клубу </td>
                            <td> Країна </td>
                            <td> Рік заснування </td>
                            <td> Президент </td>
                            <td> Бюджет </td>
                            <td> Трофеї</td></tr>";
                            }                
                            echo '<td>', $one[0], '</td>',
                                 '<td>', $one[1], '</td>',
                                 '<td>', $one[2], '</td>',
                                 '<td>', $one[3], '</td>',
                                 '<td>', $one[4], '</td>',
                                 '<td>', $one[5], '</td>';
                            echo("</tr>");
                            $flag = true;
                    }
                }
            }
            echo $flag == true ? "</table>" : "Не знайдено";
        }  
    ?>
</center>        
            
  