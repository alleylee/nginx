<?php
/*
* 列表
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
if($pageurl == BLOG_URL.'page/' || $pageurl == BLOG_URL.'?page='){
        include View::getView('index');
	}else{
?>
<div class="grid list clearfix">
  <div class="col_8 column">
    <?php doAction('index_loglist_top'); ?>
    <?php
    if (!empty($logs)):
      foreach($logs as $value):
    ?>
	   <?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a>
	   <?php echo $value['log_description']; ?>
	   <?php editflg($value['logid'],$value['author']); ?><?php blog_author($value['author']); ?> 发表于：<?php echo gmdate('Y-n-j', $value['date']); ?>浏览：<?php echo $value['views']; ?><?php blog_tag($value['logid']); ?>
     <?php
     endforeach;
     else:
     ?>
	   <h2>未找到</h2>
	   <p>抱歉，没有符合您查询条件的结果。</p>
     <?php endif;?>
	   <?php echo $page_url;?>
   </div>
<?php
include View::getView('side');
	}
?>
</div>
<?php
include View::getView('footer');
?>
