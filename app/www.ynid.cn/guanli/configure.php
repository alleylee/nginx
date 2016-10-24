<?php
/**
 * 基本设置
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

if ($action == '') {
	$options_cache = $CACHE->readCache('options');
	extract($options_cache);

	$conf_login_code = $login_code == 'y' ? 'checked="checked"' : '';
    $conf_isexcerpt = $isexcerpt == 'y' ? 'checked="checked"' : '';
	$conf_isthumbnail = $isthumbnail == 'y' ? 'checked="checked"' : '';
	$conf_isgzipenable = $isgzipenable == 'y' ? 'checked="checked"' : '';
	$conf_isgravatar = $isgravatar == 'y' ? 'checked="checked"' : '';
	$conf_ischkreply = $ischkreply == 'y' ? 'checked="checked"' : '';

	$ex1 = $ex2 = $ex3 = $ex4 = '';
	if ($rss_output_fulltext == 'y') {
		$ex1 = 'selected="selected"';
	} else {
	 	$ex2 = 'selected="selected"';
	}
	if ($comment_order == 'newer') {
		$ex3 = 'selected="selected"';
	} else {
	 	$ex4 = 'selected="selected"';
	}

	include View::getView('header');
	require_once(View::getView('configure'));
	include View::getView('footer');
	View::output();
}

if ($action == 'mod_config') {
	$getData = array(
	'blogname' => isset($_POST['blogname']) ? addslashes($_POST['blogname'])  : '',
	'blogurl' => isset($_POST['blogurl']) ? addslashes($_POST['blogurl']) : '',
	'bloginfo' => isset($_POST['bloginfo']) ? addslashes($_POST['bloginfo']) : '',
	'icp' => isset($_POST['icp']) ? addslashes($_POST['icp']):'',
	'footer_info' => isset($_POST['footer_info']) ? addslashes($_POST['footer_info']):'',
	'index_lognum' => isset($_POST['index_lognum']) ? intval($_POST['index_lognum']) : '',
	'timezone' => isset($_POST['timezone']) ? floatval($_POST['timezone']) : '',
	'login_code'   => isset($_POST['login_code']) ? addslashes($_POST['login_code']) : 'n',
	'isgzipenable' => isset($_POST['isgzipenable']) ? addslashes($_POST['isgzipenable']) : 'n',
    'isexcerpt' => isset($_POST['isexcerpt']) ? addslashes($_POST['isexcerpt']) : 'n',
    'excerpt_subnum' => isset($_POST['excerpt_subnum']) ? intval($_POST['excerpt_subnum']) : '300',
	'isthumbnail' => isset($_POST['isthumbnail']) ? addslashes($_POST['isthumbnail']) : 'n',
	'rss_output_num' => isset($_POST['rss_output_num']) ? intval($_POST['rss_output_num']) : 10,
	'rss_output_fulltext' => isset($_POST['rss_output_fulltext']) ? addslashes($_POST['rss_output_fulltext']) : 'y',
	'isgravatar' => isset($_POST['isgravatar']) ? addslashes($_POST['isgravatar']) : 'n',
	);

	if ($getData['login_code'] == 'y' && !function_exists("imagecreate") && !function_exists('imagepng')) {
		emMsg("开启登录验证码失败!服务器不支持该功能","configure.php");
	}
	if ($getData['blogurl'] && substr($getData['blogurl'], -1) != '/') {
		$getData['blogurl'] .= '/';
	}
	if ($getData['blogurl'] && strncasecmp($getData['blogurl'],'http://',7)) {
		$getData['blogurl'] = 'http://'.$getData['blogurl'];
	}

	foreach ($getData as $key => $val) {
		Option::updateOption($key, $val);
	}
	$CACHE->updateCache(array('tags', 'options','record'));
	emDirect("./configure.php?activated=1");
}
