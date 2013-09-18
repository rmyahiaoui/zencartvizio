<?php
	include_once('defines.php');
	function moduleidfromnameshort($moduleshort) {
          switch (strtolower($moduleshort)) {
               case "ap":
                    $module="1";
                    break;
               case "ar":
                    $module="2";
                    break;
               case "gl":
                    $module="3";
                    break;
               case "inv":
                    $module="4";
                    break;
               case "fix":
                    $module="5";
                    break;
               case "pay":
                    $module="6";
                    break;
               case "est":
                    $module="7";
                    break;
          };
          return $module;
     };

     function modulenameshort($moduleid) {
          switch ($moduleid) {
               case 1:
                    $module="ap";
                    break;
               case 2:
                    $module="ar";
                    break;
               case 3:
                    $module="gl";
                    break;
               case 4:
                    $module="inv";
                    break;
               case 5:
                    $module="fix";
                    break;
               case 6:
                    $module="pay";
                    break;
               case 7:
                    $module="est";
                    break;

          };
          return $module;
     };

     function modulename($module) {
          switch ($module) {
               case "ap":
                    $modulelong="Accounts Payable";
                    break;
               case "ar":
                    $modulelong="Accounts Receivable";
                    break;
               case "gl":
                    $modulelong="General Ledger";
                    break;
               case "pay":
                    $modulelong="Payroll";
                    break;
               case "inv":
                    $modulelong="Inventory";
                    break;
               case "fix":
                    $modulelong="Fixed Assets";
                    break;
               case "imp":
                    $modulelong="Imposition";
                    break;
               case "est":
                    $modulelong="Estimating";
                    break;
          };
          return $modulelong;
     };

        function statename($abbv) {
                global $conn;
                $recordSet=&$conn->Execute("select statename from genstate where stateinit=".sqlprep(strtoupper($abbv)));
                if (!$recordSet->EOF) {
                        return rtrim($recordSet->fields[0]);
                } else {
                        return $abbv;
                };
        };

        function statenamefromid($id) {
                global $conn;
                $recordSet=&$conn->Execute("select statename from genstate where id=".sqlprep($id));
                if (!$recordSet->EOF) {
                        return rtrim($recordSet->fields[0]);
                } else {
                        return $id;
                };
        };


        function stateselect($name, $default) {
                global $conn;
                $recordSet=&$conn->Execute("select id, statename from genstate order by statename");
                echo '<tr><td align="'.TABLE_LEFT_SIDE_ALIGN.'">State:</td><td><select name="'.$name.'"'.INC_TEXTBOX.'>';
                while (!$recordSet->EOF) {
                        echo '<option value="'.$recordSet->fields[0].'"'.checkequal($recordSet->fields[0],$default,' selected').'>'.rtrim($recordSet->fields[1]);
                        $recordSet->MoveNext();
                };
                echo '</select></td></tr>';
        };

     function sqlprep($string) {
#         return "'".str_replace("'", addslashes("'"), str_replace(";", "", $string))."'";

          return "'". addslashes(str_replace(";", "", $string)) ."'";
     };

     function num2month($monthid, $sql = 0) {
          while ($monthid>12) $monthid-=12;
          switch ($monthid) {
               case 1:
                    $monthname="jan";
                    break;
               case 2:
                    $monthname="feb";
                    break;
               case 3:
                    $monthname="mar";
                    break;
               case 4:
                    $monthname="apr";
                    break;
               case 5:
                    $monthname="may";
                    break;
               case 6:
                    $monthname="jun";
                    break;
               case 7:
                    $monthname="jul";
                    break;
               case 8:
                    $monthname="aug";
                    break;
               case 9:
                    $monthname="sep";
                    break;
               case 10:
                    $monthname="oct";
                    break;
               case 11:
                    $monthname="nov";
                    break;
               case 12:
                    $monthname="decm";
                 break;
          };
          if (!$sql) $monthname = strtoupper(substr($monthname, 0, 3));
          return $monthname;
     };

     function month2monthlong($month) {
          switch ($month) {
               case "JAN":
                    $monthlong="January";
                    break;
               case "FEB":
                    $monthlong="February";
                    break;
               case "MAR":
                    $monthlong="March";
                    break;
               case "APR":
                    $monthlong="April";
                    break;
               case "MAY":
                    $monthlong="May";
                    break;
               case "JUN":
                    $monthlong="June";
                    break;
               case "JUL":
                    $monthlong="July";
                    break;
               case "AUG":
                    $monthlong="August";
                    break;
               case "SEP":
                    $monthlong="September";
                    break;
               case "OCT":
                    $monthlong="October";
                    break;
               case "NOV":
                    $monthlong="November";
                    break;
               case "DEC":
                    $monthlong="December";
                    break;
          };
          return $monthlong;
     };

     function num_format($number, $digits) {
          return str_replace(",","",number_format($number,$digits));
     };

     function checkzero($number) {
       if (($number>=0&&$number<0.01)||($number<=0&&$number>-0.01)) {
          return true;
       } else {
          return false;
       };
     };

     function texterror($string) {
          return '<font size="+1"><center><b>'.$string."</b></center></font><br>\n";
     };

     function textsuccess($string) {
          return $string."<br>\n";
     };

     function texttitle($string) {
          return '<font size="+1"><center><b>'.$string."</b></center></font><br>\n";
     };

     function texttooltip($name,$string) {
            if (SHOW_TOOLTIPS) return '<DIV id="'.$name.'" class="hidden"><table><tr><td><font class="tooltip">'.$string.'</font></td></tr></table></DIV>';
     };
     function tooltiplink($name) {
            if (SHOW_TOOLTIPS) return 'onmouseover="toggle(\''.addslashes($name).'\')" onmouseout="toggle(\''.addslashes($name).'\')"';
     };
     function tooltip($string) {
            if (SHOW_TOOLTIPS) return  'onmouseover="return overlib(\''.addslashes($string).'\');" onmouseout="return nd();"';
     };
     function createtime($format) {
                //$format should be a standard php date format like 'm/d/Y'
                $timestamp =  time();
                $date_time_array = getdate($timestamp);
                $hours =  $date_time_array["hours"];
                $minutes =  $date_time_array["minutes"];
                $seconds =  $date_time_array["seconds"];
                $month =  $date_time_array["mon"];
                $day =  $date_time_array["mday"];
                $year =  $date_time_array["year"];
                $timestamp =  mktime($hours, $minutes, $seconds, $month, $day, $year);
                return date($format, $timestamp);
     };

     function showwhochanged($id,$whichtable,$fieldname) {
              global $conn;
              $recordSet=&$conn->Execute("select lastchangedate, lastchangeuserid from ".$whichtable." where ".$fieldname."=".sqlprep($id));
              if (!$recordSet->EOF) {
                    $lastchangeuserid=$recordSet->fields[1];
                    $lastchangedate=$recordSet->fields[0];
                    echo texterror("COULD NOT UPDATE because ".getname($lastchangeuserid)." made changes ".substr($lastchangedate,4,2)."/".substr($lastchangedate,6,2)."/".substr($lastchangedate,0,4)." ".substr($lastchangedate,8,2).":".substr($lastchangedate,10,2)." to this same record while you were working on your changes.");
              };
     };

      function barcodedisplay($output, $barcode, $type, $width, $height, $xres, $font) {
            //this is actually well documented.  check includes/barcode/barcode.php for more info.
            //this function requires includes/barcode/barcode.php, as well as the one for the $type you specified
            //e.g. code 39 also requires /includes/barcode/c39object.php .
            if (!isset($output))  $output   = BARCODE_IMAGE_TYPE;
            if (!isset($barcode)) $barcode  = "0";
            if (!isset($type))    $type     = BARCODE_CODE_TYPE;
            if (!isset($width))   $width    = BARCODE_IMAGE_WIDTH;
            if (!isset($height))  $height   = BARCODE_IMAGE_HEIGHT;
            if (!isset($xres))    $xres     = BARCODE_IMAGE_XRES;
            if (!isset($font))    $font     = BARCODE_IMAGE_FONT;

            //code 39 doesn't like lower case letters
            if ($type=="C39") $barcode=strtoupper($barcode);

            if (isset($barcode) && strlen($barcode)>0) {
                  $style  = BCS_ALIGN_CENTER;
                  $style |= ($output  == "png" ) ? BCS_IMAGE_PNG  : 0;
                  $style |= ($output  == "jpeg") ? BCS_IMAGE_JPEG : 0;
                  $style |= ($border  == "on"  ) ? BCS_BORDER         : 0;
                  $style |= ($drawtext== "on"  ) ? BCS_DRAW_TEXT  : 0;
                  $style |= ($stretchtext== "on" ) ? BCS_STRETCH_TEXT  : 0;
                  $style |= ($negative== "on"  ) ? BCS_REVERSE_COLOR  : 0;
                  switch ($type)
                  {
                        case "I25":
                              $obj = new I25Object(250, 120, $style, $barcode);
                              break;
                        case "C39":
                              $obj = new C39Object(250, 120, $style, $barcode);
                              break;
                        case "C128A":
                              $obj = new C128AObject(250, 120, $style, $barcode);
                              break;
                        case "C128B":
                              $obj = new C128BObject(250, 120, $style, $barcode);
                              break;
                        default:
                              $obj = false;
                  }
                  if ($obj) {
                        if ($obj->DrawObject($xres)) {
                              return "<img src='includes/barcode/image.php?code=".$barcode."&style=".$style."&type=".$type."&width=".$width."&height=".$height."&xres=".$xres."&font=".$font."'>";
                        } else {
                              echo texterror($obj->GetError());
                              return 0;
                        };
                  };
            };
      };

      function retrievefile($inputfile,$outputfile) {
     //copies contents of one file into another.  Allows input file to be URL.
            $fp1 = @fopen($inputfile, "r");
            $fp2 = @fopen($outputfile, "w");
            if ($fp1&&$fp2) {
                $size=4096;
                while (!feof($fp1)) {
                      $buffer=fread($fp1,$size);
                      fputs($fp2,$buffer);
                };
                fclose($fp1);
                fclose($fp2);
                return 1;
           } else {
                return 0;
           };
      };


     function getname($userid) {
          global $conn;
          $recordSet=&$conn->Execute("select name from genuser where id=".sqlprep($userid));
          if (!$recordSet->EOF) {
               return rtrim($recordSet->fields[0]);
          } else {
               return 0;
          };
     };

     function checkpermissions($modulenameshort) {
          global $usersupervisor, ${$modulenameshort."_write"};
          if (!${$modulenameshort."_write"}&&!$usersupervisor) {
               die(texterror('Failed!  No permissions to write to '.modulename($modulenameshort).'.'));
               return 0; //unnecessary
          } else {
               return 1;
          };
     };

     function pwencrypt($str) { //encrypt the str, if we can.  if not, return it md5 hashed
          if (extension_loaded("mcrypt")) { //try blowfish
               $key = md5($str);
               $td = mcrypt_module_open(MCRYPT_BLOWFISH, "", MCRYPT_MODE_ECB, "");
               $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
               mcrypt_generic_init($td, $key, $iv);
               $str = mcrypt_generic($td, $str);
               mcrypt_generic_end($td);
          } else { //do md5
              $str=md5($str);
          };
          return substr(bin2hex($str),0,64); //return max of 64 chars, as that is max of db

     };

     function checkequal($one,$two,$ret) {
        //this function is useful for preselecting select boxes and check boxes.
        // it tests the first two arguments for equality (non-strict), and if true, returns the third argument
        //example - echo '<option value="'.$recordSet->fields[0].'"'.checkequal($markupsetid,$recordSet->fields[0]," selected").'>'.$recordSet->fields[1]."\n";
          if ($one==$two) return $ret;
     };

     function checkdec($number, $decimalplaces) {
          if ($number==num_format($number,$decimalplaces)) $number=num_format($number,$decimalplaces);
          return $number;
     };


     function getaddress($zipcode) { //return text city, st given a zipcode
          global $conn;
          while (strpos($zipcode,"0")==="0") {
              $zipcode=substr($zipcode,1);
          };
          $recordSet=&$conn->Execute("select city,state from zipcode where zip=".sqlprep($zipcode));
          if (!$recordSet->EOF) return rtrim($recordSet->fields[0]).', '.rtrim($recordSet->fields[1]);
     };

        function easteregg($da) { //print a message according to date (used in footer)
                switch ($da) {
                        case 1225:
                                return 'Merry Christmas';
                                break;
                        case 0704:
                                return 'Happy July 4th';
                                break;
                        case 0101:
                                return 'Happy New Year';
                                break;
                };
        };

        // function to format mySQL DATETIME values
        function fixDate($val) {
                //split it up into components
                $arr = explode(" ", $val);
                $timearr = explode(":", $arr[1]);
                $datearr = explode("-", $arr[0]);
                // create a timestamp with mktime(), format it with date()
                return date("d M Y (H:i)", mktime($timearr[0], $timearr[1], $timearr[2], $datearr[1], $datearr[2], $datearr[0]));
        };

        function capstest($str) {
                if (ABNORMAL_CAPS) {
                        return strtoupper($str);
                } else {
                        return $str;
                };
        };

        function numtotext($num) {
            $num=strval(strrev(num_format($num,2))); //make num a string, and reverse it, because we run through it backwards
            $skip=0;
            $start=0;
            $aa=array();
            for ($i=-strlen($num);$i<0;$i++) { //substitute for any 10-19's that should come out
                unset($astr);
                if (substr($num, $i, 1)==1&&(strlen($num)+$i)%3==1) {
                            switch (substr($num, $i-1, 1)) { //get second digit
                                case '0':
                                    $aa[]='ten ';
                                    break;
                                case '1':
                                    $aa[]='eleven ';
                                    break;
                                case '2':
                                    $aa[]='twelve ';
                                    break;
                                case '3':
                                    $aa[]='thirteen ';
                                    break;
                                case '4':
                                    $aa[]='fourteen ';
                                    break;
                                case '5':
                                    $aa[]='fifteen ';
                                    break;
                                case '6':
                                    $aa[]='sixteen ';
                                    break;
                                case '7':
                                    $aa[]='seventeen ';
                                    break;
                                case '8':
                                    $aa[]='eighteen ';
                                    break;
                                case '9':
                                    $aa[]='nineteen ';
                                    break;
                            };
                            $num=substr_replace($num,'xx', $i-1,2);
                            $skip=1;
                            $start=-1; //need to start one earlier to compensate
                };
            };
            for ($i=-strlen($num)+$start;$i<0;$i++) {
                unset($astr);
                if (!$skip) {
                 switch (substr($num, $i, 1)) {
                    case '1':
                        if ((strlen($num)+$i)%3==1) {
                            //dunno
                        } else {
                            $astr='one ';
                        };
                        break;
                    case '2':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='twenty ';
                        } else {
                            $astr='two ';
                        };
                        break;
                    case '3':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='thirty ';
                        } else {
                            $astr='three ';
                        };
                        break;
                    case '4':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='forty ';
                        } else {
                            $astr='four ';
                        };
                        break;
                    case '5':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='fifty ';
                        } else {
                            $astr='five ';
                        };
                        break;
                    case '6':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='sixty ';
                        } else {
                            $astr='six ';
                        };
                        break;
                    case '7':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='seventy ';
                        } else {
                            $astr='seven ';
                        };
                        break;
                    case '8':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='eighty ';
                        } else {
                            $astr='eight ';
                        };
                        break;
                    case '9':
                        if ((strlen($num)+$i)%3==1) {
                            $astr='ninety ';
                        } else {
                            $astr='nine ';
                        };
                        break;
                    case '0':
                        if ((strlen($num)+$i)==1&&substr($num, $i-1, 2)=='00') { //don't display 0, except if cents=0
                            $astr='no ';
                            $skip=1;
                        };
                        break;
                    case 'x':
                        $astr=current($aa);
                        next($aa);
                        $skip=1;
                        break;
                 };
                } else {
                    $skip--;
                };
                $str=$astr.n2tmod(strlen($num)+$i+1).$str;
            };
            if (substr($str,0,3)=="dol") { //check for zero dollars
                $str="Zero ".$str;
            };
            return $str;
        };

        function n2tmod($pos) {
            switch ($pos) {
                case '1':
                    return 'cents ';
                    break;
                case '3':
                    return 'dollars and ';
                    break;
                case '6':
                    return 'hundred ';
                    break;
                case '7':
                    return 'thousand ';
                    break;
                case '9':
                    return 'hundred ';
                    break;
                case '10':
                    return 'million ';
                    break;
                case '12':
                    return 'hundred ';
                    break;
            };
        };


     function creditcardval($num, $name = 'n/a') {
        $goodcard=true;
        $num=ereg_replace("[^[:digit:]]", "", $num); //Get rid of any non-digits
        switch ($name) { //Perform card-specific checks, if applicable
            case "mcd": //mastercard
                $goodcard=ereg("^5[1-5].{14}$", $num);
                break;
            case "vis": //visa
                $goodcard=ereg("^4.{15}$|^4.{12}$", $num);
                break;
            case "amx": //american express
                $goodcard=ereg("^3[47].{13}$", $num);
                break;
            case "dsc": //discover/novus
                $goodcard=ereg("^6011.{12}$", $num);
                break;
            case "dnc": //diners club
                $goodcard=ereg("^30[0-5].{11}$|^3[68].{12}$", $num);
                break;
            case "jcb": //JCB
                $goodcard=ereg("^3.{15}$|^2131|1800.{11}$", $num);
                break;
        }
        $num=strrev($num); //The Luhn formula works right to left, so reverse the number.
        $total=0;
        for ($x=0; $x<strlen($num); $x++) {
            $digit=substr($num,$x,1);
            if ($x/2!=floor($x/2)) { //If it's an odd digit, double it
                $digit*=2;
                if (strlen($digit)==2) $digit=substr($digit,0,1)+substr($digit,1,1); //    If the result is two digits, add them
            };
            $total+=$digit; //Add the current digit, doubled and added if applicable, to the Total
        };

        //If it passed (or bypassed) the card-specific check and the total is
        //evenly divisible by 10, it's ok
        if ($goodcard&&$total%10==0) return true; else return false;
     };

     function dynimage($text, $size = '15', $font = 'TIMES.TTF', $transparent = 1, $border = 0, $bg = COLOR_BG1, $t1 = COLOR_FG, $t2 = COLOR_FG_ACCENT) {
         if (extension_loaded("gd")&&EXPLAIN_SHOW_AS_IMAGE) {
             $text = urlencode($text);
             $bg = urlencode($bg);
             $t1 = urlencode($t1);
             $t2 = urlencode($t2);
             return '<img src="images/dyntext.php?text='.$text.'&font='.$font.'&s='.$size.'&bg='.$bg.'&t1='.$t1.'&t2='.$t2.'&trans='.$transparent.'" border="'.$border.'">';
         } else {
             return $text;
         };
     };


     function dynimagerollover($href, $text, $size = '15', $font = 'TIMES.TTF', $transparent1 = 1, $transparent2 = 1, $border = 0, $bg1 = COLOR_BG1, $bg2 = COLOR_BG2, $t1 = COLOR_FG, $t2 = COLOR_FG_ACCENT) {
         //generate dynamic image
         if (extension_loaded("gd")&&EXPLAIN_SHOW_AS_IMAGE) {
             if (ImageTypes()&IMG_PNG) {
                 $text = urlencode($text);
                 $bg1 = urlencode($bg1);
                 $bg2 = urlencode($bg2);
                 $t1 = urlencode($t1);
                 $t2 = urlencode($t2);
                 return "<a href=\"".$href."\" onMouseOver=\"imgchange('".$text."','images/dyntext.php?text=".$text."&font=".$font."&s=".$size."&bg=".$bg2."&t1=".$t2."&t2=".$t1."&trans=".$transparent2."');\" onMouseOut=\"imgchange('".$text."','images/dyntext.php?text=".$text."&font=".$font."&s=".$size."&bg=".$bg1."&t1=".$t1."&t2=".$t2."&trans=".$transparent1."');\"><img src=\"images/dyntext.php?text=".$text."&font=".$font."&s=".$size."&bg=".$bg1."&t1=".$t1."&t2=".$t2."&trans=".$transparent1."\" border=\"".$border."\" name=\"".$text."\"></a>";
             };
         } else {
             return "<a href=\"".$href."\">".$text."</a>";
         };
     };

     function dynimagerolloveraddl($imgleft, $imgright, $href, $text, $size = '14', $font = 'TIMES.TTF', $transparent1 = 1, $transparent2 = 1, $border = 0, $bg1 = COLOR_BG1, $bg2 = COLOR_BG2, $t1 = COLOR_FG, $t2 = COLOR_FG_ACCENT) {
         //generate dynamic image rollover from text, and optionally include images to left and/or right
         if (extension_loaded("gd")&&EXPLAIN_SHOW_AS_IMAGE) {
             if (ImageTypes()&IMG_PNG) {
                 $text = urlencode($text);
                 $bg1 = urlencode($bg1);
                 $bg2 = urlencode($bg2);
                 $t1 = urlencode($t1);
                 $t2 = urlencode($t2);
                 $foo="<a href=\"".$href."\" onMouseOver=\"imgchange('".$text."','images/dyntext.php?text=".$text."&font=".$font."&s=".$size."&bg=".$bg2."&t1=".$t2."&t2=".$t1."&trans=".$transparent2."');\" onMouseOut=\"imgchange('".$text."','images/dyntext.php?text=".$text."&font=".$font."&s=".$size."&bg=".$bg1."&t1=".$t1."&t2=".$t2."&trans=".$transparent1."');\">";
                 if ($imgleft) $foo.="<img src=\"".$imgleft."\" border=\"0\">";
                 $foo.="<img src=\"images/dyntext.php?text=".$text."&font=".$font."&s=".$size."&bg=".$bg1."&t1=".$t1."&t2=".$t2."&trans=".$transparent1."\" border=\"".$border."\" name=\"".$text."\">";
                 if ($imgright) $foo.="<img src=\"".$imgright."\" border=\"0\">";
                 $foo.="</a>";
             } else {
                 $foo="<a href=\"".$href."\">";
                 if ($imgleft) $foo.="<img src=\"".$imgleft."\" border=\"0\">";
                 $foo.=$text;
                 if ($imgright) $foo.="<img src=\"".$imgright."\" border=\"0\">";
                 $foo.="</a>";
             };
         } else {
             $foo="<a href=\"".$href."\">";
             if ($imgleft) $foo.="<img src=\"".$imgleft."\" border=\"0\">";
             $foo.=$text;
             if ($imgright) $foo.="<img src=\"".$imgright."\" border=\"0\">";
             $foo.="</a>";
         };
         return $foo;
     };

     function dynbuttonrollover($href, $text, $size = '10', $font = MENU_FONT, $transparent1 = 1, $transparent2 = 1, $border = 0, $bg1 = COLOR_BG1, $bg2 = COLOR_BG2, $t1 = MENU_COLOR1, $t2 = MENU_COLOR2) {
         //generate dynamic image
         if ($text=="LOG OUT") {
             $target="_parent";
         } else {
             $target="main";
         };
         if (extension_loaded("gd")&&MENU_SHOW_AS_IMAGE) {
             if (ImageTypes()&IMG_PNG) {
                 $bg1 = urlencode($bg1);
                 $bg2 = urlencode($bg2);
                 $t1 = urlencode($t1);
                 $t2 = urlencode($t2);
        		 $iname = strtr($text, "` .!/+", "______");
                 $ctext=strtr($text, "` .!/+", "______");
        		 $i1 = dynmenubutton_demand_gen($PHP_SELF . $iname . "1", "images/blankwhitebutton".$foo.".png", $text, $t1, $font);
         		 $i2 = dynmenubutton_demand_gen($PHP_SELF . $iname . "2", "images/blankwhitebutton".$foo.".png", $text, $t2, $font);
                 return "<script language=\"JavaScript\">\nif (document.images) {\n".$ctext."1= new Image();\n".$ctext."1.src=\"".$i1."\";\n".$ctext."2= new Image();\n".$ctext."2.src=\"".$i2."\";\n}\n</script>\n<a target=\"".$target."\" href=\"".$href."\" onMouseOver=\"imgchange2('".$ctext."', '".$ctext."2');\" onMouseOut=\"imgchange2('".$ctext."', '".$ctext."1');\"> <img src=\"" . $i1 . "\" border=\"".$border."\" name=\"".$ctext."\"> </a>\n";
             } else {
                 return "<a target=\"".$target."\" href=\"".$href."\">".$text."</a><br>";
             };
         } else {
             return "<a target=\"".$target."\" href=\"".$href."\">".$text."</a><br>";
         };
     };

     function navlinks() {
         global $docfilename, $conn;
         $recordSet=&$conn->Execute('select menucategory.id, menucategory.name, menufunction.link, menufunction.name from menupage left join menufunction on menupage.menufunctionid=menufunction.id left join menucategory on menufunction.menucategoryid=menucategory.id where menupage.name='.sqlprep($docfilename).' order by menucategory.id desc');
         if ($recordSet&&!$recordSet->EOF) {
               $foo='<a href="start.php">Home</a> > <a href="explain.php?menucategoryid='.$recordSet->fields[0].'">'.rtrim($recordSet->fields[1]).'</a> > ';
               if ($recordSet->fields[2]<>$docfilename) {
                   $foo.='<a href="'.rtrim($recordSet->fields[2]).'">'.rtrim($recordSet->fields[3]).'</a>';
               } else {
                   $foo.=rtrim($recordSet->fields[3]);
               };
               $foo.='<br>';
               return $foo;
         };
     };

