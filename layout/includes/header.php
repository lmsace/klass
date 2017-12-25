<?php
$surl = new moodle_url('/course/search.php');
?>
<header id="header">

	<div class="header-top">
  	<div class="container-fluid">
   <?php if($CFG->branch > "27"): ?>
			    <?php echo $OUTPUT->user_menu(); ?>
   <?php endif; ?>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="header-main">
	  <div class="header-main-content">
    	<div class="container-fluid">
      	<div class="row-fluid">
        	<div class="span6">
          	<div id="logo"><a href="<?php echo $CFG->wwwroot;?>"><img src="<?php echo get_logo_url(); ?>" width="183" height="80" alt="Klass"></a></div>
          </div>
           <?php if(! $PAGE->url->compare($surl, URL_MATCH_BASE)): ?>
        	<div class="span6">
          	<div class="top-search">
           <form action="<?php echo new moodle_url('/course/search.php'); ?>" method="get">
              <input type="text" placeholder="<?php echo get_string('searchcourses'); ?>" name="search" value="">
              <input type="submit" value="Search">
           </form>
            </div>
            <div class="clearfix"></div>
          </div>
           <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="header-main-menubar">
      <div class="navbar">
        <div class="navbar-inner">
          <div class="container-fluid">
            <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a href="#" class="brand" style="display: none;">Title</a>
            <p class="navbar-text"><a href="<?php echo $CFG->wwwroot;?>"><i class="fa fa-home"></i><?php echo get_string('home','theme_klass');?></a></p>
            <div class="nav-collapse collapse navbar-responsive-collapse">
              <p class="navbar-text"><a href="<?php echo $CFG->wwwroot;?>"><i class="fa fa-home"></i><?php echo get_string('home','theme_klass');?></a></p>
              <?php echo $OUTPUT->custom_menu(); ?>
              <ul class="nav pull-right">
                  <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                  <?php if($CFG->branch < "28"): ?>
                   <li class="navbar-text"><?php echo $OUTPUT->login_info() ?></li>
                 <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</header>
<!--E.O.Header-->