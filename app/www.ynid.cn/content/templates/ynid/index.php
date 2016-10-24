<?php
if (!defined('EMLOG_ROOT')) {
    exit('error!');
}
?>
<div id="myCarousel" class="carousel">
  <!-- 要切换的内容-->
  <div class="carousel-inner">
    <?php index_focus_log(3); ?>
  </div>
  <!-- 切换导航 -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>

<div class="wrapper clearfix" id="content">
  <div class="col_4 column">
    <?php index_mid_log(中部左,1); ?>
  </div>
  <div class="col_4 column">
    <?php index_mid_log(中部中,1); ?>		</div>
  <div class="col_4 column">
    <?php index_mid_log(中部右,1); ?>
  </div>
</div>
</div>
