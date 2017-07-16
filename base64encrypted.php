<?php

class Base64_Encrypted{
/*
For URL encryption, change the key with this one:
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";

nota: it is possible to build the key with characters of their choice (key length must be equal to 64), while maintaining base64 encoding. Practice is not it?
In this case take care to adapt the regex accordingly (see bold line).
*/
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
public static function Crypter($a,$b,$xx=4){
if($a==""||$b==""||!is_int($xx))return $a;
$e=self::$clef;
$u="";
$lb=self::Unorder($e,mt_rand(0,2147483647).$b,64);
$oo=chr(mt_rand(0,255));
for($i=0;$i<$xx;$i++){
$fd=$lb{(int)self::Seed(63,$oo)};
$oo=$fd^$oo;$u.=$fd;}
$f=md5($b.$u);
$l=self::Unorder($e,$f,64);
$t=$g="";
$c=strlen($a);
$s=$c-$c%3;
$mi=hexdec(substr($f,-8))&2147483647;
$n=$mi%64;
for($r=$i=0;$i<$s;$i+=3,$r++){
$nr=($n+$r)%2147483642;
$g=(ord($a{$i}^$l{($nr+1)%64})<<16)+(ord($a{$i+1}^$l{($nr+2)%64})<<8)+(ord($a{$i+2}^$l{($nr+3)%64}));
$t.=$l{$g>>18}.$l{($g>>12)&63}.$l{($g>>6)&63}.$l{$g&63};
srand($mi);$l=str_shuffle($l); /* OR $l=self::Unorder($l,$f,64); but slow without native function... */
}
switch($c-$s){
case 1:
$g=ord($a{$i}^$l{($nr+4)%64})<<16;
$t.=$l{$g>>18}.$l{($g>>12)&63};
break;
case 2:
$g=(ord($a{$i}^$l{($nr+4)%64})<<16)+(ord($a{$i+1}^$l{($nr+5)%64})<<8);
$t.=$l{$g>>18}.$l{($g>>12)&63}.$l{($g>>6)&63};
break;}
$c=strlen($t);
$r=$c-self::Seed($c-1,$b.$c);
return substr_replace($t,$u,-$r,-$r);}
public static function Decrypter($a,$b,$xx=4){
/*
For URL encryption, change the regex with this one:
if(!preg_match("/^[A-z0-9_-]+$/",$a)||$b=="")return $a;
*/
if(!preg_match("/^[A-z0-9\/+]+$/",$a)||$b==""||!is_int($xx))return $a;
$c=strlen($a)-$xx;
$mm=self::Seed($c-1,$b.$c);
$u=substr($a,$mm,-($c-$mm));
$a=substr($a,0,$mm).substr($a,-($c-$mm));
$e=self::$clef;
$ff=md5($b.$u);
$mi=hexdec(substr($ff,-8))&2147483647;
$m=$mi%64;
$l=self::Unorder($e,$ff,64);
$d=$g="";
$f=0;
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
for($r=$i=0;$i<$c;$i+=4,$r++){
$q=$e{strpos($l,$a{$i})}.$e{strpos($l,$a{$i+1})}.$e{strpos($l,$a{$i+2})}.$e{strpos($l,$a{$i+3})};
$g=(strpos($e,$q{0})<<18)+(strpos($e,$q{1})<<12)+(strpos($e,$q{2})<<6)+(strpos($e,$q{3}));
$nr=($m+$r)%2147483642;
$d.=(chr($g>>16)^$l{($nr+1)%64}).(chr(($g>>8)&255)^$l{($nr+2)%64}).(chr($g&255)^$l{($nr+3)%64});
srand($mi);$l=str_shuffle($l); /* OR $l=self::Unorder($l,$ff,64); but slow without native function... */
}
switch($f){
case 1:
$q=$e{strpos($l,$a{$i})}.$e{strpos($l,$a{$i+1})}.$e{strpos($l,$a{$i+2})};
$g=(strpos($e,$q{0})<<18)+(strpos($e,$q{1})<<12)+(strpos($e,$q{2})<<6);
$d.=(chr($g>>16)^$l{($nr+4)%64}).(chr(($g>>8)&255)^$l{($nr+5)%64});
break;
case 2:
$q=$e{strpos($l,$a{$i})}.$e{strpos($l,$a{$i+1})};
$g=(strpos($e,$q{0})<<18)+(strpos($e,$q{1})<<12);
$d.=(chr($g>>16)^$l{($nr+4)%64});
break;}
return $d;}
private static function Unorder($x,$b,$c){
$w=0;$y=strlen($b);
for($i=0;$i<$c;$i++){
$w=($w+ord($x[$i])+ord($b[$i%$y]))%$c;
$j=$x[$i];$x[$i]=$x[$w];$x[$w]=$j;}
return $x;}
private static function Seed($b,$c){
$d=unpack("Na",hash("crc32",$c,true));
return round((($d['a']&2147483647)/2147483647.0)*$b);}
}
?>
