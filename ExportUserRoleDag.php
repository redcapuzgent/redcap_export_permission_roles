<?php

namespace uzgent\ExportUserRoleDag;

// Declare your module class, which must extend AbstractExternalModule
class ExportUserRoleDag extends \ExternalModules\AbstractExternalModule {


    public function getProcessCsvURL() {
        return $this->getUrl("exportFile.php", false, false);
    }

}
