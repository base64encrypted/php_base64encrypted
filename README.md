# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter( "Yo0WTrqxueLXruhIlRtZBpAWupu6wK4FxRkVfXiCYKyygl7YHxc2cgX/zwWuV7Br+lH", "My First Key", "Anti Force Brute Second Key");
 
 To check the integrity of the encrypted data, add true to the fourth parameter.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true);

and to decrypt:

Base64_Encrypted::Decrypter( "cTFsUwJCsb/2mFvIzDOh7/pnZOnkU8OnfgZ6EMQ3j2+1dDyQ/9JutgxSSK9Zh8XCbfh2KD0yKng"," My First Key", "Anti Force Brute Second Key", true);


The "Paranoiac" mode allows to add two other passwords to annihilate any attempt of attack by brute force and without affecting performances:

Example:

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");

and to decrypt:

Base64_Encrypted::Decrypter( "xftaEydM71nQUHlmqb6UX2Wl0ejKuSzf7FCoV2hIIdopHXa231jYoyujmpPXtG2tpv7quJiBAdJ", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");




Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
