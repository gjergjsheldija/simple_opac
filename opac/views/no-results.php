<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="yui-main" class="content">
      <div class="yui-b first contentbox">
        <!-- Narrow Options -->
        <!-- End Narrow Options -->
        <!-- Listing Options -->
        <div class="yui-ge resulthead">
          <div class="yui-u first"> <?php echo lang('no_results_found'); ?> : <br />
	      <?php 
	      for( $i = 0; $i <= 3; $i++ ) {
	      	if( $lookfor[$i] !='' ) {
	      	    echo ucwords($type[$i]) . " : <b>" . $lookfor[$i] . "</b><br />";
	      	}
	      }
	      ?>
          </div>
        </div> 
      </div>
      <!-- End Main Listing -->
</div>
