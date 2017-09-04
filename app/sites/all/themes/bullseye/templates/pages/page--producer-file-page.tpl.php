<div id="producer-file-container">
  <div class="row">
    <div class="col-md-4 producer-file-tree">
      <div class="file-tree-heading">
        <div class="row">
          <div class="col-md-6">
            <span class="tree-count">All Files (<?php echo $total_files ?>)<span class="fa fa-sort-desc"></span> | <button class="orange-btn">Upload</button></span>
          </div>
          <div class="col-md-6">
            <button class="icon-search">Search</button>
            <button class="icon-gear">Configuration</button>
          </div>
        </div>
      </div>
      <div class="file-tree-content">
        <div class="file-tree-content-inner">
          <?php echo $directory_html; ?>
        </div>
      </div>
    </div>
    <div class="col-md-8 producer-file-browse">browser</div>
  </div>
</div>