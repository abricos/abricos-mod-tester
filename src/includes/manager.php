<?php

class TesterManager extends Ab_ModuleManager {

    /**
     * @var TesterManager
     */
    public static $instance = null;

    public function __construct(TesterModule $module) {
        parent::__construct($module);

        TesterManager::$instance = $this;
    }

    public function GetModulePages(Ab_Module $module) {
        $ret = array();

        $pathBrick = CWD."/modules/".$module->name."/brick";

        $files = globa($pathBrick."/tester*.html");
        foreach ($files as $file) {
            $fi = pathinfo($file);

            $page = new stdClass();
            $page->fi = $fi;
            $page->name = $fi["filename"];
            if ($page->name !== "tester"){
                $a = explode("-", $page->name);
                $page->name = $a[1];
            }
            array_push($ret, $page);
        }

        return $ret;
    }
}

?>