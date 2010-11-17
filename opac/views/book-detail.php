<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="yui-main" class="content">
      <div class="yui-b first contentbox">
        <div class="yui-ge">
          <div class="record"> <a href="javascript:history.go(-1)" class="backtosearch"><?php echo lang('back_to_results') ?></a><br /><br />
            <div style="clear: right;"></div>
            <!-- Display Title -->
            <h1><?php echo $bookDetail[0]->title;?></h1>
            <!-- End Title -->
            
            <!-- Display Book Cover -->
            <div class="alignleft"><img alt="Book Cover" src="<?php echo base_url(); ?>/assets/img/bookcover.gif"></img> </div>
            <!-- End Book Cover -->
            
            <!-- Display Main Details -->
            <table class="citation" border="0" cellpadding="2" cellspacing="0">
              <tbody>
                <tr valign="top">
                  <th><?php echo lang('author') ?>: </th>
                  <td><?php echo $bookDetail[0]->author_surname;?>, <?php echo $bookDetail[0]->author_name;?></td>
                </tr>
                <tr valign="top">
				  <th><?php echo lang('location') ?>: </th>                
                  <td><h3><?php echo $bookDetail[0]->vendosja;?></h3>
                  </td>
                </tr>
                <tr valign="top">
                  <th><?php echo lang('call_nmbr') ?>: </th>
                  <td><?php echo $bookDetail[0]->callnumber;?><br>
                  </td>
                </tr>
                <tr valign="top">
                  <th><?php echo lang('format') ?>: </th>
                  <td><span class="Book">Book</span></td>
                </tr>
                <tr valign="top">
                  <th><?php echo lang('published') ?>: </th>
                  <td><?php echo $bookDetail[0]->vendi;?>  <?php echo $bookDetail[0]->botuesi;?><br>
                  </td>
                </tr>
                <tr valign="top">
                  <th><?php echo lang('topic') ?>: </th>
                  <td><?php echo $bookDetail[0]->topic;?><br>
                  </td>
                </tr>
                <tr valign="top">
                  <th><?php echo lang('year') ?>: </th>
                  <td><?php echo $bookDetail[0]->viti;?><br>
                  </td>
                </tr>
                <tr valign="top">
                  <th><?php echo lang('phys_desc') ?>: </th>
                  <td><?php echo $bookDetail[0]->nr_fq;?><br>
                  </td>
                </tr>
                <tr valign="top">
                  <th><?php echo lang('isbn_issn') ?>: </th>
                  <td><?php echo $bookDetail[0]->isbn_issn;?><br>
                  </td>
                </tr>                
              </tbody>
            </table>
            <!-- End Main Details -->
            
        </div>
      </div>
    </div>
</div>