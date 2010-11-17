<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="yui-main" class="content">
      <div class="yui-b first contentbox">
        <!-- Narrow Options -->
        <!-- End Narrow Options -->
        <!-- Listing Options -->
        <div class="yui-ge resulthead">
          <div class="yui-u first"> <?php echo lang('found'); ?> <b><?php echo $numresults?></b> <?php echo lang('num_results'); ?> <b><?php echo $lookfor; ?></b> </div>
        </div>
        <!-- Listing -->
        <?php foreach($results as $result ) : ?>
          <div class="result record" id="record">
            <div class="yui-ge" id="yui-ge">
              <div class="yui-u first"> <img src="<?php echo base_url(); ?>/assets/img/bookcover.gif" class="alignleft" alt="Cover Image">
                <div class="resultitem">
                  <div id="resultItemLine1"> <?php echo anchor('opac/detail/' . $result->id, $result->title);?>
                  </div>
                  <div id="resultItemLine2"> <?php echo lang('from'); ?> <?php echo anchor('opac/author/' . $result->author_surname . '+' . $result->author_name ,$result->author_surname . ' ' .  $result->author_name)?>
                  </div>
                  <div id="resultItemLine3"> <b><?php echo lang('call_nmbr') ?>:</b> <span id="callnumber2"><?php echo $result->callnumber;?></span><br>
                    <b><?php echo lang('location') ?>:</b> <span id="location2"><?php echo $result->vendosja;?></span>
                    <div class="status" id="status2"><span class="available"><?php echo lang('available') ?></span></div>
                  </div>
                  <span class="iconlabel book"><?php echo lang('book') ?></span> </div>
              </div>
              <div class="yui-u">
                <div id="saveLink2">  </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
		<!-- End Listing -->
		<div class="pagination" id="pagination"><?php echo $this->pagination->create_links(); ?></div>   
      </div>
      <!-- End Main Listing -->
</div>
