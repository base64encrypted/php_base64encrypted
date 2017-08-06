# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", "My fourth Key");
 
 and to decrypt:
 
> Base64_Encrypted::Decrypter( "tY9L1v1sR8Z/ceh1p2T6DPanmN4oEnCk4mUIGqW5yRhwp0Uo/MGT/tHuC6GbfCF3dlu", "My First Key", "My second Key", "My third Key", "My fourth Key");


<br><br>
 
 To check the integrity of the encrypted data, add true to the sixth parameter.
 
## Example:
 
> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", "My fourth Key", **true**);

and to decrypt:

> Base64_Encrypted::Decrypter( "V7BWzsL5JBV6cQn8AeOrXz3n58TleD5U4dExny+fWZaEBSUISD8EtJSbfAZHIHJWxRceIXSTU+X", "My First Key", "My second Key", "My third Key", "My fourth Key", **true**);


<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
