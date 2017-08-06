# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key");
 
 and to decrypt:
 
> Base64_Encrypted::Decrypter( "Yf27ucHY3+UvSuCH4W0sVbpZj5qq3xetC4WsTqb+cH89tmqJwnzqJCPq4VDh9S30QPQ", "My First Key", "My second Key", "My third Key");


<br><br>
 
 To check the integrity of the encrypted data, add true to the fifth parameter.
 
## Example:
 
> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", **true**);

and to decrypt:

> Base64_Encrypted::Decrypter( "IbQMoR8TSY+OIvEvL68kggREhyPkaHG2hJ3CoBc7rIyKmUYplnWtj7HiXLQXiF7eORwSSEZPRl8", "My First Key", "My second Key", "My third Key", **true**);


<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
