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
        <li class="tab"><a href="#club" class="active">Добавити клуб</a></li>
        <li class="tab"><a href="#league">Добавити лігу</a></li>
        <li class="tab"><a href="#trophy">Добавити трофей</a></li>
        <li class="tab"><a href="#stadium">Добавити стадіон</a></li>
    </ul>
    <div class="tabs-content">
        <div id="club">
            <form method="post" action="">
                    <center>
                    <label for="name_club">Назва клубу</label><br>
                    <input type="text" id="name_club" name="name_club" pattern="^[А-Яа-яЇїЄєІі\s]+$"><br>
                
                    <label for="city">Місто</label><br>
                    <input type="text" id="city" name="city" required><br>
                
                    <label for="country_club">Країна</label><br>
                    <select name='country_club' id='country_club'>
                        <?php 
                        $strQuery = 'select * from country';
                        $recordSet = mysql_query($strQuery) or die('Запрос не удался: ' . mysql_error());
                       
                        while($row = mysql_fetch_array($recordSet)) {    
                            echo "<option value='" . $row[id] . "'>" . $row[name_country] . "</option>";
                        }
                    ?>
                    </select>
                    <br>
                    <label for="league_club">Ліга</label><br>
                    <select name='league_club' id='league_club'>
                        <?php 
                        $strQuery = 'select * from league';
                        $recordSet = mysql_query($strQuery) or die('Запрос не удался: ' . mysql_error());
                       
                        while($row = mysql_fetch_array($recordSet)) {    
                            echo "<option value='" . $row[id] . "'>" . $row[name_league] . "</option>";
                        }
                    ?>
                    </select><br>
                    <label for="count_trophy">Кількість трофеїв</label><br>
                    <input type="text" id="count_trophy" name="count_trophy" required><br>
                   
                    <label for="budget">Бюджет</label><br>
                    <input type="text" id="budget" name="budget" required><br>
                   
                    <label for="name_president">Президент</label><br>
                    <input type="text" id="name_president" name="name_president" required><br>
                    <label for="stadium_club">Стадіон</label><br>
                    <select name='stadium_club' id='stadium_club'>
                        <?php 
                        $strQuery = 'select * from stadium';
                        $recordSet = mysql_query($strQuery) or die('Запрос не удался: ' . mysql_error());
                       
                        while($row = mysql_fetch_array($recordSet)) {    
                            echo "<option value ='" . $row[id] . "'>" . $row[name_stadium] . "</option>";
                        }
                    ?>
                    </select><br>
                    <input name="submit_club" class="btn1" type="submit" value="Відправити">
                    <input name="reset" class="btn1" type="reset" value="Очистити">
                </center> 
            </form>   
        </div>
            <div id="league">
                <form action="" method="post">
                    <center>
                        <label for="name_league">Назва ліги</label><br>
                        <input type="text" id="name_league" name="name_league"  pattern="^[А-Яа-яЇїЄєІі\s]+$"  required><br>  
                        <label for="country_league">Країна</label><br>
                        <select name='country_league' id='country_league'>
                            <?php 
                                $strQuery = 'select * from country';
                                $recordSet = mysql_query($strQuery) or die('Запрос не удался: ' . mysql_error());
                               
                                while($row = mysql_fetch_array($recordSet)) {    
                                    echo "<option value='" . $row[id] . "'>" . $row[name_country] . "</option>";
                                }
                            ?>
                        </select><br>
                        <label for="rating">Рейтинг УЄФА</label><br>
                        <input type="text" id="rating" name="rating" required><br>
                        <label for="president">Прізвище президента ліги</label><br>
                        <input type="text" id="president" name="president"  pattern="^[А-Яа-яЇїЄєІі]+$" required><br>
                        <input name="submit_league" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </center>
                </form> 
            </div>
            <div id="trophy">
                <form method="post">
                    <center>
                        <label for="name_trohpy">Назва трофею</label><br>
                        <input type="text" id="name_trophy" name="name_trophy"  pattern="^[А-Яа-яЇїЄєІі\s]+$"  required><br>  
                        <label for="foundation_trophy">Рік заснування</label><br>
                        <input type="text" id="foundation_trophy" name="foundation_trophy"  pattern="[0-9]{4}" required><br>
                        <input name="submit_trophy" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </center>
                </form> 
            </div>
            <div id="stadium">
                <form method="post">
                    <center>
                        <label for="name_stadium">Назва стадіону</label><br>
                        <input type="text" id="name_stadium" name="name_stadium"  pattern="^[А-Яа-яЇїЄєІі\s]+$"  required><br>
                        <label for="fundation_stadium">Рік заснування</label><br>
                        <input type="text" id="fundation_stadium" name="fundation_stadium"  pattern="[0-9]{4}" required><br>
                        <label for="capacity">Вмістимість</label><br>
                        <input type="text" id="capacity" name="capacity"  pattern="[0-9]{3,9}"  required><br>
                        <input name="submit_stadium" class="btn1" type="submit" value="Відправити">
                        <input name="reset" class="btn1" type="reset" value="Очистити">
                    </center>
                </form>
            </div>
        </div>
</div>
<?php
    if($_POST['submit_club']){ 
        $name_club = $_POST['name_club'];
        $city = $_POST['city'];
        $country = $_POST['country_club'];
        $league = $_POST['league_club'];
        $trophy = $_POST['count_trophy'];
        $budget = $_POST['budget'];
        $president = $_POST['name_president'];
        $name_stadium = $_POST['stadium_club'];
        $strSQL = "INSERT INTO club(name_club, id_city, id_country, id_league, trophies, budget, president, id_stadium)
         VALUES('".$name_league."','".$city."','".$country."','".$league."','".$trophy."','".$budget."','".$president."','".$name_stadium."')";    
        mysql_query($strSQL) or die(mysql_error());
        
    }
     if($_POST['submit_league']){ 
        $name_league = $_POST['name_league'];
        echo " $name_league";
        $country_league = $_POST['country_league'];
         echo "  $country_league";
        $rating = $_POST['rating'];
        echo " $rating ";
        $president = $_POST['president'];
        echo "$president";
        $strSQL = "INSERT INTO league(name_league, id_country, rating, surname_president)
                   VALUES('".$name_league."','".$country_league."','".$rating."','".$president."')";    
        mysql_query($strSQL) or die (mysql_error());
    }
     if($_POST['submit_trophy']){ 
        $name_trophy = $_POST['name_trophy'];
        $foundation_trophy = $_POST['foundation_trophy']; 
        $strSQL = "INSERT INTO trophy(name_trophy, year_foundation)
                   VALUES('".$name_trophy ."','".$foundation_trophy."')";    
        mysql_query($strSQL) or die(mysql_error());
    }
    if(isset($_POST['submit_stadium'])){ 
        $name_stadium = $_POST['name_stadium'];
        $fundation_stadium = $_POST['fundation_stadium'];
        $capacity = $_POST['capacity']; 
        $strSQL = "INSERT INTO stadium(name_stadium, year_foundation, capacity)
                   VALUES('$name_stadium','$fundation_stadium','$capacity')";    
        mysql_query($strSQL) or die(mysql_error());
    }
?>