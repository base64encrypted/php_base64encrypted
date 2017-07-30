# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter( "ftP8YVpwMdNst0D7K0Z8DTt694BSLfbB1nZ5ab8SAIqt5T3+KKqXOzOyhjDRK1LZRbQ", "My First Key", "Anti Force Brute Second Key");

 
 To check the integrity of the encrypted data, add true to the fourth parameter.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true);

and to decrypt:

Base64_Encrypted::Decrypter( "KG+7X1Xz/VtELJhd3VDdR9Qkf4FSRehx9uBxJWClDqhduUXNC6nli1vo1u40AJUbycBsxZBNxea","My First Key", "Anti Force Brute Second Key", true);



The "Paranoiac" mode allows to add two other passwords to annihilate any attempt of attack by brute force and without affecting performances:

Example:

Base64_Encrypted::Decrypter( "iBIeQ3lnd8sJmd6y0MFA5MRJgjy7CBCOc+emF7KbNM0X13/6AQeWA0r/gLe5Or9MUSZD2VPHE2Y", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");



and to decrypt:


Base64_Encrypted::Decrypter( "fhscHeiAWvvX5ArbHXG21fufe65g4sEv+hH6VJJOOMv5nPTGBLkNLZJXCh9FCy9unupQRmdksak", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");




Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
