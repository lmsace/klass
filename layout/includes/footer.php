<?php
$footnote = theme_klass_get_setting('footnote', 'format_html');

$fburl    = theme_klass_get_setting('fburl');
$pinurl   = theme_klass_get_setting('pinurl');
$twurl    = theme_klass_get_setting('twurl');
$gpurl    = theme_klass_get_setting('gpurl');

$address  = theme_klass_get_setting('address');
$emailid  = theme_klass_get_setting('emailid');
$phoneno  = theme_klass_get_setting('phoneno');
$copyright_footer = theme_klass_get_setting('copyright_footer');
$infolink = theme_klass_get_setting('infolink');

?>
<footer id="footer">
  <div class="footer-main">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span4">
          <div class="infoarea">
            <div class="footer-logo">
              <a href="<?php echo $CFG->wwwroot;?>">
              	<img src="<?php echo get_logo_url('footer'); ?>" width="183" height="80" alt="Klass">
              </a>
            </div>
            <?php echo $footnote; ?>
          </div>
        </div>
        <div class="span2">
          <div class="foot-links">
            <h5><?php echo get_string('info','theme_klass');?></h5>
            <ul>
           <?php
			 $info_settings =	explode("\n",$infolink);

			 	foreach($info_settings as $key => $settingval)
				{
					$exp_set = explode("|",$settingval);
					list($ltxt,$lurl) = $exp_set;
					$ltxt = trim($ltxt);
					$lurl = trim($lurl);
					if(empty($ltxt))
					    continue;
					echo '<li><a href="'.$lurl.'" target="_blank">'.$ltxt.'</a></li>';
				}
			//	$atto_settings = $natto_settings;

			 ?>
             </ul>
          </div>
        </div>
        <div class="span3">
          <div class="contact-info">
            <h5><?php echo get_string('contact_us', 'theme_klass');?></h5>
            <p><?php echo $address; ?><br>
            <i class="fa fa-phone-square"></i><?php echo get_string('phone', 'theme_klass'); ?>: <?php echo $phoneno; ?><br>
            <i class="fa fa-envelope"></i><?php echo get_string('email','theme_klass'); ?>: <a class="mail-link" href="mailto:<?php echo $emailid; ?>"><?php echo $emailid; ?></a></p></div>
        </div>
        <div class="span3">
           <?php
		 if($fburl!='' || $pinurl!='' || $twurl!='' || $gpurl!='')
		 {
		 ?>
          <div class="social-media">
            <h5><?php echo get_string('get_social','theme_klass'); ?></h5>
            <ul>
             <?php if($fburl!=''){?> <li class="smedia-01"><a href="<?php echo $fburl; ?>"><i class="fa fa-facebook-square"></i></a></li><?php }?>
               <?php if($pinurl!=''){?><li class="smedia-02"><a href="<?php echo $pinurl; ?>"><i class="fa fa-pinterest-square"></i></a></li><?php }?>
              <?php if($twurl!=''){?> <li class="smedia-03"><a href="<?php echo $twurl; ?>"><i class="fa fa-twitter-square"></i></a></li><?php }?>
              <?php if($gpurl!=''){?> <li class="smedia-04"><a href="<?php echo $gpurl; ?>"><i class="fa fa-google-plus-square"></i></a></li><?php }?>
            </ul>
          </div>
         <?php
		 }
		 ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-foot">
  	<div class="container-fluid">
	  	 <?php if ($copyright_footer): ?>
      	<p><?php echo $copyright_footer; ?></p>
       <?php endif; ?>
    </div>
  </div>
</footer>
<!--E.O.Footer-->

<?php  echo $OUTPUT->standard_end_of_body_html() ?>