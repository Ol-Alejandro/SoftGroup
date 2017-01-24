<center>
    <form method="post" action="">
        <div class="field">
            <label for="name_of_club">Назва клубу</label><br>
            <input type="text" id="name_of_club" name="name_of_club" pattern="^[А-Яа-яЇїЄєІі\s]+$" required>
        </div>
        <div class="field">
            <label for="country">Країна</label><br>
            <input type="text" id="country" name="country" pattern="^[А-Яа-яЇїЄєІі\s]+$" required>   
        </div>
        <div class="field">
            <label for="year">Рік</label><br>
            <input type="text" id="year" name="year" pattern="^[0-9]{4}" required>
        </div>
        <div class="field">
            <label for="genre">Президент</label><br>
            <input type="text" id="president" name="president" pattern="^[А-Яа-яЇїЄєІі\s]+$" required>
        </div>
        <div class="field">
            <label for="budget">Бюджет</label><br>
            <input type="text" id="budget" name="budget"  pattern="^[0-9]{1,9}" required>
        </div>
        <div class="field">
            <label for="trophy">Трофеї</label><br>
            <input type="text" id="trophy" name="trophy"  pattern="^[0-9]{1,2}" required>
        </div>
        <input name="submit" class="btn" type="submit" value="Отправить" />
    </form>
</center>
<?php
    if($_POST['submit']){
        $fp=fopen("data/file.txt","a");  
        $nameClub = $_POST['name_of_club'];
        $country = $_POST['country'];
        $year = $_POST['year'];
        $president = $_POST['president'];
        $budget = $_POST['budget'];
        $trophy = $_POST['trophy'];
        $text = $nameClub."/".$country."/".$year."/" .$president."/".$budget."/".$trophy;
        fwrite($fp, "\r\n" . $text);  
        fclose($fp);   
    }
?>