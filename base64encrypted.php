

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
$mi=hexdec(substr(md5($b.$u),-8))&2147483647;
$n=$mi%64;
$n=hexdec(substr($f,-8))&2147483647%64;
$v=self::ReUnorder("0123",$f,3);
for($r=$i=0;$i<$s;$i+=3,$r++){
$nr=($n+$r)%2147483642;
$g=(ord($a{$i}^$l{($nr+1)%64})<<16)+
(ord($a{$i+1}^$l{($nr+2)%64})<<8)+
(ord($a{$i+2}^$l{($nr+3)%64}));
$g=array($v{0}=>$l{$g>>18},
$v{1}=>$l{($g>>12)&63},
$v{2}=>$l{($g>>6)&63},
$v{3}=>$l{$g&63});
ksort($g);
$t.=join($g);
srand($mi);$l=str_shuffle($l); // OR $l=self::Unorder($l,$f,64); but slow without native function...
}
switch($c-$s){
case 1:
$g=ord($a{$i}^$l{($nr+4)%64})<<16;
$v=self::ReUnorder("01",$f,1);
$g=array($v{0}=>$l{$g>>18},
$v{1}=>$l{($g>>12)&63});
ksort($g);
$t.=join($g);
break;
case 2:
$g=(ord($a{$i}^$l{($nr+4)%64})<<16)+
(ord($a{$i+1}^$l{($nr+5)%64})<<8);
$v=self::ReUnorder("012",$f,2);
$g=array($v{0}=>$l{$g>>18},
$v{1}=>$l{($g>>12)&63},
$v{2}=>$l{($g>>6)&63});
ksort($g);
$t.=join($g);
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
$ff=md5($b.$u);
$mi=hexdec(substr(md5($b.$u),-8))&2147483647;
$m=$mi%64;
$e=self::$clef;
$l=self::Unorder($e,$ff,64);
$v=self::DeUnorder("0123",$ff,4);
$d=$g="";
$f=0;
while($c%4!==0){$a.="=";$c=strlen($a);$c=$c-4;$f++;}
for($r=$i=0;$i<$c;$i+=4,$r++){
$q=array($v{0}=>$e{strpos($l,$a{$i})},
$v{1}=>$e{strpos($l,$a{$i+1})},
$v{2}=>$e{strpos($l,$a{$i+2})},
$v{3}=>$e{strpos($l,$a{$i+3})});
ksort($q);
$g=(strpos($e,$q[0])<<18)+
(strpos($e,$q[1])<<12)+
(strpos($e,$q[2])<<6)+
(strpos($e,$q[3]));
$nr=($m+$r)%2147483642;
$d.=(chr($g>>16)^$l{($nr+1)%64}).
(chr(($g>>8)&255)^$l{($nr+2)%64}).
(chr($g&255)^$l{($nr+3)%64});
srand($mi);$l=str_shuffle($l); // OR $l=self::Unorder($l,$ff,64); but slow without native function...
}
switch($f){
case 1:
$v=self::DeUnorder("012",$ff,3);
$q=array($v{0}=>$e{strpos($l,$a{$i})},
$v{1}=>$e{strpos($l,$a{$i+1})},
$v{2}=>$e{strpos($l,$a{$i+2})});
ksort($q);
$g=(strpos($e,$q[0])<<18)+
(strpos($e,$q[1])<<12)+
(strpos($e,$q[2])<<6);
$d.=(chr($g>>16)^$l{($nr+4)%64}).
(chr(($g>>8)&255)^$l{($nr+5)%64});
break;
case 2:
$v=self::DeUnorder("01",$ff,2);
$q=array($v{0}=>$e{strpos($l,$a{$i})},
$v{1}=>$e{strpos($l,$a{$i+1})});
$g=(strpos($e,$q[0])<<18)+
(strpos($e,$q[1])<<12);
$d.=(chr($g>>16)^$l{($nr+4)%64});
break;}
return $d;}
private static function Unorder($x,$b,$c){
$w=0;$y=strlen($b);
for($i=0;$i<$c;$i++){
$w=($w+ord($x[$i])+ord($b[$i%$y]))%$c;
$j=$x[$i];$x[$i]=$x[$w];$x[$w]=$j;}
return $x;}
private static function DeUnorder($x,$b,$c){
for($i=0;$i<$c;$i++){
$w=(int)self::Seed($i,$i.$b);
$j=$x[$i];
$x[$i]=$x[$w];
$x[$w]=$j;}
return $x;}
private static function ReUnorder($x,$b,$c){
for($i=$c;$i>-1;$i--){
$w=(int)self::Seed($i,$i.$b);
$j=$x[$i];
$x[$i]=$x[$w];
$x[$w]=$j;}
return $x;}
private static function Seed($b,$c){
$d=unpack("Na",hash("crc32",$c,true));
return round((($d['a']&2147483647)/2147483647.0)*$b);}
}
?>
