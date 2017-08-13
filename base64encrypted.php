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
$u=array("","");
if($xx){$u=self::Hashich("",6,true,true);$u=array(Base64_Encrypted::Crypter($u,$b,$mdb," ",false,false),$u);}
$l=self::Unorder(self::$clef,self::Hashich($u[1].substr($b,0,58),64,true));
$n=self::Hashich($u[1].$mda);$j=self::Hashich($n);$na=$js=self::Hashich($j);
$c=strlen($a);
$s=$c-$c%3;$t=$g="";
for($i=0;$i<$s;$i+=3){
if($yy)$js=((($js<<5)-$js)+ord($a{$i})+ord($a{$i+1})+ord($a{$i+2}))%2147483647;
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
if($yy)$js=((($js<<5)-$js)+ord($a{$i}))%2147483647;
$g=ord($a{$i}^chr((($n<<5)-$n)%2147483647))<<16;
$he=(($g>>18)+($j=(($j<<5)-$j)%2147483647))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>12)+(($j<<5)-$j)%2147483647)&63};
break;
case 2:
if($yy)$js=((($js<<5)-$js)+ord($a{$i})+ord($a{$i+1}))%2147483647;
$g=(ord($a{$i}^chr($n=(($n<<5)-$n)%2147483647))<<16)+(ord($a{$i+1}^chr((($n<<5)-$n)%2147483647))<<8);
$he=(($g>>18)+($j=(($j<<5)-$j)%2147483647))&63;
$hf=(($g>>12)+($j=(($j<<5)-$j)%2147483647))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hf};$iq=$l{$hf};$l{$hf}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>6)+(($j<<5)-$j)%2147483647)&63};
break;}
$c=strlen($t);
if($yy){$ir=Base64_Encrypted::Crypter(chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr((($js<<5)-$js)%2147483647),$b,$u[1].$mdb," ",false,false);$t=substr_replace($t,$ir,self::Seed($c,$u[0].$mdb),0);$c+=8;}
return substr_replace($t,$u[0],self::Seed($c,$c.$mdb),0);}
public static function Decrypter($a,$b,$mda,$mdb,$yy=false,$xx=true){
/*
For URL encryption, change the regex with this one:
if(!preg_match("/^[A-z0-9_-]+$/",$a)||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))die("Wrong input!");
*/
if(!preg_match("/^[A-z0-9\/+]+$/",$a)||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx))die("Wrong input!");
$c=strlen($a);
$da=$g=$u=$di="";
if($xx){
$c-=8;
$mm=self::Seed($c,$c.$mdb);
$uu=substr($a,$mm,8);
$u=Base64_Encrypted::Decrypter($uu,$b,$mdb," ",false,false);
$pr=substr($a,-($c-$mm));
$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);}
if($yy){
$c-=8;
$mm=self::Seed($c,$uu.$mdb);
$di=Base64_Encrypted::Decrypter(substr($a,$mm,8),$b,$u.$mdb," ",false,false);
$pr=substr($a,-($c-$mm));
$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);}
$f=0;
$l=self::Unorder(self::$clef,self::Hashich($u.substr($b,0,58),64,true));
$n=self::Hashich($u.$mda);$j=self::Hashich($n);$na=$js=self::Hashich($j);
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
for($i=0;$i<$c;$i+=4){
$ha=strpos($l,$a{$i});$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$hb=strpos($l,$a{$i+1});$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$hc=strpos($l,$a{$i+2});$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$hd=strpos($l,$a{$i+3});$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($ha-($j=(($j<<5)-$j)%2147483647))&63)<<18)+((($hb-($j=(($j<<5)-$j)%2147483647))&63)<<12)+((($hc-($j=(($j<<5)-$j)%2147483647))&63)<<6)+(($hd-($j=(($j<<5)-$j)%2147483647))&63);
$e=(chr($g>>16)^chr($n=(($n<<5)-$n)%2147483647)).(chr($g>>8)^chr($n=(($n<<5)-$n)%2147483647)).(chr($g)^chr($n=(($n<<5)-$n)%2147483647));
if($yy)$js=((($js<<5)-$js)+ord($e{0})+ord($e{1})+ord($e{2}))%2147483647;
$da.=$e;}
switch($f){
case 1:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$hf=strpos($l,$a{$i+1});$iq=$l{$hf&63};$l{$hf&63}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=(($j<<5)-$j)%2147483647))&63)<<18)+((($hf-($j=(($j<<5)-$j)%2147483647))&63)<<12)+(((strpos($l,$a{$i+2})-(($j<<5)-$j)%2147483647)&63)<<6);
$e=(chr($g>>16)^chr($n=(($n<<5)-$n)%2147483647)).(chr($g>>8)^chr((($n<<5)-$n)%2147483647));
if($yy)$js=((($js<<5)-$js)+ord($e{0})+ord($e{1}))%2147483647;
$da.=$e;
break;
case 2:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=(($j<<5)-$j)%2147483647))&63)<<18)+(((strpos($l,$a{$i+1})-(($j<<5)-$j)%2147483647)&63)<<12);
$e=chr($g>>16)^chr((($n<<5)-$n)%2147483647);
if($yy)$js=((($js<<5)-$js)+ord($e{0}))%2147483647;
$da.=$e;
break;}
return $yy?(chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr($js=(($js<<5)-$js)%2147483647).chr((($js<<5)-$js)%2147483647)!=$di?die("Corrupted data!"):$da):$da;}
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
