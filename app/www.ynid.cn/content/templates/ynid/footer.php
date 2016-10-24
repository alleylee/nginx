<?php
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div class="wrapper clearfix" id="footer">
  <div class="quickfoot clearfix column">
  <div class="col_3 column">
    <?php index_foot_log(你需要知道的,1); ?>
  </div>
  <div class="col_3 column">
    <?php index_foot_log(联系我们,1); ?>
  </div>
  <div class="col_3 column">
    <?php index_foot_log(社区,1); ?>
  </div>
  <div class="col_3 column">
    <?php index_foot_log(快捷方式,1); ?>
  </div>
  </div>
  <div class="col_12 copyright column">
    <p class="center"><?php echo $footer_info; ?><a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo $icp; ?></a>
    </p>
    <?php doAction('index_footer'); ?>
  </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo TEMPLATE_URL; ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://zz.bdstatic.com/zzdashang/js/bd-zz-reward.js"></script>
</body>
</html>