//usage - images/dynmenubutton.php?image=image.png&text=text[&t1=000000][&font=times.ttf]
// functionalized by Todd Lewis, 19 February 2002
// Description: returns the location of the corresponding image file.
// If doesn't exist at invocation, this function demand-generates it.
// It is the invokers respondibility to make cachehandle a unique quantity.
// Ideally you would combing $PHP_SELF with your line number, but I can't
// find a PHP variable for line number, so you're on your own.

function dynmenubutton_demand_gen($cachehandle, $passedimage, $text, $t1, $font) {

  $froot = dirname(__FILE__) . "/../";             // assumes we're in includes/defines.php
  $ifile = "/images/cache/" . $cachehandle . ".png"; // URL
  $ffile = $froot . $ifile;                        // file path

  // If cached image exists and is newer than 5 minutes, return it.
  if( (file_exists($ffile) && $p=stat($ffile)) && ($p[10] > (time() - 300)) )  {
     return($ifile);
  }

  // Oh well, we need to create the image.

  if(!isset($font)) $font='ARIAL.TTF';
  if(!isset($text)) $text='text not set';
  if(!isset($s)) $s=10;
//$passedimage='temp/blankwhitebutton.png';
  $im = imagecreatefrompng($passedimage); //create a image from the image passed
  if(isset($bg)) {
      $bg=unhexize($bg);
      $bg10=$bg[0];
      $bg11=$bg[1];
      $bg12=$bg[2];
  } else {
      $bg10=255;
      $bg11=255;
      $bg12=255;
  };
  if(isset($t1)) {
      $t1=unhexize($t1);
      $t10=$t1[0];
      $t11=$t1[1];
      $t12=$t1[2];
  } else {
      $t10=0;
      $t11=0;
      $t12=0;
  };
//  $transcolor=imagecolorat(0,0);
  $transcolor=imagecolorat($im,0,0);
  imagecolorset ($im, 21, $bg10, $bg11, $bg12);
  if ($bg10-33>0) $bg20=$bg10-33;
  if ($bg11-33>0) $bg21=$bg11-33;
  if ($bg12-33>0) $bg22=$bg12-33;
  imagecolorset ($im, 11, $bg20, $bg21, $bg22); //shadow

  $t1c = ImageColorAllocate($im, $t10,$t11,$t12);
  if (strlen($text)>13) {
     $fredsize = imagettfbbox($s-3,0, FONT_PATH.'/'.$font,$text);
     if(!isset($dx))  $dx = abs($fredsize[2]-$fredsize[0]);
     if(!isset($dy))  $dy = abs($fredsize[5]-$fredsize[3]);
     $x=imagesx($im)/2-$dx/2-1;
     $y=imagesy($im)/2+$dy/2+1;
     ImageTTFText($im, $s-3, 0, $x, $y, $t1c, FONT_PATH.'/'.$font, $text);
  } else {
     $fredsize = imagettfbbox($s,0, FONT_PATH.'/'.$font,$text);
     if(!isset($dx))  $dx = abs($fredsize[2]-$fredsize[0]);
     if(!isset($dy))  $dy = abs($fredsize[5]-$fredsize[3]);
     $x=imagesx($im)/2-$dx/2-1;
     $y=imagesy($im)/2+$dy/2+1;
     ImageTTFText($im, $s, 0, $x, $y, $t1c, FONT_PATH.'/'.$font, $text);
  };
  imageinterlace ($im, 1); //interlace image if it is a jpeg
  Imagepng($im, $ffile);
  ImageDestroy($im);
  return($ifile);
};


     function unhexize ($color) {
        $color=hexdec($color);
        $red=($color&0xFF0000)>>16;
        $green = ($color&0xFF00)>>8;
        $blue = ($color&0xFF);
        return array ($red, $green, $blue);
     };

     function inv($num) { //return inverse of number
          if ($num>0) {
              $num=0-$num;
          } elseif ($num<0) {
              $num=abs($num);
          };
          return $num;
          echo $num."\n";
     };

