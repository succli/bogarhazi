<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get" class="form-inline">
  <div class="form-group">
    <label for="s" class="sr-only"><?php _e('Search', 'bogarhazi') ?></label>
    <div class="input-group">
      <input type="text" name="s" name="s" class="form-control" placeholder="<?php _e('Search', 'bogarhazi') ?>">
      <div class="input-group-addon">
        <button type="submit" id="searchsubmit"><?php _e('Go', 'bogarhazi') ?></button>
      </div>
    </div>
  </div>
</form>
