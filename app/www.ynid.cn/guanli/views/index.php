<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div id="admindex">
<?php if (ROLE == ROLE_ADMIN):?>
<div id="admindex_main">
</div>
<div class="clear"></div>
<div style="margin-top: 20px;">
<div id="admindex_servinfo">
<h3>站点信息</h3>
<ul>
	<li>有<b><?php echo $sta_cache['lognum'];?></b>篇文章.</li>
	<li>PHP版本：<?php echo $php_ver; ?></li>
	<li>MySQL版本：<?php echo $mysql_ver; ?></li>
	<li>服务器环境：<?php echo $serverapp; ?></li>
	<li>GD图形处理库：<?php echo $gd_ver; ?></li>
	<li>服务器允许上传最大文件：<?php echo $uploadfile_maxsize; ?></li>
	<li><a href="index.php?action=phpinfo">更多信息&raquo;</a></li>
</ul>
</div>
<div class="clear"></div>
</div>
</div>

<?php else:?>
<div id="admindex_main">
<div id="about"><a href="blogger.php"><?php echo $name; ?></a> <b><?php echo $sta_cache[UID]['lognum'];?></b>篇文章</div>
</div>
<div class="clear"></div>
<?php endif; ?>
