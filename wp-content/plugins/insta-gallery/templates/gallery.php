<div id="<?php echo esc_attr($item_selector); ?>" class="insta-gallery-feed insta-gallery-square" data-feed="<?php echo htmlentities(json_encode($options), ENT_QUOTES, 'UTF-8'); ?>" data-feed_layout="<?php echo esc_attr($instagram_feed['insta_layout']); ?>">
  <?php
  if ($instagram_feed['insta_box-profile'] && ($template_file = $this->template_path('parts/profile.php'))) {
    include($template_file);
  }
  ?>
  <div class="insta-gallery-list">
  </div>
  <?php include($this->template_path('parts/spinner.php')); ?>
  <?php include($this->template_path('parts/actions.php')); ?>
</div>