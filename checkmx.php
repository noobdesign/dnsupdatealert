<?php
/**
 * Created by PhpStorm.
 * Distr4ctio
 * Date: 2014/05/12
 */
function checkMxValid($domainName, $templateDomain){
    getmxrr($domainName, $domainHostNames);
    getmxrr($templateDomain, $exampleHostNames);
    $domainMxArray= array();
    $exampleMxArray= array();
    foreach ($exampleHostNames as $h) {
        $exampleMxArray[] = gethostbyname($h);
    }
    foreach ($domainHostNames as $h) {
        $domainMxArray[]= gethostbyname($h);
    }
    if (in_array("", $domainMxArray)) {
        return false;
    }
    else {
        foreach($domainMxArray as $hostAddress)
        {
            if (!in_array($hostAddress, $exampleMxArray))
            {
                return false;
            }
        }
        return true;
    }
};
function returnOwner($ownerID =1 ){
    print "weo";
};
