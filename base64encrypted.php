<?php

class Base64_Encrypted{
/*
For URL encryption, change the key with this one:
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";

nota: it is possible to build the key with characters of their choice (key length must be equal to 64), while maintaining base64 encoding. Practice is not it?
In this case take care to adapt the regex accordingly (see bold line).
*/
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
public static function Crypter($a,$b,$d,$xx=4){
if($a==""||$b==""||$d==""||!is_int($xx))return $a;
$e=self::$clef;
$u=$t=$g="";
$lb=self::Unorder($e,mt_rand(0,2147483647).$b);
$oo=mt_rand(0,255);
for($i=1;$i<$xx+1;$i++){$fd=$lb{(int)self::Seed(63,chr($oo))};$oo=fmod($oo+=ord($fd)+$i+mt_rand(0,255),255);$u.=$fd;}
$c=strlen($a);
$s=$c-$c%3;
$l=self::Unorder($e,md5($b.$u,true));
$n=hexdec(substr(md5($d.$u),-8))&63;
for($r=$i=0;$i<$s;$i+=3,$r++){
$r=(int)fmod($r+=$n,58);
$g=(ord($a{$i}^$l{$r+1})<<16)+(ord($a{$i+1}^$l{$r+2})<<8)+(ord($a{$i+2}^$l{$r+3}));
$ha=$g>>18;$hb=$g>>12;$hc=$g>>6;
$t.=$l{$ha}.$l{$hb&63}.$l{$hc&63}.$l{$g&63};
$l=self::Passpass($l,$ha,$hb,$hc,$g,$r);}
switch($c-$s){
case 1:
$g=ord($a{$i}^$l{$r+4})<<16;
$t.=$l{$g>>18}.$l{($g>>12)&63};
break;
case 2:
$g=(ord($a{$i}^$l{$r+4})<<16)+(ord($a{$i+1}^$l{$r+5})<<8);
$t.=$l{$g>>18}.$l{($g>>12)&63}.$l{($g>>6)&63};
break;}
$c=strlen($t);
$r=$c-self::Seed($c-1,$b.$c);
return substr_replace($t,$u,-$r,-$r);}
public static function Decrypter($a,$b,$d,$xx=4){
/*
For URL encryption, change the regex with this one:
if(!preg_match("/^[A-z0-9_-]+$/",$a)||$b=="")return $a;
*/
if(!preg_match("/^[A-z0-9\/+]+$/",$a)||$b==""||$d==""||!is_int($xx))return $a;
$c=strlen($a)-$xx;
$mm=self::Seed($c-1,$b.$c);
$u=substr($a,$mm,-($c-$mm));
$a=substr($a,0,$mm).substr($a,-($c-$mm));
$e=self::$clef;
$l=self::Unorder($e,md5($b.$u,true));
$n=hexdec(substr(md5($d.$u),-8))&63;
$d=$g="";
$f=0;
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
for($r=$i=0;$i<$c;$i+=4,$r++){
$q=$e{strpos($l,$a{$i})}.$e{strpos($l,$a{$i+1})}.$e{strpos($l,$a{$i+2})}.$e{strpos($l,$a{$i+3})};
$ha=strpos($e,$q{0});$hb=strpos($e,$q{1});$hc=strpos($e,$q{2});$hd=strpos($e,$q{3});    
$g=($ha<<18)+($hb<<12)+($hc<<6)+$hd;    
$r=(int)fmod($r+=$n,58);    
$d.=(chr($g>>16)^$l{$r+1}).(chr(($g>>8)&255)^$l{$r+2}).(chr($g&255)^$l{$r+3});    
$l=self::Passpass($l,$ha,$hb,$hc,$hd,$r);}
switch($f){
case 1:
$q=$e{strpos($l,$a{$i})}.$e{strpos($l,$a{$i+1})}.$e{strpos($l,$a{$i+2})};
$g=(strpos($e,$q{0})<<18)+(strpos($e,$q{1})<<12)+(strpos($e,$q{2})<<6);
$d.=(chr($g>>16)^$l{$r+4}).(chr(($g>>8)&255)^$l{$r+5});
break;
case 2:
$q=$e{strpos($l,$a{$i})}.$e{strpos($l,$a{$i+1})};
$g=(strpos($e,$q{0})<<18)+(strpos($e,$q{1})<<12);
$d.=(chr($g>>16)^$l{$r+4});
break;}
return $d;}
private static function Passpass($l,$b,$c,$e,$d,$r){
$i=$l[$b];$l[$b]=$l[($r+6)&63];$l[($r+6)&63]=$i;
$i=$l[$c&63];$l[$c&63]=$l[($r+7)&63];$l[($r+7)&63]=$i;
$i=$l[$e&63];$l[$e&63]=$l[($r+8)&63];$l[($r+8)&63]=$i;
$i=$l[$d&63];$l[$d&63]=$l[($r+9)&63];$l[($r+9)&63]=$i;
return $l;}
private static function Unorder($x,$b,$c=64){
$w=0;$y=strlen($b);
for($i=0;$i<$c;$i++){
$w=($w+ord($x[$i])+ord($b[$i%$y]))%$c;
$j=$x[$i];$x[$i]=$x[$w];$x[$w]=$j;}
return $x;}
private static function Seed($b,$c){
return round(((hexdec(substr(md5($c),-8))&2147483647)/2147483647.0)*$b);}
}

?>
