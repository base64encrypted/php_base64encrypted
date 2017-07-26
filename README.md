# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter("GlVbTtkoeHnw1kFaZ7FGbUAqwKLgqpR4ZgTVcxQnfs9Sl8fyb7t7+i8dsaL07RkvD3n","My First Key","Anti Force Brute Second Key");
 
 To check the integrity of the encrypted data, add true to the fourth parameter and an other key in fifth.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true, "Integrity Checker key");

and to decrypt:

Base64_Encrypted::Decrypter("eWc1TXqOZy730Xf5Dl3rDz1LT8N8i/oOuKy+RBIekt/VwBeuBbSaobLjOoKDgXprnD0I+RCYrx6","My First Key","Anti Force Brute Second Key", true, "Integrity Checker key");


The "Paranoiac" mode allows to add two other passwords to annihilate any attempt of cracking by brute force and without affecting performances:

Example:

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key","Anti Force Brute Second Key", true, "Integrity Checker key", "Paranoiac Key 1", "Paranoiac Key 2");

and to decrypt:

Base64_Encrypted::Decrypter("ZR2JgSUlBLoyhi+jeOdc9tzdmiOnO6g2KuzWEvfvHhlf8WN5WKug9m82wyAK/7gNN1e4/jm5+eF", "My First Key","Anti Force Brute Second Key", true, "Integrity Checker key", "Paranoiac Key 1", "Paranoiac Key 2");




Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
