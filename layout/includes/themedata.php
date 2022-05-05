<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme config data
 *
 * @package     theme_klass
 * @copyright   2015 LMSACE Dev Team,lmsace.com
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

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
    "socialurl" => $socialurl,
    "contact" => $contact,
    "footerall" => $footerall,
    "customclass" => $class,
    "block1" => $block1,
    "colclass" => $colclass
];
