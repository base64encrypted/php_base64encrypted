# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

Example: 

Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key");
 
 and to decrypt:
 
Base64_Encrypted::Decrypter( "NfyDHgEeIiZoStMNz/sqJFi58/QY8vqkODqa5RePdHvf47KZGNo+wkKYmYeicic5GnX", "My First Key", "Anti Force Brute Second Key");
 
 To check the integrity of the encrypted data, add true to the fourth parameter.
 
Example:
 
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.","My First Key","Anti Force Brute Second Key", true);

and to decrypt:

Base64_Encrypted::Decrypter( "NiD6T+5Pqf9ni/fUyOvbhlIdVD2Lg8NheCc+8XZjQSLSPW4pvoFksPkLflZu1l8NHDOAuYqtA4c"," My First Key", "Anti Force Brute Second Key", true);



The "Paranoiac" mode allows to add two other passwords to annihilate any attempt of attack by brute force and without affecting performances:

Example:

Base64_Encrypted::Decrypter( "SJTdBH+464q3sSa8cAkVtLVgOAajJRvmcuDe7OheDWdDEUUtiBmjb6gNgHXm4Al/YPodDKTpwzV", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");

and to decrypt:


Base64_Encrypted::Decrypter( "RaAzJ8trdT1NNaLyqdm97kBylBcCO5yM/pGDLjNf9c5yvBYpmu9naI7S/40w5Z4+4LCnhmXmLqe", "My First Key","Anti Force Brute Second Key", true, "Paranoiac Key 1", "Paranoiac Key 2");



Ref: http://inseparables.j-ad.net/archives/24/

PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !
