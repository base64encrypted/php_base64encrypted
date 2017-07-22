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
$n=hexdec(substr(md5($d.$u),-8))&255;$na=hexdec(substr(md5($d.substr($d,0,1).$u),-8))&63;$nb=hexdec(substr(md5($d.substr($d,-1,1).$u),-8))&63;
for($ri=$si=$r=$i=0;$i<$s;$i+=3,$r++,$si++,$ri++){
$r=(int)fmod($r+=$n,255);$si=(int)fmod($si+=$nb,63);$ri=(int)fmod($ri+=$na,63);
$g=(ord($a{$i}^chr($r+=$n))<<16)+(ord($a{$i+1}^chr($r+=$n))<<8)+(ord($a{$i+2}^chr($r+=$n)));
$ha=(($g>>18)+($si+=$nb))&63;$hb=(($g>>12)+($si+=$nb))&63;$hc=(($g>>6)+($si+=$nb))&63;$hd=($g+($si+=$nb))&63;
$t.=$l{$ha};$iq=$l[$ha];$l[$ha]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$t.=$l{$hb};$iq=$l[$hb];$l[$hb]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$t.=$l{$hc};$iq=$l[$hc];$l[$hc]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$t.=$l{$hd};$iq=$l[$hd];$l[$hd]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;}
switch($c-$s){
case 1:
$g=ord($a{$i}^chr($r+$n))<<16;
$he=(($g>>18)+($si+=$nb))&63;
$t.=$l{$he};$iq=$l[$he];$l[$he]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$t.=$l{(($g>>12)+($si+$nb))&63};
break;
case 2:
$g=(ord($a{$i}^chr($r+=$n))<<16)+(ord($a{$i+1}^chr($r+$n))<<8);
$he=(($g>>18)+($si+=$nb))&63;
$t.=$l{$he};$iq=$l[$he];$l[$he]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$hf=(($g>>12)+($si+=$nb))&63;
$t.=$l{$hf};$iq=$l[$hf];$l[$hf]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$t.=$l{(($g>>6)+($si+$nb))&63};
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
$n=hexdec(substr(md5($d.$u),-8))&255;$na=hexdec(substr(md5($d.substr($d,0,1).$u),-8))&63;$nb=hexdec(substr(md5($d.substr($d,-1,1).$u),-8))&63;
$d=$g="";
$f=0;
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
for($ri=$si=$r=$i=0;$i<$c;$i+=4,$r++,$si++,$ri++){
$ri=(int)fmod($ri+=$na,63);
$ha=strpos($l,$a{$i});$iq=$l[$ha];$l[$ha]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$hb=strpos($l,$a{$i+1});$iq=$l[$hb&63];$l[$hb&63]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$hc=strpos($l,$a{$i+2});$iq=$l[$hc&63];$l[$hc&63]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$hd=strpos($l,$a{$i+3});$iq=$l[$hd&63];$l[$hd&63]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$si=(int)fmod($si+=$nb,63);
$g=(strpos($e,$e{($ha-($si+=$nb))&63})<<18)+(strpos($e,$e{($hb-($si+=$nb))&63})<<12)+(strpos($e,$e{($hc-($si+=$nb))&63})<<6)+strpos($e,$e{($hd-($si+=$nb))&63});    
$r=(int)fmod($r+=$n,255);
$d.=(chr($g>>16)^chr($r+=$n)).(chr(($g>>8)&255)^chr($r+=$n)).(chr($g&255)^chr($r+=$n));}
switch($f){
case 1:
$he=strpos($l,$a{$i});$iq=$l[$he];$l[$he]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$hf=strpos($l,$a{$i+1});$iq=$l[$hf&63];$l[$hf&63]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$g=(strpos($e,$e{($he-($si+=$nb))&63})<<18)+(strpos($e,$e{($hf-($si+=$nb))&63})<<12)+(strpos($e,$e{(strpos($l,$a{$i+2})-($si+$nb))&63})<<6);
$d.=(chr($g>>16)^chr($r+=$n)).(chr(($g>>8)&255)^chr($r+$n));
break;
case 2:
$he=strpos($l,$a{$i});$iq=$l[$he];$l[$he]=$l[($ri+=$na)&63];$l[($ri)&63]=$iq;
$g=(strpos($e,$e{($he-($si+=$nb))&63})<<18)+(strpos($e,$e{(strpos($l,$a{$i+1})-($si+$nb))&63})<<12);
$d.=chr($g>>16)^chr($r+$n);
break;}
return $d;}
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
