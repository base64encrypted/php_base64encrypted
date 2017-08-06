# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key");
 
 and to decrypt:
 
> Base64_Encrypted::Decrypter( "SlRH2lig8Fxfv2PiejD0++sjYN8CyWulEesbYn+vzNYps6nINpO7Pmb67VM4s+n3YeE", "My First Key", "My second Key", "My third Key");


<br><br>
 
 To check the integrity of the encrypted data, add true to the fifth parameter.
 
## Example:
 
> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", **true**);

and to decrypt:

> Base64_Encrypted::Decrypter( "yJDGRliFhR7ZBbpCu9AjFtypvPY9xHXgDbV20TfQbDaMGq3CYut7zIRfkXpWqpHlE4wMqidVv35", "My First Key", "My second Key", "My third Key", **true**);


<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
