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
    <content ng-app="App" >
    <div ng-controller="itemCtrl" class="container-height">
    <div class="container-fluid grey-background container-height">
        <div class="container item-navbar">
            <div class="row">
                <div id="tabs">
                    <ul class="tabs">
                        <li class="tab"><a href="#address" class="active">Клуби</a></li>
                        <li class="tab"><a href="#main_info">Ліги</a></li>
                        <li class="tab"><a href="#additional_info">Трофеї</a></li>
                        <li class="tab"><a href="#price">Стадіони</a></li>
                    </ul>
                    <div class="tabs-content">
                        <div id="address">
                            <?php
                                $strQuery = "SELECT cl.name_club, ct.name_city, cnt.name_country, lg.name_league, std.name_stadium, cl.trophies, cl.budget, cl.president FROM club cl, city ct, country cnt, league lg, stadium std  WHERE cl.id_country = cnt.id AND cl.id_city = ct.id AND cl.id_league = lg.id AND cl.id_stadium = std.id ORDER BY cl.trophies DESC"; 
                                $recordSet = mysql_query($strQuery);
                                $array = array();
                                while($row = mysql_fetch_array($recordSet)) {
                                    $array[] = $row;    
                                }    
                                buildTableClub($array);
                             ?>
                        </div>
                        <div id="main_info">
                             <?php
                                $strQuery = "SELECT lg.name_league, cnt.name_country, lg.rating, lg.surname_president FROM league lg, country cnt WHERE lg.id_country = cnt.id ORDER BY lg.rating DESC";
                                $recordSet = mysql_query($strQuery);
                                $array = array();

                                while($row = mysql_fetch_array($recordSet)) {
                                    $array[] = $row;    
                                }    
                                buildTableLeague($array);
                             ?>  
                        </div>
                        <div id="additional_info">
                            <?php
                                $strQuery = "SELECT * FROM trophy";
                                $recordSet = mysql_query($strQuery);
                                $array = array();
                                while($row = mysql_fetch_array($recordSet)) {
                                    $array[] = $row;    
                                }    
                                buildTableTrophy($array);
                             ?> 
                        </div>
                        <div id="price">
                            <?php
                                $strQuery = "SELECT * FROM stadium";
                                $recordSet = mysql_query($strQuery);
                                $array = array();
                                while($row = mysql_fetch_array($recordSet)) {
                                    $array[] = $row;    
                                }    
                                buildTableStadium($array);
                             ?> 
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
</content>
