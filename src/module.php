<?php
/**
 * @package Abricos
 * @subpackage Tester
 * @author Alexander Kuzmin <roosit@abricos.org>
 */

class TesterModule extends Ab_Module {

    public function __construct() {
        // Версия модуля
        $this->version = "0.1.0";

        // Название модуля
        $this->name = "tester";
    }
}

Abricos::ModuleRegister(new TesterModule());

?>