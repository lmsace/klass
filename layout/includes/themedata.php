<?php

$custom = $OUTPUT->custom_menu();

if ($custom == '') {
    $class = "navbar-toggler hidden-lg-up nocontent-navbar";
} else {
    $class = "navbar-toggler hidden-lg-up";
}

// Footer Content.
$logourl = theme_klass_get_logo_url();
$logourlfooter = theme_klass_get_logo_url('footer');
$footlogo = theme_klass_get_setting('footerlogo');
$footnote = theme_klass_get_setting('footnote', 'format_html');
$fburl    = theme_klass_get_setting('fburl');
$pinurl   = theme_klass_get_setting('pinurl');
$twurl    = theme_klass_get_setting('twurl');
$gpurl    = theme_klass_get_setting('gpurl');
$address  = theme_klass_get_setting('address');
$emailid  = theme_klass_get_setting('emailid');
$phoneno  = theme_klass_get_setting('phoneno');
$copyrightfooter = theme_klass_get_setting('copyright_footer');
$infolink = theme_klass_get_setting('infolink');
$infolink = theme_klass_infolink();

/* $sinfo = get_string('info', 'theme_klass');
$scontactus = get_string('contact_us', 'theme_klass');
$sphone = get_string('phone', 'theme_klass');
$semail = get_string('email', 'theme_klass');
$sgetsocial = get_string('get_social', 'theme_klass'); */

$socialurl = ($fburl != '' || $pinurl != '' || $twurl != '' || $gpurl != '') ? 1 : 0;
$contact = ($emailid != '' || $address != '' || $phoneno != '') ? 1 : 0;

if ($footlogo != '' || $footnote != '' || $infolink != '' || $url != 0 || $contact != 0 || $copyrightfooter != '') {
    $footerall = 1;
} else {
    $footerall = 0;
}

$block1 = ($footlogo != '' || $footnote != '') ? 1 : 0;
$infoslink = ($infolink != '') ? 1 : 0;
$blockarrange = $block1 + $infoslink + $contact + $socialurl;

switch ($blockarrange) {
    case 4:
        $colclass = 'col-md-3';
        break;
    case 3:
        $colclass = 'col-md-4';
        break;
    case 2:
        $colclass = 'col-md-6';
        break;
    case 1:
        $colclass = 'col-md-12';
        break;
    case 0:
        $colclass = '';
        break;
    default:
        $colclass = 'col-md-3';
    break;
}

$templatecontext = [
    "logourl" => $logourl,    
    "logourl_footer" => $logourlfooter,
    "footnote" => $footnote,
    "fburl" => $fburl,
    "pinurl" => $pinurl,
    "twurl" => $twurl,
    "gpurl" => $gpurl,
    "address" => $address,
    "emailid" => $emailid,
    "phoneno" => $phoneno,
    "copyright_footer" => $copyrightfooter,
    "infolink" => $infolink,
    /* "s_info" => $sinfo,
    "s_contact_us" => $scontactus,
    "s_phone" => $sphone,
    "s_email" => $semail,
    "s_get_social" => $sgetsocial,
    "s_searchcourses" => $ssearchcourses,
    "s_home" => $shome, */
    "socialurl" => $socialurl,
    "contact" => $contact,
    "footerall" => $footerall,
    "customclass" => $class,
    "block1" => $block1,
    "colclass" => $colclass
];