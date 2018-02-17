<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

class FubarController extends Controller {

    public function romParse() {

        $fname = 'C:\Program Files (x86)\CAPCOM\BIOHAZARD 2 PC\pl0\Rdt\ROOM1000.RDT';


        $romFile = fopen($fname, 'rb') or die('UnAbLe To OpEn');
     //   dd(filesize($fname));

        $array = fread($romFile,172000);
        // $seekval = fseek($array, 22);
           $integers = array();


          fclose($romFile);

          dd('File Size = '.filesize($fname).self::hex_dump($array));


// foreach ($array as $val) {

        // }

        return view('Welcome', ['rom' => $array]);
    }


    public function hex_dump($data, $newline="\n")
    {
      static $from = '';
      static $to = '';

      static $width = 16; # number of bytes per line

      static $pad = '.'; # padding for non-visible characters

      if ($from==='')
      {
        for ($i=0; $i<=0xFF; $i++)
        {
          $from .= chr($i);
          $to .= ($i >= 0x20 && $i <= 0x7E) ? chr($i) : $pad;
        }
      }

      $hex = str_split(bin2hex($data), $width*2);

      $offset = 0;
      foreach ($hex as $i => $line)
      {
        echo sprintf('%6X',$offset).' '.implode(' ', str_split($line,2));
        $offset += $width;
      }
    }





}
