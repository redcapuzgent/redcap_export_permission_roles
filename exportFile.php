<?php

$pid = @$_POST["pid"];
$storeheader = @$_POST["storeheader"];

if ($pid === null) {
    die("Invalid request, pid missing");
}


$Proj = new Project($pid);
$datestamp = new DateTime();
global $module;
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=".$Proj->project["project_name"]."-userpermissions-".$datestamp->format("Y-m-d").".csv");
header("Pragma: no-cache");
header("Expires: 0");
/**
 * @var $module \uzgent\ExportUserRoleDag\ExportUserRoleDag
 */
if ($storeheader == "on") {
    if($dags == null) 
    {
        echo "User name,Role name,Expiration date\n";
    } else {
        echo "User name,Role name,Data access group,Expiration date\n";
    }
    
}
$userrights = UserRights::getRightsAllUsers();
$roles =  UserRights::getRoles();
$dags = $Proj->getGroups();
if ($dags == null) {
    foreach($userrights as $username => $userdetails)
    {
        echo $username.",".$roles[$userdetails["role_id"]]['role_name'].",".$userdetails['expiration']."\n";
    }
}
else {
    foreach($userrights as $username => $userdetails)
    {
        echo $username.",".$roles[$userdetails["role_id"]]['role_name'].",".$dags[$userdetails["group_id"]].",".$userdetails['expiration']."\n";
    }
}


