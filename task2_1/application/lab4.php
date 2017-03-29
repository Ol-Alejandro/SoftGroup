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
        <li class="tab"><a href="#club" class="active">Пошук клуб</a></li>
        <li class="tab"><a href="#league">Пошук ліги</a></li>
        <li class="tab"><a href="#trophy">Пошук трофею</a></li>
        <li class="tab"><a href="#stadium">Пошук стадіону</a></li>
    </ul>
    <div class="tabs-content">
        <div id="club">
            <center>
                <?php
                    $strQuery = "SELECT cl.name_club, ct.name_city, cnt.name_country, lg.name_league, std.name_stadium, cl.trophies, cl.budget, cl.president FROM club cl, city ct, country cnt, league lg, stadium std  WHERE cl.id_country = cnt.id AND cl.id_city = ct.id AND cl.id_league = lg.id AND cl.id_stadium = std.id ORDER BY cl.trophies DESC"; 
                    $recordSet = mysql_query($strQuery);
                    $array = array();
                    while($row = mysql_fetch_array($recordSet)) {
                       $array[] = $row;    
                    }    
                    buildTableClub($array);
                ?>
                <form method="post" action="">
                    <input type="text" name="search_club"><br>
                    <input name="submit_club" class="btn1" type="submit" value="Відправити">
                    <input name="reset" class="btn1" type="reset" value="Очистити">
                </form>
                <?php
                    if($_POST['submit_club']){ 

                        $strQuery = "SELECT cl.name_club, ct.name_city, cnt.name_country, lg.name_league, std.name_stadium, cl.trophies, cl.budget, cl.president FROM club cl, city ct, country cnt, league lg, stadium std  WHERE cl.id_country = cnt.id AND cl.id_city = ct.id AND cl.id_league = lg.id AND cl.id_stadium = std.id AND cl.name_club LIKE '%" .$_POST['search_club']. "%' ORDER BY cl.trophies DESC"; 
                        
                        $recordSet = mysql_query($strQuery);
                        $array = array();
                        while($row = mysql_fetch_array($recordSet)) {
                            $array[] = $row;    
                        }    
                        buildTableClub($array);
                    }
                ?>   
            </center> 
        </div>
            <div id="league">
                <center>
                   <?php
                       $strQuery = "SELECT lg.name_league, cnt.name_country, lg.rating, lg.surname_president FROM league lg, country cnt WHERE lg.id_country = cnt.id ORDER BY lg.rating DESC";
                       $recordSet = mysql_query($strQuery);
                       $array = array();
                       while($row = mysql_fetch_array($recordSet)) {
                           $array[] = $row;    
                       }    
                        buildTableLeague($array);
                    ?> 
                    <form action="" method="post"> 
                        <input type="text" name="search_league"><br>
                        <input name="submit_league" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </form>
                    <?php
                        if($_POST['submit_league']){ 
                            $strQuery = "SELECT lg.name_league, cnt.name_country, lg.rating, lg.surname_president FROM league lg, country cnt WHERE lg.id_country = cnt.id AND lg.name_league LIKE '%" .$_POST['search_league']. "%' ORDER BY lg.rating DESC";
                            $recordSet = mysql_query($strQuery) or die(mysql_error());
                            $array = array();
                            while($row = mysql_fetch_array($recordSet)) {
                                $array[] = $row;    
                            }    
                            buildTableLeague($array);
                        }
                    ?>
                </center> 
            </div>
            <div id="trophy">
                <center>
                    <?php
                        $strQuery = "SELECT * FROM trophy ORDER BY year_foundation DESC";
                        $recordSet = mysql_query($strQuery);
                        $array = array();
                        while($row = mysql_fetch_array($recordSet)) {
                            $array[] = $row;    
                        }    
                        buildTableTrophy($array);
                    ?> 
                    <form method="post">
                        <input type="text" name="search_trophy"><br>
                        <input name="submit_trophy" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </form> 
                    <?php
                        if($_POST['submit_trophy']){ 
                            $strQuery = "SELECT * FROM trophy WHERE name_trophy LIKE '%" .$_POST['search_trophy']. "%' ORDER BY year_foundation DESC";
                            $recordSet = mysql_query($strQuery);
                            $array = array();
                            while($row = mysql_fetch_array($recordSet)) {
                                $array[] = $row;    
                            }    
                            buildTableTrophy($array);
                        }
                    ?>
                </center>
            </div>
            <div id="stadium">
                <center>
                    <?php
                        $strQuery = "SELECT * FROM stadium ORDER BY capacity DESC";
                        $recordSet = mysql_query($strQuery);
                        $array = array();
                        while($row = mysql_fetch_array($recordSet)) {
                            $array[] = $row;    
                        }    
                        buildTableStadium($array);
                    ?> 
                    <form method="post">
                        <input type="text" name="search_stadium"><br>
                        <input name="submit_stadium" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </form>
                    <?php
                        if(isset($_POST['submit_stadium'])){ 
                            $name_stadium = $_POST['search_stadium'];
                            $strQuery = "SELECT * FROM stadium WHERE name_stadium LIKE '%" .$_POST['search_stadium']. "%' ORDER BY capacity DESC";
                            $recordSet = mysql_query($strQuery);
                            $array = array();
                            while($row = mysql_fetch_array($recordSet)) {
                                $array[] = $row;    
                            }    
                            buildTableStadium($array);
                        }
                    ?>
                </center>
            </div>
        </div>
</div>