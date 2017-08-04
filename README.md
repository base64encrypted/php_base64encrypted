# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", "My fourth Key");
 
 and to decrypt:
 
> Base64_Encrypted::Decrypter( "K6E0DGIaeZTsqScWcxFG4jrs95XkJfUdgtsJBU2XhmR3TeVX8/5Iw3ANoMXa3RxHesH", "My First Key", "My second Key", "My third Key", "My fourth Key");


<br><br>
 
 To check the integrity of the encrypted data, add true to the sixth parameter.
 
## Example:
 
> Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", "My fourth Key", **true**);

and to decrypt:

> Base64_Encrypted::Decrypter( "AjyB4SnD/A+oaZKuwlmGXxqZL+BKl0MF+PTPWYs1A2jeeXoSirFJySk3IvUoLI6o1oK432TYFXX", "My First Key", "My second Key", "My third Key", "My fourth Key", **true**);


<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
