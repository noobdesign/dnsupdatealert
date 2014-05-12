<html>
<?php
/**
 * Created by PhpStorm.
 * Distr4ctio
 * Date: 2014/05/12
 */
include_once 'checkmx.php';
include_once 'global_vars.php';
$mxRecordArray= array();
if ($db_found){
    /*Sql query to retieve domains DB as Array */
    $SQL = "SELECT * FROM domains";
    $domains_result =mysql_query($SQL);
    /*Running through the list of domains*/
    echo "<table border='1'>"; // start a table tag in the HTML
    while($row = mysql_fetch_array($domains_result)){   //Creates a loop to loop through results
        echo "<tr>";
        echo "<td> ". $row['Domain_Name'] ."</td>";
        switch ($row['Is_Synaq']){
            case "0": $indicatorImage= "<img src=./images/red.jpg>";
                break;
            case "1": $indicatorImage= "<img src=./images/synaq.jpg>";
                break;
            case "2": $indicatorImage= "<img src=./images/integr8.jpg>";
                break;
            case "3": $indicatorImage= "<img src=./images/is.jpg>";
                break;
            default : $indicatorImage= "<img src=./images/red.jpg>";
        }
        echo "<td>" . $indicatorImage . "</td>";
        echo "<td>" . $row['Mx_Records'] . "</td>";
        echo "<td>" . $row['Previous_MX'] . "</td>";
        echo "<td>" . $row['After_Synaq'] . "</td>";
        echo "</tr>";
    }
    echo "</table>"; //Close the table in HTML
}
?>
</html>