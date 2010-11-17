<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<link type="text/css" rel="stylesheet"  media="screen" href="<?php echo base_url(); ?>assets/css/styles.css" />
<link type="text/css" rel="stylesheet"  media="screen" href="<?php echo base_url(); ?>assets/css/keyboard.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/keyboard.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	$('#advanced').click(function () {
		$('#advancedSeach').toggle("slow");
		$('#searchbox').toggle("slow");
	});
	$('#simple-search').click(function () {
		$('#advancedSeach').toggle("slow");
		$('#searchbox').toggle("slow");
	});
	$('#lookfor').focus(function () {
		if($("#lookfor").is(".has-focus")) {
			;
		} else {
			$('#keyboard').toggle("slow");
		}
		$(this).addClass("has-focus"); 
	});	
});
</script>
</head>
<div id="doc2" class="yui-t5">
  <div id="hd">
    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="BUSH"></a> </div>
  <div id="bd">
    <div id="yui-main">
      <div class="searchbox" id="searchbox">
        <div class="yui-b">
          <?php echo form_open('opac/simpleSearch');?>
            <input name="lookfor" id="lookfor" size="30" type="text">
            <select name="type">
              <option value="title"><?php echo lang('title'); ?></option>
              <option value="author"><?php echo lang('author'); ?></option>
              <option value="topic"><?php echo lang('topic'); ?></option>
              <option value="vendosja"><?php echo lang('location'); ?></option>
              <option value="isn"><?php echo lang('isbn_issn'); ?></option>
            </select>
            <input name="submit" value="<?php echo lang('search'); ?>" type="submit">
            <a href="#" class="small" id="advanced"><?php echo lang('advanced_search'); ?></a>
          </form>
            <ul id="keyboard" style="display: none;">
        		<li class="left-shift">shift</li>
				<li class="letter">&euml;</li>
				<li class="letter">&uuml;</li>
				<li class="letter">&ouml;</li>
				<li class="letter">&auml;</li>
				<li class="letter">&ccedil;</li>
				<li class="letter">&szlig;</li>
				<li class="letter">&ntilde;</li>
			</ul>
        </div>
      </div>
      
      <!--  advanced search -->
	  <div class="record" id="advancedSeach" style="display: none;">
         <?php echo form_open('opac/advancedSearch');?>
            <h2><?php echo lang('advanced_search'); ?></h2>
            <br>
            <table class="citation">
              <tbody>
                <tr>
                  <td></td>
                  <td align="right"><select name="type[]">
		              <option value="title"><?php echo lang('title'); ?></option>
		              <option value="author"><?php echo lang('author'); ?></option>
		              <option value="topic"><?php echo lang('topic'); ?></option>
		              <option value="vendosja"><?php echo lang('location'); ?></option>
		              <option value="isn"><?php echo lang('isbn_issn'); ?></option>
                    </select>
                  </td>
                  <td><input name="lookfor[]" id="lookfor" size="50" type="text"></td>
                </tr>
                <tr>
                  <td><select name="bool[]">
                      <option selected="selected" value="AND">AND</option>
                      <option value="OR">OR</option>
                      <option value="NOT">NOT</option>
                    </select>
                  </td>
                  <td align="right"><select name="type[]">
		              <option value="title"><?php echo lang('title'); ?></option>
		              <option value="author"><?php echo lang('author'); ?></option>
		              <option value="topic"><?php echo lang('topic'); ?></option>
		              <option value="vendosja"><?php echo lang('location'); ?></option>
		              <option value="isn"><?php echo lang('isbn_issn'); ?></option>
                    </select>
                  </td>
                  <td><input name="lookfor[]" size="50" type="text"></td>
                </tr>
                <tr>
                  <td><select name="bool[]">
                      <option selected="selected" value="AND">AND</option>
                      <option value="OR">OR</option>
                      <option value="NOT">NOT</option>
                    </select>
                  </td>
                  <td align="right"><select name="type[]">
		              <option value="title"><?php echo lang('title'); ?></option>
		              <option value="author"><?php echo lang('author'); ?></option>
		              <option value="topic"><?php echo lang('topic'); ?></option>
		              <option value="vendosja"><?php echo lang('location'); ?></option>
		              <option value="isn"><?php echo lang('isbn_issn'); ?></option>
                    </select>
                  </td>
                  <td><input name="lookfor[]" size="50" type="text"></td>
                </tr>
                <tr>
                  <td><select name="bool[]">
                      <option selected="selected" value="AND">AND</option>
                      <option value="OR">OR</option>
                      <option value="NOT">NOT</option>
                    </select>
                  </td>
                  <td align="right"><select name="type[]">
		              <option value="title"><?php echo lang('title'); ?></option>
		              <option value="author"><?php echo lang('author'); ?></option>
		              <option value="topic"><?php echo lang('topic'); ?></option>
		              <option value="vendosja"><?php echo lang('location'); ?></option>
		              <option value="isn"><?php echo lang('isbn_issn'); ?></option>
                    </select>
                  </td>
                  <td><input name="lookfor[]" size="50" type="text"></td>
                </tr>
              </tbody>
            </table>
            <br>
            <input name="submit" value="<?php echo lang('search'); ?>" type="submit">
            <a href="#" class="small" id="simple-search" style="align:right;"><?php echo lang('simple_search'); ?></a>
            <br>
          </form>
        </div>      
      
      <!-- end advanced search -->
    </div>
 <!-- language selection  -->
  </div>
  <div id="bd">
  
  <?php if(isset($body)) echo $body; else echo '';?>
  
  </div>
  <div id="ft">
    <!-- footer -->
    <br clear="all">
  </div>
</div>
</body>