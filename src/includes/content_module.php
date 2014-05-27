<?php
/**
 * @package Abricos
 * @subpackage Bos
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @author Alexander Kuzmin <roosit@abricos.org>
 */

$brick = Brick::$builder->brick;

$v = & $brick->param->var;
$adr = Abricos::$adress;
$modName = $adr->dir[1];
$mod = Abricos::GetModule($modName);
$title = $modName;
$modBrickName = "tester";
$modBrickContent = $v['notfound'];

if (!empty($mod)) {

    if ($adr->level > 2) {
        $modBrickName .= "-".$adr->dir[2];
        $title .= " / ".$adr->dir[2];
    }

    $file = CWD."/modules/".$mod->name."/brick/".$modBrickName.".html";
    if (file_exists($file)){
        $modBrick = Brick::$builder->LoadBrickS($modName, $modBrickName, $brick);
        $modBrickContent = $modBrick->content;
    }
}

$brick->content = Brick::ReplaceVarByData($brick->content, array(
    "title" => $title,
    // "result" => $modBrickContent
    "result" => "[mod]".$modName.":".$modBrickName."[/mod]"

));

?>