<?php
    include "php/configuration.php";
    include "php/functions.php";    
    $link = mysql_connect($dbhost, $dbuser, $dbpassword);
    if (!$link) {
         die('Не удалось соединиться : ' . mysql_error());
    }
    $db_selected = mysql_select_db($dbbase, $link);
    if (!$db_selected) {
         die ('Не удалось выбрать базу foo: ' . mysql_error());
    }    
?>
<div id="trophy">
    <form method="post">
        <center>
            <label for="select_club">Виберіть клуб</label><br>
            <select name='select_club' id='select_club'>
                <?php 
                    $strQuery = 'select * from club';
                    $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                    while($row = mysql_fetch_array($recordSet)) {    
                        echo "<option value='" . $row[id] . "'>" . $row[name_club] . "</option>";
                    }
                ?>
            </select><br>
            <input name="search_trophies" class="btn1" type="submit" value="Відправити">
            <input name="reset" class="btn1" type="reset" value="Очистити">
        </center>
    </form> 
</div>      
<center>
    <?php
        if($_POST['search_trophies']){ 
            $name_club = $_POST['select_club'];
            $strQuery = "SELECT tr.name_trophy FROM victory vc, trophy tr WHERE vc.id_club = ' $name_club' AND vc.id_trophy = tr.id"; 

            $recordSet = mysql_query($strQuery) or die (mysql_error());
            $array = array();
            while($row = mysql_fetch_array($recordSet)) {
                $array[] = $row;    
            }    
            print "<table class='clubsTable'>";
            print "<tr><td>Трофей</td></tr>";
            $i = 0;
            while($i < count($array)) {
                echo("<tr>");
                    echo("<td>" . $array[$i][0] . "</td>");
                echo("</tr>");
                $i++;
            }
            print "</table>";
        }
    ?>
</center>   