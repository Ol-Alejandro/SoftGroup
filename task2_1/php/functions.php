<?php
    function buildTableClub($array) { 
        print "<table class='clubsTable'>";
        print "<tr>
            <td> Клуб </td>
            <td> Місто </td>
            <td> Країна </td>
            <td> Ліга </td>
            <td> Стадіон </td>
            <td> Кількість трофеїв </td>
            <td> Бюджет </td>
            <td> Президент </td>
            
        </tr>";
        
        $i = 0;
        while($i < count($array)) {
            echo("<tr>");
                echo("<td>" . $array[$i][0] . "</td>");
                echo("<td>" . $array[$i][1] . "</td>");
                echo("<td>" . $array[$i][2] . "</td>");
                echo("<td>" . $array[$i][3] . "</td>");
                echo("<td>" . $array[$i][4] . "</td>");
                echo("<td>" . $array[$i][5] . "</td>");
                echo("<td>" . $array[$i][6] . "</td>");
                echo("<td>" . $array[$i][7] . "</td>");
            echo("</tr>");
            $i++;
        }
        
        print "</table>";
    }
    function buildTableLeague($array) { 
        print "<table class='clubsTable'>";
        print "<tr>
            <td> Ліга </td>
            <td> Країна </td>
            <td> Рейтинг УЄФА </td>
            <td> Президент </td>
        </tr>";
        
        $i = 0;
        while($i < count($array)) {
            echo("<tr>");
                echo("<td>" . $array[$i][0] . "</td>");
                echo("<td>" . $array[$i][1] . "</td>");
                echo("<td>" . $array[$i][2] . "</td>");
                echo("<td>" . $array[$i][3] . "</td>");
            echo("</tr>");
            $i++;
        }
        
        print "</table>";
    }
    function buildTableTrophy($array) { 
        print "<table class='clubsTable'>";
        print "<tr>
            <td> Трофей </td>
            <td> Рік заснування </td>
        </tr>";
        
        $i = 0;
        while($i < count($array)) {
            echo("<tr>");
                echo("<td>" . $array[$i][1] . "</td>");
                echo("<td>" . $array[$i][2] . "</td>");
            echo("</tr>");
            $i++;
        }
        
        print "</table>";
    }
    function buildTableStadium($array) { 
        print "<table class='clubsTable'>";
        print "<tr>
            <td> Стадіон</td>
            <td> Рік заснування </td>
            <td> Вмістимість </td>
        </tr>";
        
        $i = 0;
        while($i < count($array)) {
            echo("<tr>");
                echo("<td>" . $array[$i][1] . "</td>");
                echo("<td>" . $array[$i][2] . "</td>");
                echo("<td>" . $array[$i][3] . "</td>");
            echo("</tr>");
            $i++;
        }
        
        print "</table>";
    }
    
    
?>