<?php
/*
  Template Name:优能小栈
  Description:优能小栈网站模板
  Version:1.2
  Author:吕尉
  Author Url:http://www.ynid.cn
  Sidebar Amount:1
  ForEmlog:5.1.2
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $site_key; ?>" />
    <meta name="description" content="<?php echo $site_description; ?>" />
    <title><?php echo $site_title; ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo TEMPLATE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://zz.bdstatic.com/zzdashang/js/bd-zz-reward.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo TEMPLATE_URL; ?>js/html5shiv.min.js"></script>
      <script src="<?php echo TEMPLATE_URL; ?>js/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <ul class="nav navbar-nav">
            <?php blog_navi(); ?>
          </ul>
        </div>
      </nav>
