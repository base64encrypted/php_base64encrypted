<?php
class Base64_Encrypted{
/*
For URL encryption, change the key with this one:
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";

nota: it is possible to build the key with characters of their choice (key length must be equal to 64), while maintaining base64 encoding. Practice is not it?
In this case take care to adapt the regex accordingly (see bold line).
*/
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
public static function Crypter($a,$b,$mda,$mdb,$yy=false,$xx=true){
if($a==""||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))die("Wrong input!");
$u=$xx?self::Uranc($b,$mdb):array("","");
$c=strlen($a);
if($yy){$a=substr_replace($a,substr(hash("md4",$u[1].$a,true),self::Seed(10,$u[0].$mdb),6),self::Seed($c,$u[1].$mdb),0);$c+=6;}
$l=self::Unorder(self::$clef,self::Hashich($u[1].substr($b,0,58),64,true));
$n=self::Hashich($u[1].$mda);$j=self::Hashich($n);$na=self::Hashich($j);
$s=$c-$c%3;$t=$g="";
for($i=0;$i<$s;$i+=3){
$g=(ord($a{$i}^chr($n=(($n<<5)-$n)%2147483647))<<16)+(ord($a{$i+1}^chr($n=(($n<<5)-$n)%2147483647))<<8)+(ord($a{$i+2}^chr($n=(($n<<5)-$n)%2147483647)));
$ha=(($g>>18)+($j=(($j<<5)-$j)%2147483647))&63;
$hb=(($g>>12)+($j=(($j<<5)-$j)%2147483647))&63;
$hc=(($g>>6)+($j=(($j<<5)-$j)%2147483647))&63;
$hd=($g+($j=(($j<<5)-$j)%2147483647))&63;
$t.=$l{$ha};$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hb};$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hc};$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hd};$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;}
switch($c-$s){
case 1:
$g=ord($a{$i}^chr((($n<<5)-$n)%2147483647))<<16;
$he=(($g>>18)+($j=(($j<<5)-$j)%2147483647))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>12)+(($j<<5)-$j)%2147483647)&63};
break;
case 2:
$g=(ord($a{$i}^chr($n=(($n<<5)-$n)%2147483647))<<16)+(ord($a{$i+1}^chr((($n<<5)-$n)%2147483647))<<8);
$he=(($g>>18)+($j=(($j<<5)-$j)%2147483647))&63;
$hf=(($g>>12)+($j=(($j<<5)-$j)%2147483647))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hf};$iq=$l{$hf};$l{$hf}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>6)+(($j<<5)-$j)%2147483647)&63};
break;}
$c=strlen($t);
return substr_replace($t,$u[0],self::Seed($c,$c.$mdb),0);}
public static function Decrypter($a,$b,$mda,$mdb,$yy=false,$xx=true){
/*
For URL encryption, change the regex with this one:
if(!preg_match("/^[A-z0-9_-]+$/",$a)||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))die("Wrong input!");
*/
if(!preg_match("/^[A-z0-9\/+]+$/",$a)||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))die("Wrong input!");
$c=strlen($a);
$da=$g=$u="";
if($xx){
$c-=8;
$mm=self::Seed($c,$c.$mdb);
$uu=substr($a,$mm,8);
$pr=substr($a,-($c-$mm));
$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);
$u=Base64_Encrypted::Decrypter($uu,$b,$mdb," ",false,false);}
$l=self::Unorder(self::$clef,self::Hashich($u.substr($b,0,58),64,true));
$n=self::Hashich($u.$mda);$j=self::Hashich($n);$na=self::Hashich($j);
$f=0;
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
for($i=0;$i<$c;$i+=4){
$ha=strpos($l,$a{$i});$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$hb=strpos($l,$a{$i+1});$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$hc=strpos($l,$a{$i+2});$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$hd=strpos($l,$a{$i+3});$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($ha-($j=(($j<<5)-$j)%2147483647))&63)<<18)+((($hb-($j=(($j<<5)-$j)%2147483647))&63)<<12)+((($hc-($j=(($j<<5)-$j)%2147483647))&63)<<6)+(($hd-($j=(($j<<5)-$j)%2147483647))&63);
$da.=(chr($g>>16)^chr($n=(($n<<5)-$n)%2147483647)).(chr($g>>8)^chr($n=(($n<<5)-$n)%2147483647)).(chr($g)^chr($n=(($n<<5)-$n)%2147483647));}
switch($f){
case 1:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$hf=strpos($l,$a{$i+1});$iq=$l{$hf&63};$l{$hf&63}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=(($j<<5)-$j)%2147483647))&63)<<18)+((($hf-($j=(($j<<5)-$j)%2147483647))&63)<<12)+(((strpos($l,$a{$i+2})-(($j<<5)-$j)%2147483647)&63)<<6);
$da.=(chr($g>>16)^chr($n=(($n<<5)-$n)%2147483647)).(chr($g>>8)^chr((($n<<5)-$n)%2147483647));
break;
case 2:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=(($j<<5)-$j)%2147483647))&63)<<18)+(((strpos($l,$a{$i+1})-(($j<<5)-$j)%2147483647)&63)<<12);
$da.=chr($g>>16)^chr((($n<<5)-$n)%2147483647);
break;}
if($yy){
$c=strlen($da)-6;
$mm=self::Seed($c,$u.$mdb);
$pr=substr($da,-($c-$mm));
$a=substr($da,0,$mm).(strlen($pr)==$c+6?"":$pr);
$da=substr(hash("md4",$u.$a,true),self::Seed(10,$uu.$mdb),6)!=substr($da,$mm,6)?die("Corrupted data!"):$a;}
return $da;}
private static function Uranc($b,$mdb){
$u=self::Hashich("",6,true,true);
return array(Base64_Encrypted::Crypter($u,$b,$mdb," ",false,false),$u);}
private static function Hashich($b,$e=0,$y=false,$z=false){
$b=(string)$b;$a=2166136261;$p="";$l=strlen($b);$e=$y?$e:$l;
for($ii=$i=0;$i<$e;$i++,$ii++){$a^=$z?mt_rand(0,255):ord($b{$ii});$a+=(($a<<1)+($a<<4)+($a<<7)+($a<<8)+($a<<24))%2147483647;if($y){$p.=chr((int)$a);if($ii>=$l-1)$ii=-1;}}
return $y?$p:(int)$a;}
private static function Unorder($x,$b,$c=64){
$w=0;$y=strlen($b);$t=$b;
for($i=0;$i<$c;$i++){$w=($w+ord($x{$i})+ord($b{$i%$y}))%$c;$j=$x{$i};$x{$i}=$x{$w};$x{$w}=$j;}
return $x;}
private static function Seed($b,$c){
return round(((self::Hashich($c)&2147483647)/2147483647.0)*$b);} 
}
?>
