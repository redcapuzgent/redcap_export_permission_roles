<?php

$pid = @$_POST["pid"];
$storeheader = @$_POST["storeheader"];

if ($pid === null) {
    die("Invalid request, pid missing");
}

global $module;
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=rights.csv");
header("Pragma: no-cache");
header("Expires: 0");
/**
 * @var $module \uzgent\ExportUserRoleDag\ExportUserRoleDag
 */
if ($storeheader == "on") {
    echo "User name,role name,data access group\n";
}
$userrights = UserRights::getRightsAllUsers();
$roles =  UserRights::getRoles();
$Proj = new Project($pid);
$dags = $Proj->getGroups();
if ($dags == null) {
    foreach($userrights as $username => $userdetails)
    {
        echo $username.",".$roles[$userdetails["role_id"]]['role_name']."\n";
    }
}
else {
    foreach($userrights as $username => $userdetails)
    {
        echo $username.",".$roles[$userdetails["role_id"]]['role_name'].",".$dags[$userdetails["group_id"]]."\n";
    }
}


