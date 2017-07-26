# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter("t5Fb4KSisLIJ9U7tJ5IMlKg//LaLKGFYG5poifc7w38dp+bsBfnwJXiXCjnOFVXVh0v","My First Key","Anti Force Brute Second Key");
 
 To check the integrity of the encrypted data, add true to the fourth parameter and an other key in fifth.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true, "Integrity Checker key");

and to decrypt:

Base64_Encrypted::Decrypter("fp3kPXOk0PYgq60xS+tNdNYUDI9Sl2dFU2zUKK3Zp7x7TWpaslxP3hk2RQzWpRpt19OVQFUHGcN","My First Key","Anti Force Brute Second Key", true, "Integrity Checker key");


The "Paranoiac" mode allows to add two other passwords to annihilate any attempt of cracking by brute force and without affecting performances:

Example:

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key","Anti Force Brute Second Key", true, "Integrity Checker key", "Paranoiac Key 1", "Paranoiac Key 2");

and to decrypt:

Base64_Encrypted::Decrypter("EPxYpRs9fmJe5IV4KTRR9UrSwRqnHEA9BeRL2XasGLdqfDOr36vwaJBI1GjNGMlOUyll7O2oYks", "My First Key","Anti Force Brute Second Key", true, "Integrity Checker key", "Paranoiac Key 1", "Paranoiac Key 2");




Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
