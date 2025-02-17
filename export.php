<?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';

#global $module;
/**
 * @var $module \uzgent\ExportUserRoleDag\ExportUserRoleDag
 */

?>
<h1>
    Export user permissions
</h1>
<p>
Press download to export user permissions with user names roles and data access groups.

<br>
    <form enctype="multipart/form-data" action="<?php echo $module->getProcessCsvURL(); ?>" method="post">
        <input name="pid" type="hidden" value="<?php echo $module->escape($_GET['pid']);?>"/>
        <input id="storeheader" name="storeheader" checked="checked" type="checkbox"/><label for="storeheader">&nbsp;Store header row in CSV?</label><BR/><BR/>
        <input class="btn btn-primary" type="submit" value="download"/>
    </form>
</p>

<br>


<?php
require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';