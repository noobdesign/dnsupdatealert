<?php
/**
 * Created by PhpStorm.
 * Distr4ctio
 * Date: 2014/05/12
 */
include_once 'checkmx.php';
include_once 'global_vars.php';
print "1";
if ($db_found){
    /*Sql query to retieve domains DB as Array */
    $SQL = "SELECT * FROM domains";
    $domains_result =mysql_query($SQL);
    /*Sql query to retrieve server_list DB as Array */
    $SQL = "SELECT * FROM server_list";
    $servers_result = mysql_query($SQL);
    /*Running through the list of domains*/
    print "2";
    while ( $domain_row = mysql_fetch_assoc($domains_result)){
        $checkDomain= $domain_row['Domain_Name'];
        $exists= false;
        var_dump($checkDomain);
        print "3";
        /*Checking if the domain is pointing to a mx server listed in the DB*/
        mysql_data_seek($servers_result, 0);
        while ($server_row = mysql_fetch_assoc($servers_result))
        {
            if (checkMxValid($checkDomain,$server_row['FQDN']))
            {

            }
            /*Sever ID Update*/
            $server_ID=$server_row['ID'];
            $sqlUpdate="UPDATE domains SET Is_Synaq='$server_ID' WHERE Domain_Name='$checkDomain'";
            mysql_query($sqlUpdate);
            $exists = true;
            if ($server_row['Previous_MX'] = null)
            {

            }
        }
    }
    /* If not pointing to a server in the db set to 0 as is not synaq*/
    if (!$exists) {
        var_dump($server_row['Previous_MX']);
        $sqlUpdate="UPDATE domains SET Is_Synaq=0 WHERE Domain_Name='$checkDomain'";
        mysql_query($sqlUpdate);
        if ($server_row['Previous_MX'] = null)
        {
            getmxrr($checkDomain, $MX_array);
            print "<p>Running Null update.";
            var_dump($MX_array);
            $MX_string = implode(', ',$MX_array);
            var_dump($MX_string);
            $sqlUpdate="UPDATE domains SET Previous_MX='$MX_string' WHERE Domain_Name='$checkDomain'";
            mysql_query($sqlUpdate);
        }
        else
        {
            print "<p> weo weo weo </p>";
            getmxrr($checkDomain, $MX_array);
            $MX_string = implode(', ',$MX_array);
            $sqlUpdate="UPDATE domains SET After_Synaq='$MX_string' WHERE Domain_Name='$checkDomain'";
            mysql_query($sqlUpdate);
        }
    }
}
    print "end";
}
?>