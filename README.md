# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", "My fourth Key");
 
 and to decrypt:
 
> Base64_Encrypted::Decrypter( "2b30Q4Ffme/hBYe34bwq2s4EL6UcfOfkteynvm5VCVf+yyApw3efOYgxT6QK1p1iHK1", "My First Key", "My second Key", "My third Key", "My fourth Key");


<br><br>
 
 To check the integrity of the encrypted data, add true to the sixth parameter.
 
## Example:
 
> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", "My fourth Key", **true**);

and to decrypt:

> Base64_Encrypted::Decrypter( "+jDV6LWq/zl8xHbkrQ8+nFLr/QC5Z7RZlMqcihpF5Y1ytXWTfbhzi5INXTn56cPPJN5T5N9l7Nw", "My First Key", "My second Key", "My third Key", "My fourth Key", **true**);


<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
