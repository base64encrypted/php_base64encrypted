<?php
class Base64_Encrypted{
private static $clef='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
private static $val=0;
public static function Crypter($a,$b,$mda,$mdb,$yy=false,$ww=false,$xx=true){
if($a==""||$b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($ww)||!is_bool($xx))die("error parameter");
$u=array("","");
if($xx){$u=function_exists("random_bytes")?random_bytes(6):(function_exists("openssl_random_pseudo_bytes")?openssl_random_pseudo_bytes(6):(function_exists("mcrypt_create_iv")?mcrypt_create_iv(6,MCRYPT_DEV_URANDOM):(@file_exists("/dev/urandom")?file_get_contents("/dev/urandom",NULL,NULL,mt_rand(0,100),6):die("No way to generate random bytes"))));$rho=self::Range_a(67108864,$u.$b,false);$rha=self::Range_a(2080374784,$u,false);$u=array(Base64_Encrypted::Crypter($u,$b,$mdb," ",false,$ww,false),$u);}else{$rho=self::Range_a(67108864,$mda.$b,false);$rha=self::Range_a(2080374784,$b.$mda,false);}
$l=self::Unorder($ww?strtr(self::$clef,"+/","_-"):self::$clef,self::Key_exp($rha,$u[1].substr($b,0,58)));
$j=$jz=self::Range_a(2080374784,$u[1].$mda,false);$na=$js=self::Range_a(2080374784,mb_strrev($mda.$u[1]),false);
$c=strlen($a);
self::$val=$rho;
$s=$c-$c%3;$t=$g="";
for($i=0;$i<$s;$i+=3){
$aa=ord($a{$i});$bb=ord($a{$i+1});$cc=ord($a{$i+2});
if($yy)$js=($js+$aa+$bb+$cc)%2080374784;
$g=($aa<<16)+($bb<<8)+$cc;
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
$aa=ord($a{$i});
if($yy)$js=($js+$aa)%2080374784;;
$g=$aa<<16;
$he=(($g>>18)+($j=self::Chaining($j)))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>12)+self::Chaining($j))&63};
break;
case 2:
$aa=ord($a{$i});$bb=ord($a{$i+1});
if($yy)$js=($js+$aa+$bb)%2080374784;
$g=($aa<<16)+($bb<<8);
$he=(($g>>18)+($j=self::Chaining($j)))&63;
$hf=(($g>>12)+($j=self::Chaining($j)))&63;
$t.=$l{$he};$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{$hf};$iq=$l{$hf};$l{$hf}=$l{$na=$na++&63};$l{$na}=$iq;
$t.=$l{(($g>>6)+self::Chaining($j))&63};
break;}
$c=strlen($t);
if($yy){$ir=Base64_Encrypted::Crypter(self::Loop_S($js,$jz),$b,$u[1].$mdb," ",false,$ww,false);$t=substr_replace($t,$ir,self::Range_a($c,$u[0].$mdb,true),0);$c+=8;}
return substr_replace($t,$u[0],self::Range_a($c,$c.$mdb,true),0);}
public static function Decrypter($a,$b,$mda,$mdb,$yy=false,$ww=false,$xx=true){
if($b==""||$mda==""||$mdb==""||!is_bool($yy)||!is_bool($ww)||!is_bool($xx))die("error parameter");
if(!($ww?preg_match("/^[A-Za-z0-9_-]+$/",$a):preg_match("/^[A-Za-z0-9\/+]+$/",$a))){if($yy)return false;else die("data error");}
$c=strlen($a);
$da=$g=$u=$di=$uu="";
if($xx){$c-=8;$mm=self::Range_a($c,$c.$mdb,true);$uu=substr($a,$mm,8);$u=Base64_Encrypted::Decrypter($uu,$b,$mdb," ",false,$ww,false);$rho=self::Range_a(67108864,$u.$b,false);$rha=self::Range_a(2080374784,$u,false);$pr=substr($a,-($c-$mm));$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);}else{$rho=self::Range_a(67108864,$mda.$b,false);$rha=self::Range_a(2080374784,$b.$mda,false);}
if($yy){$c-=8;$mm=self::Range_a($c,$uu.$mdb,true);$di=Base64_Encrypted::Decrypter(substr($a,$mm,8),$b,$u.$mdb," ",false,$ww,false);$pr=substr($a,-($c-$mm));$a=substr($a,0,$mm).(strlen($pr)==$c+8?"":$pr);}
$l=self::Unorder($ww?strtr(self::$clef,"+/","_-"):self::$clef,self::Key_exp($rha,$u.substr($b,0,58)));
$j=$jz=self::Range_a(2080374784,$u.$mda,false);$na=$js=self::Range_a(2080374784,mb_strrev($mda.$u),false);
$f=0;
self::$val=$rho;
while($c%4!==0){$a.="=";$c=strlen($a);$c-=4;$f++;}
for($i=0;$i<$c;$i+=4){
$ha=strpos($l,$a{$i});$iq=$l{$ha};$l{$ha}=$l{$na=$na++&63};$l{$na}=$iq;
$hb=strpos($l,$a{$i+1});$iq=$l{$hb};$l{$hb}=$l{$na=$na++&63};$l{$na}=$iq;
$hc=strpos($l,$a{$i+2});$iq=$l{$hc};$l{$hc}=$l{$na=$na++&63};$l{$na}=$iq;
$hd=strpos($l,$a{$i+3});$iq=$l{$hd};$l{$hd}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($ha-($j=self::Chaining($j)))&63)<<18)+((($hb-($j=self::Chaining($j)))&63)<<12)+((($hc-($j=self::Chaining($j)))&63)<<6)+(($hd-($j=self::Chaining($j)))&63);
$e=(chr($g>>16)).(chr($g>>8)).(chr($g));
if($yy)$js=($js+ord($e{0})+ord($e{1})+ord($e{2}))%2080374784;
$da.=$e;}
switch($f){
case 1:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$hf=strpos($l,$a{$i+1});$iq=$l{$hf&63};$l{$hf&63}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=self::Chaining($j)))&63)<<18)+((($hf-($j=self::Chaining($j)))&63)<<12)+(((strpos($l,$a{$i+2})-self::Chaining($j))&63)<<6);
$e=(chr($g>>16)).(chr($g>>8));
if($yy)$js=($js+ord($e{0})+ord($e{1}))%2080374784;
$da.=$e;
break;
case 2:
$he=strpos($l,$a{$i});$iq=$l{$he};$l{$he}=$l{$na=$na++&63};$l{$na}=$iq;
$g=((($he-($j=self::Chaining($j)))&63)<<18)+(((strpos($l,$a{$i+1})-self::Chaining($j))&63)<<12);
$e=chr($g>>16);
if($yy)$js=($js+ord($e{0}))%2080374784;
$da.=$e;
break;}
return $yy?(self::Loop_S($js,$jz)!=$di?false:$da):$da;}
private static function Loop_S($js,$jz){
$a="";$jz%=281857211;
for($i=1;$i<7;$i++){$a.=chr($js=self::No_repeat($js,$i+($i==2||$i==5?$jz:0)));if($i==3)$js=($js+$jz)%2080374784;}
return $a;}
private static function Chaining($j){
$j=self::No_repeat($j,self::$val+=1);
self::$val%=67108865;
return $j;}
private static function Key_exp($a,$b){
$p="";$l=strlen($b);
for($ii=$i=0;$i<64;$i++,$ii++){$a=self::No_repeat($a,ord($b{$ii}));$p.=chr((int)$a);if($ii>=$l-1)$ii=-1;}
return $p;}
private static function No_repeat($a,$b){
return (((int)substr($a<<5,0,-1)-$a)-$b)%2080374784;}
private static function Unorder($x,$b){
$w=0;$y=strlen($b);
for($i=0;$i<64;$i++){$w=($w+ord($x{$i})+ord($b{$i%$y}))%64;$j=$x{$i};$x{$i}=$x{$w};$x{$w}=$j;}
return $x;}
private static function Range_a($bz,$p,$dz){
$az=hexdec(substr(PHP_INT_SIZE===4?sha1($p):self::Range_b($p),-8));
$ez=$dz?$az&2147483647:$az%2147483647;
return round(($ez/2147483647.0)*$bz);}
private static function rot($a,$b){return ($a<<$b)|($a>>(32-$b));}
private static function Range_b($p){
$o=strlen($p)*8;
$p.=chr(128);
while(((strlen($p)+8)%64)!==0)$p.=chr(0);
foreach(str_split(sprintf("%064b",$o),8) as $in){
$p.=chr(bindec($in));}
$j=str_split($p,64);
foreach($j as $ja){
$qs=str_split($ja,4);
foreach($qs as $i=>$nis){
$nis=str_split($nis);
$q="";
foreach($nis as $ni){$q.=sprintf("%08b",ord($ni));}
$qs[$i]=bindec($q);}
for($i=16;$i<80;$i++){$qs[$i]=self::rot($qs[$i-3]^$qs[$i-8]^$qs[$i-14]^$qs[$i-16],1)&4294967295;}
$m=array(1518500249,1859775393,2400959708,3395469782);
$a=$aa=1732584193;$b=$bb=4023233417;$c=$cc=2562383102;$d=$dd=271733878;$e=$ee=3285377520;
foreach($qs as $i=>$q){
$s=floor($i/20);
switch($s){
case 0;
$f=($b&$c)^(~$b&$d);
break;
case 1;
case 3;
$f=$b^$c^$d;
break;
case 2;
$f=($b&$c)^($b&$d)^($c&$d);
break;}
$t=self::rot($a,5)+$f+$e+$m[$s]+($q)&4294967295;
$e=$d;$d=$c;
$c=self::rot($b,30);
$b=$a;$a=$t;}
$aa=($aa+$a)&4294967295;$bb=($bb+$b)&4294967295;$cc=($cc+$c)&4294967295;$dd=($dd+$d)&4294967295;$ee=($ee+$e)&4294967295;}
return sprintf("%08x%08x%08x%08x%08x",$aa,$bb,$cc,$dd,$ee);}
private static function mb_strrev($str){
$r='';
for($i=mb_strlen($str);$i>=0;$i--){$r.=mb_substr($str,$i,1);}
return $r;}
}
?>
