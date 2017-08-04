<?php
class Base64_Encrypted{
/*
For URL encryption, change the key with this one:
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";

nota: it is possible to build the key with characters of their choice (key length must be equal to 64), while maintaining base64 encoding. Practice is not it?
In this case take care to adapt the regex accordingly (see bold line).
*/
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
public static function Crypter($a,$b,$d,$mda,$mdb,$yy=false,$xx=true){
if($a==""||$b==""||$d==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))return $a;
$u=$xx?self::Uranc($b,$d,$mda):array("","");
$c=strlen($a);
if($yy){$a=substr_replace($a,substr(hash("md4",$a.$u[1],true),self::Seed(10,$mdb.$u[1]),6),self::Seed($c,$u[1].$mdb),0);$c+=6;}
$e=self::$clef;
$l=self::Unorder($e,self::keylen($u[1].$b,3));
$li=self::Unorder(range(0,255),self::keylen($u[1].$d,15),256);
$n=self::Hashich($u[1].$mda);$nb=self::Hashich($n);$na=self::Hashich($nb);
$s=$c-$c%3;$t=$g="";
for($n=$n,$na=$na,$nb=$nb,$i=0;$i<$s;$i+=3,$n++,$na++,$nb++){
$n=(int)fmod($n,256);$nb=(int)fmod($nb,256);$na=(int)fmod($na,64);
$g=(ord($a{$i}^chr($li{$n++&255}))<<16)+(ord($a{$i+1}^chr($li{$n++&255}))<<8)+(ord($a{$i+2}^chr($li{$n++&255})));
$ha=(($g>>18)+($li{$nb++&255}))&63;$hb=(($g>>12)+($li{$nb++&255}))&63;$hc=(($g>>6)+($li{$nb++&255}))&63;$hd=($g+($li{$nb++&255}))&63;
$t.=$l{$ha};$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hb};$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hc};$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hd};$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;}
switch($c-$s){
case 1:
$g=ord($a{$i}^chr($li{$n++&255}))<<16;
$he=(($g>>18)+($li{$nb++&255}))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>12)+($li{$nb++&255}))&63};
break;
case 2:
$g=(ord($a{$i}^chr($li{$n++&255}))<<16)+(ord($a{$i+1}^chr($li{$n++&255}))<<8);
$he=(($g>>18)+($li{$nb++&255}))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$hf=(($g>>12)+($li{$nb++&255}))&63;
$t.=$l{$hf};$iq=$l{$hf};$l{$hf}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>6)+($li{$nb++&255}))&63};
break;}
$c=strlen($t);
return substr_replace($t,$u[0],self::Seed($c,$mdb.$c),0);}
public static function Decrypter($a,$b,$d,$mda,$mdb,$yy=false,$xx=true){
/*
For URL encryption, change the regex with this one:
if(!preg_match("/^[A-z0-9_-]+$/",$a)||$b==""||$d==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))return $a;
*/
if(!preg_match("/^[A-z0-9\/+]+$/",$a)||$b==""||$d==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))return $a;
$c=strlen($a);
$da=$g=$u="";
if($xx){
$c-=8;
$mm=self::Seed($c,$mdb.$c);
$u=substr($a,$mm,8);
$pr=substr($a,-($c-$mm));
$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);
$u=Base64_Encrypted::Decrypter($u,$b,$d,$mda," ",false,false);}
$e=self::$clef;
$l=self::Unorder($e,self::keylen($u.$b,3));
$li=self::Unorder(range(0,255),self::keylen($u.$d,15),256);
$n=self::Hashich($u.$mda);$nb=self::Hashich($n);$na=self::Hashich($nb);
$f=0;
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
for($n=$n,$na=$na,$nb=$nb,$i=0;$i<$c;$i+=4,$n++,$na++,$nb++){
$na=(int)fmod($na,64);
$ha=strpos($l,$a{$i});$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$hb=strpos($l,$a{$i+1});$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$hc=strpos($l,$a{$i+2});$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$hd=strpos($l,$a{$i+3});$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;
$nb=(int)fmod($nb,256);
$g=(strpos($e,$e{($ha-($li{$nb++&255}))&63})<<18)+(strpos($e,$e{($hb-($li{$nb++&255}))&63})<<12)+(strpos($e,$e{($hc-($li{$nb++&255}))&63})<<6)+strpos($e,$e{($hd-($li{$nb++&255}))&63});
$n=(int)fmod($n,256);
$da.=(chr($g>>16)^chr($li{$n++&255})).(chr(($g>>8)&255)^chr($li{$n++&255})).(chr($g&255)^chr($li{$n++&255}));}
switch($f){
case 1:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$hf=strpos($l,$a{$i+1});$iq=$l{$hf&63};$l{$hf&63}=$l{$na=$na++&63};$l{$na}=$iq;
$g=(strpos($e,$e{($he-($li{$nb++&255}))&63})<<18)+(strpos($e,$e{($hf-($li{$nb++&255}))&63})<<12)+(strpos($e,$e{(strpos($l,$a{$i+2})-($li{$nb++&255}))&63})<<6);
$da.=(chr($g>>16)^chr($li{$n++&255})).(chr(($g>>8)&255)^chr($li{$n++&255}));
break;
case 2:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$g=(strpos($e,$e{($he-($li{$nb++&255}))&63})<<18)+(strpos($e,$e{(strpos($l,$a{$i+1})-($li{$nb++&255}))&63})<<12);
$da.=chr($g>>16)^chr($li{$n++&255});
break;}
if($yy){
$c=strlen($da)-6;
$mm=self::Seed($c,$u.$mdb);
$pr=substr($da,-($c-$mm));
$a=substr($da,0,$mm).(strlen($pr)==$c+6?"":$pr);
$da=substr(hash("md4",$a.$u,true),self::Seed(10,$mdb.$u),6)!=substr($da,$mm,6)?die("Corrupted data !"):$a;}
return $da;}
private static function Uranc($b,$d,$mda){
$u="";$oo=mt_rand(0,255);
for($i=1;$i<7;$i++){$fd=chr($oo);$q=2147483647-($oo+$i);$oo=self::Hashich(fmod($oo+=$oo+$i+mt_rand(0,$q),$q))&255;$u.=$fd;}
return array(Base64_Encrypted::Crypter($u,$b,$d,$mda," ",false,false),$u);}
private static function Hashich($ke){
$ke=(string)$ke;
$a=0;
$l=strlen($ke);
for($i=0;$i<$l;$i++){$h=$a<<5;$h-=$a;$h+=ord($ke{$i});$a=$h;$a&=4294967295;}
return $a;}
private static function keylen($a,$b){
$y=hash("md4",$a,true);
for($i=0;$i<$b;$i++){$y.=hash("md4",$y,true);}
return $y;}
private static function Unorder($x,$b,$c=64){
$w=0;$y=strlen($b);$t=$b;
for($i=0;$i<$c;$i++){$w=($w+ord($x{$i})+ord($b{$i%$y}))%$c;$j=$x{$i};$x{$i}=$x{$w};$x{$w}=$j;}
return $x;}
private static function Seed($b,$c){return round((self::Hashich($c)&2147483647/2147483647.0)*$b);} 
}
?>
