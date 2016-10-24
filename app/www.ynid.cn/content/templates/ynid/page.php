<?php
/**
 * 自建页面模板
 */
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="grid page clearfix">
  <div class="col_8 column">
    <?php echo $log_title; ?>
    <?php echo $log_content; ?>
  </div>
<?php
include View::getView('side');
?>
</div>
<?php
include View::getView('footer');
?>
