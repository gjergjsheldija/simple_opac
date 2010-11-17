<!-- BEGIN: main -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
<title>Search Home</title>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/styles.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script language="JavaScript" type="text/javascript" src="assets/js/mootools-1.2.4-core.js"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/mootools-1.2.4.1-more.js"></script>
</head>
<body>
<div id="doc2" class="yui-t5">
  <div id="hd">
    <a href="http://vufind.org/demo"><img src="Search%20Home_files/vufind.jpg" alt="vufinder"></a> </div>
  <div id="bd">
    <div id="yui-main">
      <div class="searchbox">
        <div class="yui-b">
          <form method="POST" action="index.php" name="searchForm" class="search">
            <input name="lookfor" size="30" type="text">
            <select name="type">
              <option selected="selected" value="all">All Fields</option>
              <option value="title">Title</option>
              <option value="author">Author</option>
              <option value="topic">Subject</option>
              <option value="callnumber">Call Number</option>
              <option value="isbn_issn">ISBN/ISSN</option>
            </select>
            <input name="submit" value="Find" type="submit">
            <input type="hidden" name="action" value="simple_search" />
            <a href="index.php" class="small">Advanced</a>
          </form>
        </div>
      </div>
    </div>
    <div class="yui-b"> <a href="http://vufind.org/demo/MyResearch/Home">Login</a> <br>
      <form method="post" name="langForm">
        <select name="mylang" onChange="document.langForm.submit();">
          <option selected="selected" value="en">English</option>
          <option value="de">Deutsch</option>
          <option value="es">Español</option>
          <option value="fr">Français</option>
          <option value="ja">Japanese</option>
          <option value="nl">Dutch</option>
          <option value="pt-br">Brazilian Portugese</option>
          <option value="zh-cn">Simplified Chinese</option>
          <option value="zh">Chinese</option>
        </select>
      </form>
    </div>
  </div>
  <!-- Main Listing -->
  <div id="bd">
    <div id="yui-main" class="content">
      <div class="yui-b first contentbox">
        <!-- Narrow Options -->
        <!-- End Narrow Options -->
        <!-- Listing Options -->
        <div class="yui-ge resulthead">
          <div class="yui-u first"> Showing <b>1</b> - <b>20</b> of <b>{NUMROWS}</b> Results for <b>{LOOKFOR}</b> </div>
          <div class="yui-u toggle"> Sort
          </div>
        </div>
        <!-- End Listing Options -->
        <form name="addForm">
          <div class="result record1">
            <!-- BEGIN: books -->
            <div class="yui-ge">
              <div class="yui-u first"> <img src="assets/img/bookcover.gif" class="alignleft" alt="Cover Image">
                <div class="resultitem">
                  <div id="resultItemLine1"> <a href="index.php" class="title">{DATA.title}</a> </div>
                  <div id="resultItemLine2"> by <a href="http://vufind.org/demo/Author/">{DATA.author_surname}, {DATA.author_name}</a> </div>
                  <div id="resultItemLine3"> <b>Call Number:</b> <span id="callnumber2">{DATA.callnumber}</span><br>
                    <b>Located:</b> <span id="location2">{DATA.vendosja}</span>
                  </div>
                  <span class="iconlabel book">Book</span> </div>
              </div>
              <div class="yui-u">
                <div id="saveLink2">  </div>
              </div>
            </div>
            <!-- END: books -->  
          </div>
        </form>
      </div>
      <!-- End Main Listing -->
    </div>
    <!-- End Narrow Search Options -->
  </div>
  <div id="ft">
    <!-- Your footer. Could be an include. --><br clear="all">
  </div>
</div>
</body>
</html>
<!-- END: main -->