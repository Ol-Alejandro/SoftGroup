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
<div id="tabs">
    <ul class="tabs">
        <li class="tab"><a href="#club" class="active">Видалити клуб</a></li>
        <li class="tab"><a href="#league">Видалити лігу</a></li>
        <li class="tab"><a href="#trophy">Видалити трофей</a></li>
        <li class="tab"><a href="#stadium">Видалити стадіон</a></li>
    </ul>
    <div class="tabs-content">
        <div id="club">
            <form method="post" action="">
                <center>
                    <label for="select_club">Виберіть клуб, який потрібно видалити</label><br>
                    <select name='select_club' id='select_club' style="width:30%; height:30px;">
                        <?php 
                        $strQuery = 'select * from club';
                        $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                       
                        while($row = mysql_fetch_array($recordSet)) {    
                            echo "<option value='" . $row[id] . "'>" . $row[name_club] . "</option>";
                        }
                    ?>
                    </select>
                    <input name="delete_club" class="btn1" type="submit" value="Відправити">
                    <input name="reset" class="btn1" type="reset" value="Очистити">
                </center> 
            </form>   
        </div>
            <div id="league">
                <form action="" method="post">
                    <center>
                        <label for="select_trophy">Виберіть лігу, яку потрібно видалити</label><br>
                        <select name='select_league' id='select_trophy' style="width:30%; height:30px;">
                            <?php 
                                $strQuery = 'select * from league';
                                $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                                while($row = mysql_fetch_array($recordSet)) {    
                                    echo "<option value='" . $row[id] . "'>" . $row[name_league] . "</option>";
                                }
                            ?>
                        </select><br>
                        <input name="delete_league" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </center>
                </form> 
            </div>
            <div id="trophy">
                <form method="post">
                    <center>
                        <label for="select_trophy">Виберіть трофей, який потрібно видалити</label><br>
                        <select name='select_trophy' id='select_trophy' style="width:30%; height:30px;">
                            <?php 
                                $strQuery = 'select * from trophy';
                                $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                                while($row = mysql_fetch_array($recordSet)) {    
                                    echo "<option value='" . $row[id] . "'>" . $row[name_trophy] . "</option>";
                                }
                            ?>
                        </select><br>
                        <input name="delete_trophy" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </center>
                </form> 
            </div>
            <div id="stadium">
                <form method="post">
                    <center>
                        <label for="select_stadium">Виберіть стадіон, який потрібно видалити</label><br>
                        <select name='select_stadium' id='select_stadium' style="width:30%; height:30px;">
                            <?php 
                                $strQuery = 'select * from stadium';
                                $recordSet = mysql_query($strQuery) or die('Не вдалося виконати запит: ' . mysql_error());
                                while($row = mysql_fetch_array($recordSet)) {    
                                    echo "<option value='" . $row[id] . "'>" . $row[name_stadium] . "</option>";
                                }
                            ?>
                        </select><br>
                        <input name="delete_stadium" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </center>
                </form>
            </div>
        </div>
</div>
<?php
    if($_POST['delete_club']){ 
        $name_club = $_POST['select_club'];
        echo "$name_club";
        $strSQL = "DELETE FROM club WHERE id = '$name_club'";    
        mysql_query($strSQl)  or die (mysql_error());
    }
    if($_POST['delete_league']){ 
        $name_league = $_POST['select_league'];
        $strSQL = "DELETE FROM league WHERE id = '$name_league'";    
        mysql_query($strSQL) or die (mysql_error());
    }
    if($_POST['delete_trophy']){ 
        $name_trophy = $_POST['select_trophy'];
        $strSQL = "DELETE FROM trophy WHERE id = '$name_trophy'";    
        mysql_query($strSQL) or die (mysql_error());
       
    }
    if(isset($_POST['delete_stadium'])){ 
        $name_stadium = $_POST['select_stadium'];
        $strSQL = "DELETE FROM stadium WHERE id = '$name_stadium'";    
        mysql_query($strSQL) or die (mysql_error());
        
    }
?>