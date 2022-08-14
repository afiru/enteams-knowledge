<?php
/*
  Plugin Name: knowledgeCustomAPI
  Plugin URI: なし
  Description: knowledge専用のCustomエンドポイントAPI
  Version: 1.0
  Author: MarcatCube
  Author URI:https://knowledge.web-pack.jp/
  License: MarcatCube
 */
?>
<?php
//お気に入りの機能を実装
require_once(dirname(__FILE__) . '/lib/knowledgeBookmarksApi.php');

//クリップ機能を実装
require_once(dirname(__FILE__) . '/lib/knowledgeClipssApi.php');