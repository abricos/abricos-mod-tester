<?php
/**
 * @package Abricos
 * @subpackage Bos
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @author Alexander Kuzmin <roosit@abricos.org>
 */

Abricos::GetModule("tester")->GetManager();

$brick = Brick::$builder->brick;

$v = & $brick->param->var;

Abricos::$modules->RegisterAllModule();
$modules = Abricos::$modules->GetModules();

$lstMenu = "";

foreach ($modules as $module) {

    $pages = TesterManager::$instance->GetModulePages($module);

    if (count($pages) === 0) {
        continue;
    }
    for ($i = 0; $i < count($pages); $i++) {
        $page = $pages[$i];


        $url = "/tester/".$module->name."/";
        $title = $module->name;

        if ($page->name !== "tester"){
            $url .= $page->name."/";
            $title .= " / ".$page->name;
        }

        $lstMenu .= Brick::ReplaceVarByData($v['menuitem'], array(
            "url" => $url,
            "tl" => $title
        ));
    }
}

$brick->content = Brick::ReplaceVarByData($brick->content, array(
    "menu" => $lstMenu
));


?>