function tr ( $en_words , $fr_words )
{

 global $language;

  if ( $language == "en" )
  {
    return stripslashes($en_words);
  }
  else
  {
    return stripslashes($fr_words);
  }
}

function get_checkbox ( $name, $value, $prompt_en='', $prompt_fr='' )
{

  if  ( ($prompt_en)&&($prompt_fr) )
  {
     $prompt = tr ( $prompt_en , $prompt_fr );
  }
  else
  {
     $prompt = stripslashes($prompt_en);
  }
  if ($value==0)
  {
     $sel='';
  }
  else
  {
     $sel='CHECKED';
  }
  if ($prompt_en)
  {
    return '<tr><td>'.$prompt.'</td>
           <td><input type="checkbox"  name="'.$name.'" '.$sel .'  value="1"></td></tr>';
  }
  else
  {
    return '<input type="checkbox"  name="'.$name.'" '.$sel .'  value="1">';
  }

}
// r�cup�re le texte  -------------------------------------------
function get_text ( $name, $value, $prompt_en='', $prompt_fr='', $size='' )
{

  if  ( ($prompt_en)&&($prompt_fr) )
  {
     $prompt = tr ( $prompt_en , $prompt_fr );
  }
  else
  {
     $prompt = stripslashes($prompt_en);
  }
  // la taille ------------------------
  if ($size)
  {
     $size_html = 'size="'. $size.'"';
  }

  if ($prompt_en)
  {
    return '<tr><th>'.$prompt.'</th>
           <td><input type="text"  name="'.$name.'"  value="'.$value.'" '. $size_html .' ></td></tr>';
  }
  else
  {
    return '<input type="text"  name="'.$name.'"  value="'.$value.'"'. $size_html .'>';
  }
}
// ---------------------------------------------------
// r�cup�re le text area  -------------------------------------------
function get_area ( $name, $value, $prompt_en='', $prompt_fr='' )
{

  if  ( ($prompt_en)&&($prompt_fr) )
  {
     $prompt = tr ( $prompt_en , $prompt_fr );
  }
  else
  {
     $prompt = stripslashes($prompt_en);
  }
  // la taille ------------------------
  if ($size)
  {
     $size_html = 'size="'. $size.'"';
  }

  if ($prompt_en)
  {
    return '<tr><th>'.$prompt.'</th>
           <td><textarea rows="7" cols="60" name="'.$name.'">'.$value.'</textarea></td></tr>';
  }
  else
  {
    return '<textarea rows="7" cols="60"   name="'.$name.'">'.$value.'</textarea>';
  }
}

