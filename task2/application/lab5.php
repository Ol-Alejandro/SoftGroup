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
            <label for="select_trophy">Виберіть трофей</label><br>
            <select name='select_trophy' id='select_trophy'>
                <?php 
                    $strQuery = 'select * from trophy';
                    $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                    while($row = mysql_fetch_array($recordSet)) {    
                        echo "<option value='" . $row[id] . "'>" . $row[name_trophy] . "</option>";
                    }
                ?>
            </select><br>
            <label for="select_stadium">Виберіть стадіон</label><br>
            <select name='select_stadium' id='select_stadium'>
                <?php 
                    $strQuery = 'select * from stadium';
                    $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                    while($row = mysql_fetch_array($recordSet)) {    
                        echo "<option value='" . $row[id] . "'>" . $row[name_stadium] . "</option>";
                    }
                ?>
            </select><br>
            <label for="select_league">Виберіть лігу</label><br>
            <select name='select_league' id='select_league'>
                <?php 
                    $strQuery = 'select * from league';
                    $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                    while($row = mysql_fetch_array($recordSet)) {    
                        echo "<option value='" . $row[id] . "'>" . $row[name_league] . "</option>";
                    }
                ?>
            </select><br>
            <input name="search_club" class="btn1" type="submit" value="Відправити">
            <input name="reset" class="btn1" type="reset" value="Очистити">
        </center>
    </form> 
</div>
            
<?php
    if($_POST['search_club']){ 
        $id_league = $_POST['select_league'];
        $id_trophy = $_POST['select_trophy'];
        $id_stadium = $_POST['select_stadium'];
        $strQuery = "SELECT name_club FROM club WHERE id_league = '$id_league' AND id_stadium = '$id_stadium'";  
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