# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (for me, this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter("S/ynxnhrPEe3Gx4UHYP1Sg358llczQDx22hd6BvpdTwenywFUwZAe9vIEmjog7D+T1xN","My First Key","Anti Force Brute Second Key");
 
 To verify the integrity of the encrypted data, add true to the fourth parameter.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true);

and to decrypt:

Base64_Encrypted::Decrypter("PF+MXPf/zyM9G04COAN/IW3HbOLDJ6XIX5yvCAUZqCf9EcvVA1j7Me1IFYx4XNTRyS40MUk+HPT","My First Key","Anti Force Brute Second Key", true);


Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
