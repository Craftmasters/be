<div id="producer-file-container">
  <div class="row">
    <div class="col-md-4">
      <div class="producer-file-tree">
        <div class="row file-tree-heading">
          <div class="col-md-8 col-sm-7">
            <span class="tree-count">All Files (<?php echo $total_files ?>)<span class="fa fa-sort-desc"></span> <span class="line-divider">|</span><button class="orange-btn">Upload</button></span>
          </div>
          <div class="col-md-4 col-sm-5">
            <button class="icon-button icon-gear">Configuration</button>
            <button class="icon-button icon-search">Search</button>
          </div>
        </div>
        <div class="file-tree-content">
          <div class="file-tree-content-inner">
            <?php echo $directory_html; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="producer-file-browser">
        <div class="producer-file-browser-inner">
          <?php echo $files_html; ?>
        </div>
      </div>
    </div>
  </div>
</div>