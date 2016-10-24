<?php
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<li>
	<dt><span><?php echo $title; ?></span></dt>
	<ul id="bloggerinfo">
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<p><b><?php echo $name; ?></b>
	<?php echo $user_cache[1]['des']; ?></p>
	</ul>
	</li>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<li class="module">
	<dt><span><?php echo $title; ?></span></dt>
	<ul id="blogtags">
	<?php foreach($tag_cache as $value): ?>
		<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<li>
	<dt><span><?php echo $title; ?></span></dt>
	<ul id="blogsort">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li>
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<?php if (!empty($value['children'])): ?>
		<ol>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li>
		  <a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
		</li>
		<?php endforeach; ?>
		</ol>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE;
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<li>
	<dt><span><?php echo $title; ?></span></dt>
	<ul id="newlog">
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<li>
	<dt><span><?php echo $title; ?></span></dt>
	<ul id="hotlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<li>
	<dt><span><?php echo $title; ?></span></dt>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<li>
	<dt><span><?php echo $title; ?></span></dt>
	<ul>
	<?php echo $content; ?>
	</ul>
	</li>
<?php } ?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE;
	$navi_cache = $CACHE->readCache('navi');
	?>
	<?php
	foreach($navi_cache as $value):
		if($value['url'] == 'admin'):
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
                $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
                $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
    <li><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a></li>
    <?php endforeach; ?>
<?php }?>
<?php
//blog：置顶
function topflg($istop){
	$topflg = $istop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/import.gif\" title=\"置顶文章\" /> " : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<a href="'.BLOG_URL.'guanli/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE;
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	分类：<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	上一篇：<a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
		<br />
	<?php endif;?>
	<?php if($nextLog):?>
		 下一篇：<a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：N天内热门
function blog_ndayhot($count, $n){
    ?>
    <div class="focus_top">
    <?php
    $curdate = time();
    $db = MySql::getInstance();
    $sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='blog' and hide='n' and date>UNIX_TIMESTAMP()-86400*$n order by views desc limit $count";
	$ret = $db->query($sql);
    $items = array();
    global $CACHE;
	$user_cache = $CACHE->readCache('user');
	while ($row = $db->fetch_array($ret)) {
		$row['title'] = htmlspecialchars($row['title']);
        $row['excerpt'] = htmlspecialchars(strip_tags($row['excerpt']));
		$row['logurl'] = Url::log(intval($row['gid']));
        $row['author'] = '<a href="'.Url::author($row['author']).'">' . $user_cache[$row['author']]['name'].'</a>';
        $row['date'] = gmdate('Y.n.j', $row['date']);
		$items[] = $row;
	}
	foreach($items as $val):
	?>
    <div class="ftcontain">
        <li>
            <a href="<?php echo $val['logurl']; ?>" title="<?php echo $val['title']; ?>"><?php echo subString($val['title'], 0, 17); ?></a>
            <span><?php echo $val['date']; ?></span>
        </li>
    </div>
	<?php endforeach; ?>
    </div>
<?php }?>
<?php
//blog：底部友情链接
function footer_link(){
	global $CACHE;
	$link_cache = $CACHE->readCache('link');
	?>
	<div id="footer_link">
	<?php foreach($link_cache as $value): ?>
	<a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_self"><?php echo $value['link']; ?></a>
	<?php endforeach; ?>
	</div>
<?php }?>
<?php
//blog-tool:格式化内容工具，去除html标签
function blog_tool_purecontent($content, $strlen = null){
        $content = str_replace('阅读全文&gt;&gt;', '', strip_tags($content));
        if ($strlen) {
            $content = subString($content, 0, $strlen);
        }
        return $content;
}
?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>
<?php
//首页下部区域
function index_foot_log($log_title,$num){
	$db = MySql::getInstance();
	$sql = 	"SELECT * FROM ".DB_PREFIX."blog WHERE title='$log_title' LIMIT 0,".$num."";
	$list = $db->query($sql);
	while($row = $db->fetch_array($list)){
			$l .='<h7>'.$row['title'].'</h7><p>'.$row['content'].'<p>';
		}
	echo $l;
	}
?>
<?php
//首页聚焦
function index_focus_log($num){
	$db = MySql::getInstance();
	$sql = "SELECT blogid as g,filepath,(SELECT title FROM ".DB_PREFIX."blog where gid=g and sortid='3') as t,(SELECT 	excerpt FROM ".DB_PREFIX."blog where gid=g and sortid='3') as e FROM ".DB_PREFIX."attachment where width='1261'  GROUP BY blogid ORDER BY addtime DESC LIMIT 0,".$num."";
	$list = $db->query($sql);
	while($row = $db->fetch_array($list)){
?>
	<div class="active item"><img src="<?php echo $row['filepath']; ?>"></div>
	<?php } ?>
<?php }?>
<?php
//首页中部区域
function index_mid_log($log_title,$num){
	$db = MySql::getInstance();
	$sql = 	"SELECT * FROM ".DB_PREFIX."blog WHERE title='$log_title' LIMIT 0,".$num."";
	$list = $db->query($sql);
	while($row = $db->fetch_array($list)){
			$l .='<p>'.$row['content'].'<p>';
		}
	echo $l;
	}
?>
