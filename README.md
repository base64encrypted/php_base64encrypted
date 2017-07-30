# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter( "bAKW1BoAIQhv+ykeIQYpDbyyYFDIUpY4lf76bVkpxhFylmW/4d/DWkzNGLq6utiK/o5", "My First Key", "Anti Force Brute Second Key");
 
 To check the integrity of the encrypted data, add true to the fourth parameter.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true);

and to decrypt:

Base64_Encrypted::Decrypter( "26pIrQxW2zxqadliRv4hCfiCQh4uRp+Q2uAJj8WHH+/q6Mf1rfvJD8/oqHJES3c6dq4PTjW82Ji","My First Key", "Anti Force Brute Second Key", true);


The "Paranoiac" mode allows to add two other passwords to annihilate any attempt of attack by brute force and without affecting performances:

Example:

Base64_Encrypted::Crypter( "Hello World ! My nickname is Boby. Have fun.", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");


and to decrypt:


Base64_Encrypted::Decrypter( "fhscHeiAWvvX5ArbHXG21fufe65g4sEv+hH6VJJOOMv5nPTGBLkNLZJXCh9FCy9unupQRmdksak", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");




Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