//---------------------------------------------------
function nvl( $value, $remplace )
{

  if  ( is_null ( $value )  )
  {
     return $remplace;
  }
  else
  {
     return $value;
  }
}
function get_select ( $sql_stmt, $name, $value, $prompt_en='', $prompt_fr='' , $select_attributes='' )
{

  global $conn;
  if  ( ($prompt_en)&&($prompt_fr) )
  {
    $prompt = stripslashes(tr ( $prompt_en , $prompt_fr ));
  }
  else
  {
     $prompt = stripslashes($prompt_en);
  }

  if   ($prompt_en)
  {
    $start_html = '<tr><th>'.$prompt.'</th> <td>' ;
    $end_html =   '</td></tr>'  ;
  }
  else
  {
    $start_html =  '';
    $end_html =  '';
  }


   $recordSet = &$conn->Execute( $sql_stmt );

#   if ($recordSet->EOF) die(texterror('Get select returns no value.'));

   $html =  '<select  name="'.$name.'" '. $select_attributes .'>';
   $html .= '<option value=""></option>';

            while (!$recordSet->EOF) {
                 $html .=  '<option ';
                 if ($value)
                 {
                    if ($value==$recordSet->fields[0])
                    {
                         $html .=  ' SELECTED ';
                    }
                 }
                    $html .=  ' value="'.$recordSet->fields[0].'">'. stripslashes ( $recordSet->fields[1] ) ."\n";
                 $recordSet->MoveNext();
              };
      $html .=  '</select> ';

      return $start_html . $html . $end_html;
}
function get_tab_html ( $tab_ids , $tab_labels,  $p_sel_tab=0 )
{
       #  gestion des onglets
       # il doit y avoir un formulaire au nom de frm qui doit contenir un hidden au non de p_sel_tab
       # t_ids et $t_labels pr�sentent une liste avec des s�parateurs virgule

	  $tab_header_html = '<DIV ALIGN="RIGHT"><TABLE  BORDER="0" CELLPADDING="0" CELLSPACING="0"><TR>';

	  $sel_tab_html =
	  '<TD>
	  <TABLE  BORDER="0" HEIGHT="100%" WIDTH="100%" CELLPADDING="0" CELLSPACING="0">
	  <TR>
	  <TD class="LeftTabForeSlant" valign="top" align="left" width="10" height="19" NOWRAP="" >&nbsp;</TD>
	  <td valign="middle" nowrap class="TabForegroundColor">&nbsp;&nbsp;<FONT class="TabForegroundText">#TAB_LABEL#</FONT>&nbsp;&nbsp;</td>
	  <TD align="right" class="RightTabForeCurve" width="8" NOWRAP="">&nbsp;&nbsp;</TD>
	  </TR>
	  </TABLE>
	  </TD>';

	  $unsel_tab_html =
	  '<TD>
	  <TABLE  BORDER="0" HEIGHT="100%" WIDTH="100%" CELLPADDING="0" CELLSPACING="0">
	  <TR>
	  <TD class="LeftTabBgSlant" valign="top" align="left" width="10" height="19" NOWRAP="">&nbsp;</TD>
	  <td valign="middle" NOWRAP class="TabBackgroundColor">&nbsp;&nbsp;<A HREF="javascript:document.frm.p_sel_tab.value=#TAB_ID#;document.frm.submit();"><FONT class="TabBackgroundText">#TAB_LABEL#</FONT></A>&nbsp;&nbsp;</td>
	  <TD align="right" class="RightTabBgCurve" width="8" NOWRAP="">&nbsp;&nbsp;</TD>
	  </TR>
	  </TABLE>
	  </TD>';

	  $tab_footer_html =
	  '</TR>
	  </TABLE>
	  <TABLE  WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" class="TabForegroundColor">
	  <TR>
	  <TD  class="TabForegroundColor"><IMG SRC="/images/pobtrans.gif" BORDER="0" HEIGHT="3"></TD></TR>
	  </TABLE>
	  </DIV>';

	  $t_ids = explode(",",$tab_ids);
	  $t_labels = explode(",",$tab_labels);

	  $nbr = count($t_ids);

	  reset($t_ids);
	  reset($t_labels);

	  if ( $p_sel_tab==0 )
	  {
		$p_sel_tab = current($t_ids);
	  }

	  $tabs_html = $tab_header_html;
	  # Deroulement du tableau

	  for($i=1; $i<=$nbr; $i++)
	  {
		$tab_id=current($t_ids);
		$tab_lab=current($t_labels);

		if ( $tab_id == $p_sel_tab  )
		{
		   $tabs_html .=  str_replace( '#TAB_LABEL#' , $tab_lab , $sel_tab_html );
		}
		else
		{
		   $temp =  str_replace( '#TAB_ID#' , $tab_id , $unsel_tab_html );
		   $tabs_html .=  str_replace( '#TAB_LABEL#' , $tab_lab , $temp );
		}
		next($t_ids);
		next($t_labels);
	  }
	  $tabs_html .= $tab_footer_html;
   return $tabs_html;
 }
function exec_select ( $sql_stmt )
{
  global $conn;

  $recordSet = &$conn->Execute($sql_stmt);
	if (is_object($recordSet))
		$resp = $recordSet->fields[0];
	else
		$resp = NULL;
  return($resp);
}
// renvoie les libelles transform�s ------------------------------------------------------------
function replace_labels ( $string_with_labels, $module_id, $p_lang )
{
  global $conn;

  $sql = 'select label_code, label_'.$p_lang. ' from sx_module_label where module_id = ' . $module_id;

  $recordSet = &$conn->Execute( $sql );

  $temp  = $string_with_labels;
//echo $sql;exit;
  while (!$recordSet->EOF)
  {
    $label_code = stripslashes($recordSet->fields[0]);
    $label_text = stripslashes($recordSet->fields[1]);

    $temp = str_replace( '~'.$label_code.'~',$label_text,$temp);
    //echo $temp;exit;

    $recordSet->MoveNext();
  };

  return($temp);
}

?>