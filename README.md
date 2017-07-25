# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter("S/ynxnhrPEe3Gx4UHYP1Sg358llczQDx22hd6BvpdTwenywFUwZAe9vIEmjog7D+T1xN","My First Key","Anti Force Brute Second Key");
 
 To check the integrity of the encrypted data, add true to the fourth parameter and an other key in fifth.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true, "Integrity Checker key");

and to decrypt:

Base64_Encrypted::Decrypter("cu31Xt53d1HV+eDdMmdyQDo7FsGNThw+ePaEIuBiitWxTKo9KNx8A++ZjIKPxz5M55/NjsHnVXx","My First Key","Anti Force Brute Second Key", true, "Integrity Checker key");


Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
