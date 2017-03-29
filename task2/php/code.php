<?php
    function connect($file){
       
        
    }
    function sortClubs($x, $y){
            if($x[4] < $y[4] ){
                return 1;
            }
            if($x[4] > $y[4] ){
                return -1;
            }
            return 0;
        }
    function buildTable($arrClubs) {
        print "<table class = 'clubsTable'>";
        print "<tr> <td> Назва клубу </td><td> Країна </td><td> Рік заснування </td> <td> Президент </td> <td> Бюджет </td> <td> Трофеї
        </td> </tr>";   
        foreach($arrClubs as $club){
                print "<tr>";
                foreach($club as $value){
                    print( "<td>".$value."</td>");
               }
                print("</tr>");
        }
        print "</table>";
        print "<br>";
    }
?>