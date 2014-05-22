<?php

/**
 * @package Abricos
 * @subpackage Tester
 * @author Alexander Kuzmin <roosit@abricos.org>
 */
class TesterModule extends Ab_Module {

    private $_manager = null;

    public function __construct() {
        // Версия модуля
        $this->version = "0.1.0";

        $this->takelink = "tester";

        // Название модуля
        $this->name = "tester";
    }

    /**
     * @return TesterManager
     */
    public function GetManager(){
        if (empty($this->_manager)){
            require_once 'includes/manager.php';
            $this->_manager = new TesterManager($this);
        }

        return $this->_manager;
    }

    public function GetContentName() {

        $adr = Abricos::$adress;

        if ($adr->level > 1) {
            return "module";
        }

        return "index";
    }
}

Abricos::ModuleRegister(new TesterModule());

?>