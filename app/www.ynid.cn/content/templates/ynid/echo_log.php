<?php
/**
 * 文章页面
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="grid log clearfix">
  <div class="col_8 column">
    <?php topflg($top); ?><?php echo $log_title; ?>
    来源：<?php blog_author($author); ?> 时间：<?php echo gmdate('Y-n-j G:i', $date); ?> 阅读：<?php echo $views; ?>
    <?php echo $log_content; ?>
    <div class="bd-reward-stl"><button id="bdRewardBtn"><span></span></button></div>
    <?php doAction('log_related', $logData); ?>
    <?php neighbor_log($neighborLog); ?>
  </div>
<?php
include View::getView('side');
?>
</div>
<?php
include View::getView('footer');
?>
