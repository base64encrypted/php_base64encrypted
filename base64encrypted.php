<?php
class Base64_Encrypted{
private static $clef="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
private static $val=0;
public static function Crypter($a,$b,$mda,$mdb,$yy=false,$ww=false,$xx=true){
if($a==""||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($ww)||!is_bool($xx)){header("Location: https://www.jadorre.com");die("go");}
$u=array("","");
if($xx){$u=self::Hashich("",6,true,true);$u=array(Base64_Encrypted::Crypter($u,$b,$mdb," ",false,$ww,false),$u);}
$l=self::Unorder($ww?strtr(self::$clef,"+/","_-"):self::$clef,self::Hashich($u[1].substr($b,0,58),64,true));
$j=$jz=self::Hashich($u[1].$mda);$na=$js=self::Hashich($u[1].$j);
$c=strlen($a);
self::$val=-67108865;
$s=$c-$c%3;$t=$g="";
for($i=0;$i<$s;$i+=3){
if($yy)$js=((($js<<5)-$js)-(ord($a{$i})+ord($a{$i+1})+ord($a{$i+2})))%2080374784;
$g=(ord($a{$i})<<16)+(ord($a{$i+1})<<8)+(ord($a{$i+2}));
$ha=(($g>>18)+($j=self::Chaining($j)))&63;
$hb=(($g>>12)+($j=self::Chaining($j)))&63;
$hc=(($g>>6)+($j=self::Chaining($j)))&63;
$hd=($g+($j=self::Chaining($j)))&63;
$t.=$l{$ha};$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hb};$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hc};$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hd};$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;}
switch($c-$s){
case 1:
if($yy)$js=((($js<<5)-$js)-ord($a{$i}))%2080374784;
$g=ord($a{$i})<<16;
$he=(($g>>18)+($j=self::Chaining($j)))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>12)+self::Chaining($j))&63};
break;
case 2:
if($yy)$js=((($js<<5)-$js)-(ord($a{$i})+ord($a{$i+1})))%2080374784;
$g=(ord($a{$i})<<16)+(ord($a{$i+1})<<8);
$he=(($g>>18)+($j=self::Chaining($j)))&63;
$hf=(($g>>12)+($j=self::Chaining($j)))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hf};$iq=$l{$hf};$l{$hf}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>6)+self::Chaining($j))&63};
break;}
$c=strlen($t);
if($yy){$ir=Base64_Encrypted::Crypter(self::Loop($js,$jz),$b,$u[1].$mdb," ",false,$ww,false);$t=substr_replace($t,$ir,self::Seed($c,$u[0].$mdb),0);$c+=8;}
return substr_replace($t,$u[0],self::Seed($c,$c.$mdb),0);}
public static function Decrypter($a,$b,$mda,$mdb,$yy=false,$ww=false,$xx=true){
if(!($ww?preg_match("/^[A-Za-z0-9_-]+$/",$a):preg_match("/^[A-Za-z0-9\/+]+$/",$a))||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($xx)){header("Location: https://www.jadorre.com");die("go");}
$c=strlen($a);
$da=$g=$u=$di=$uu="";
if($xx){
$c-=8;
$mm=self::Seed($c,$c.$mdb);
$uu=substr($a,$mm,8);
$u=Base64_Encrypted::Decrypter($uu,$b,$mdb," ",false,$ww,false);
$pr=substr($a,-($c-$mm));
$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);}
if($yy){
$c-=8;
$mm=self::Seed($c,$uu.$mdb);
$di=Base64_Encrypted::Decrypter(substr($a,$mm,8),$b,$u.$mdb," ",false,$ww,false);
$pr=substr($a,-($c-$mm));
$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);}
$f=0;
$l=self::Unorder($ww?strtr(self::$clef,"+/","_-"):self::$clef,self::Hashich($u.substr($b,0,58),64,true));
$j=$jz=self::Hashich($u.$mda);$na=$js=self::Hashich($u.$j);
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
self::$val=-67108865;
for($i=0;$i<$c;$i+=4){
$ha=strpos($l,$a{$i});$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$hb=strpos($l,$a{$i+1});$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$hc=strpos($l,$a{$i+2});$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$hd=strpos($l,$a{$i+3});$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($ha-($j=self::Chaining($j)))&63)<<18)+((($hb-($j=self::Chaining($j)))&63)<<12)+((($hc-($j=self::Chaining($j)))&63)<<6)+(($hd-($j=self::Chaining($j)))&63);
$e=(chr($g>>16)).(chr($g>>8)).(chr($g));
if($yy)$js=((($js<<5)-$js)-(ord($e{0})+ord($e{1})+ord($e{2})))%2080374784;
$da.=$e;}
switch($f){
case 1:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$hf=strpos($l,$a{$i+1});$iq=$l{$hf&63};$l{$hf&63}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=self::Chaining($j)))&63)<<18)+((($hf-($j=self::Chaining($j)))&63)<<12)+(((strpos($l,$a{$i+2})-self::Chaining($j))&63)<<6);
$e=(chr($g>>16)).(chr($g>>8));
if($yy)$js=((($js<<5)-$js)-(ord($e{0})+ord($e{1})))%2080374784;
$da.=$e;
break;
case 2:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=self::Chaining($j)))&63)<<18)+(((strpos($l,$a{$i+1})-self::Chaining($j))&63)<<12);
$e=chr($g>>16);
if($yy)$js=((($js<<5)-$js)-ord($e{0}))%2080374784;
$da.=$e;
break;}
return $yy?(self::Loop($js,$jz)!=$di?false:$da):$da;}
private static function Loop($js,$jz){
$a="";
for($i=1;$i<4;$i++){$a.=chr($js=((int)substr($js<<5,0,-1)-($js+$i))%2080374784);}
$js=($js+$jz)%2080374784;
for($i=4;$i<7;$i++){$a.=chr($js=((int)substr($js<<5,0,-1)-($js+$i))%2080374784);}
return $a;}
private static function Chaining($j){
$j=(((int)substr($j<<5,0,-1)-$j)-(self::$val+=1))%2080374784;
self::$val%=67108866;
return $j;}
private static function Hashich($b,$e=0,$y=false,$z=false){
$b=(string)$b;$a=0;$p="";$l=strlen($b);$e=$y?$e:$l;
for($ii=$i=0;$i<$e;$i++,$ii++){$a=(((int)substr($a<<5,0,-1)-$a)-($z?mt_rand(0,255):ord($b{$ii})))%2080374784;if($y){$p.=chr((int)$a);if($ii>=$l-1)$ii=-1;}}
return $y?$p:(int)$a;}
private static function Unorder($x,$b,$c=64){
$w=0;$y=strlen($b);$t=$b;
for($i=0;$i<$c;$i++){$w=($w+ord($x{$i})+ord($b{$i%$y}))%$c;$j=$x{$i};$x{$i}=$x{$w};$x{$w}=$j;}
return $x;}
private static function Seed($b,$c){
return round(((self::Hashich($c)&2147483647)/2147483647.0)*$b);} 
}
?>
