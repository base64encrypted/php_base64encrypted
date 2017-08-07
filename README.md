# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

`Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key");`
 
 and to decrypt:
 
> Base64_Encrypted::Decrypter( "0Cir0od46bIymT5d1KurUV8bQenWyz5aX1Kd0SV/m6y3ZeptXzsEWpikx0jHUd/cdgv", "My First Key", "My second Key", "My third Key");


<br><br>
 
 To check the integrity of the encrypted data, add true to the fifth parameter.
 
## Example:
 
> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", **true**);

and to decrypt:

> Base64_Encrypted::Decrypter( "rVq7JX4JYuXGsl3c3/FmQhISu0THJjCIZSujntJilZbZ7ZmAFBswUUK5OSD00pGgmPrN/LLbw/4", "My First Key", "My second Key", "My third Key", **true**);


<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
