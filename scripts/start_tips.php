<?php
//===================================================================================
// Dictionary system. Web-based application for development of bilingual dictionaries
// Version: 1.0
// Copyright (c) Ales Chejn, hvalur.org 2011
// All rights reserved
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// For support contact us at www.hvalur.org
//===================================================================================
$oop4 = new mySQL ($host1, $user1, $pass1, $data1, TRUE);
$oop9 = new mySQL ($host1, $user1, $pass1, $data1, TRUE);
$buffer_tips.= '<div class="main_search_page3">';
$buffer_tips.=  '<div class="search_1column">';
$buffer_tips.=  '<div class="viewentry">';
$buffer_tips.=  '<div class="main_entry">';
$buffer_tips.=  $lang_img1;
$dict_image='ds_images';
$sql_tip = sprintf ('SELECT `keyword`, `num_keyword` FROM `%s`',
	$dict_image);
$oop4->Setnames();
$oop4->query($sql_tip);
$num_tip = $oop4->getNumrows();
if ($num_tip!=0) {
$w=0;
$n= rand(1, $num_tip);
while ($row_tip = $oop4->FetchRow()) :
$w++;
if ($n==$w) {
$buffer_tips.= "<a href=\"./search.php?list_kind=alpha&amp;d_h=".$row_tip[0]."&amp;d_h_n=".$row_tip[1]."\"> → ".$row_tip[0]."</a> <br>";
$table_images = 'ds_images';
$sql = sprintf ('SELECT `name_of_file`,`author`,`licence`, `orientation` FROM `%s` WHERE `keyword` COLLATE `%s` = %s AND `num_keyword` = %s',
	$table_images,
	$collation_1,
	quate_smart($row_tip[0]),
	quate_smart($row_tip[1]));
$oop9->Setnames();
$oop9->query($sql);
$num2 = $oop9->getNumrows(); 
while ($image = $oop9->fetchRow ()):
if ($image[3]==1) {
$image_output .= "<br>";
$image_output .= "<a href=\"".$IMAGE_URL."images/uploaded_files/".$image[0]."\" title=\"".ucfirst($row_tip[0]).",	".$lang_img2." ".$image[1]."\" class=\"thickbox\"><img src=\"".$IMAGE_URL."images/uploaded_files/th_".$image[0]."\" border=\"0\" class=\"preview_2\" alt=\"\"></a> ";
} else {
$image_output .= "<br>";
$image_output .= "<a href=\"".$IMAGE_URL."images/uploaded_files/".$image[0]."\" title=\"".ucfirst($row_tip[0]).",	".$lang_img2." ".$image[1]."\" class=\"thickbox\"><img src=\"".$IMAGE_URL."images/uploaded_files/th_".$image[0]."\" border=\"0\" class=\"preview\" alt=\"\"></a> ";
}
$image_output .= "<br>";
$image_output .= "<span class=\"foto\">".$lang_img2."</span> <span class=\"nav\">".$image[1]."</span> <br>";
$image_output .= "<span class=\"foto\">".$lang_img3."</span> <span class=\"nav\">".$image[2]."</span>";
endwhile;
$buffer_tips.=  $image_output;
$oop9->FreeResult();
}
endwhile;
}
$oop4->FreeResult();
$buffer_tips.=  '</div>';
$buffer_tips.=  '</div>';
$buffer_tips.=  '</div>';
$buffer_tips.=  '<div class="search_2column">';
$buffer_tips.=  '<div class="viewentry">';
$buffer_tips.=  '<div class="main_entry">';
$image_output = "";
$dict_image='ds_images';
$sql_tip = sprintf ('SELECT `keyword`, `num_keyword` FROM `%s`',
			$dict_image);
$oop4->Setnames();
$oop4->query($sql_tip);
$num_tip2 = $oop4->getNumrows();
if ($num_tip2!=0) {
$w=0;
$n= rand(1, $num_tip2);
while ($row_tip2 = $oop4->FetchRow()) :
$w++;
if ($n==$w) {
$buffer_tips.= "<a href=\"./search.php?list_kind=alpha&amp;d_h=".$row_tip2[0]."&amp;d_h_n=".$row_tip2[1]."\"> → ".$row_tip2[0]."</a> <br>";
$table_images = 'ds_images';
$sql = sprintf ('SELECT `name_of_file`,`author`,`licence`, `orientation` FROM `%s` WHERE `keyword` COLLATE `%s` = %s AND `num_keyword` = %s',
	$table_images,
	$collation_1,
	quate_smart($row_tip2[0]),
	quate_smart($row_tip2[1]));
$oop9->Setnames();
$oop9->query($sql);
$num2 = $oop9->getNumrows(); 
while ($image = $oop9->fetchRow ()):
if ($image[3]==1) {
$image_output .= "<br>";
$image_output .= "<a href=\"".$IMAGE_URL."images/uploaded_files/".$image[0]."\" title=\"".ucfirst($row_tip2[0]).",	".$lang_img2." ".$image[1]."\" class=\"thickbox\"><img src=\"".$IMAGE_URL."images/uploaded_files/th_".$image[0]."\" border=\"0\" class=\"preview_2\" alt=\"\"></a> ";
} else {
$image_output .= "<br>";
$image_output .= "<a href=\"".$IMAGE_URL."images/uploaded_files/".$image[0]."\" title=\"".ucfirst($row_tip2[0]).",	".$lang_img2." ".$image[1]."\" class=\"thickbox\"><img src=\"".$IMAGE_URL."images/uploaded_files/th_".$image[0]."\" border=\"0\" class=\"preview\" alt=\"\"></a> ";
}
$image_output .= "<br>";
$image_output .= "<span class=\"foto\">".$lang_img2."</span> <span class=\"nav\">".$image[1]."</span> <br>";
$image_output .= "<span class=\"foto\">".$lang_img3."</span> <span class=\"nav\">".$image[2]."</span>";
endwhile;
$buffer_tips.=  $image_output;
$oop9->FreeResult();
}
endwhile;
}
$oop4->FreeResult();
//if no pictures found
if (($num_tip==0) AND ($num_tip2==0)) {
$dict_keyword='ds_1_headword';
$sql = sprintf ('SELECT `keyword`, `num_keyword` FROM `%s`',
	$dict_keyword);
$oop4->Setnames();
$oop4->query($sql);
$num = $oop4->getNumrows();
// no headwords / no tips
if ($num==0) {
$buffer_tips=  '';	
} else {
$n= rand(1, $num);
while ($row = $oop4->FetchRow()):
$ee++;
if ($n==$ee) {
$view_keyword=$row[0];
$view_num_keyword=$row[1];
$_SESSION["d_h"]=$row[0];
$_SESSION["d_h_n"]=$row[1];
}
endwhile;
include './scripts/view_word_br_hvalur.php';

include './scripts/search_alpha_list.php';
$buffer_tips='';

$buffer_tips2.= " <div class=\"left\">";
$buffer_tips2.= $BUFFER_ALPHA_LIST;
$buffer_tips2.=  '</div>';

$buffer_tips.= $BUFFER_VIEW_KEYWORD;
$buffer_tips.=  '</div>';
}
$oop4->FreeResult();
} else {
$buffer_tips.=  '</div>';
$buffer_tips.=  '</div>';
$buffer_tips.=  "</div>";
}
$oop4->_mySQL;
$oop9->_mySQL;


?>
