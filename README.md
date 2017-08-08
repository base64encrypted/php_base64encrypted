# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

```php
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key");`
``` 
 and to decrypt:

```php
Base64_Encrypted::Decrypter( "jO6grQcVDDw1grVcTufLSWHu0RNc1WL+DTHXy41+MM2urW4bAIpR3mh09wHGtgYf+Cz", "My First Key", "My second Key", "My third Key");
```

<br><br>
 
 To check the integrity of the encrypted data, add true to the fifth parameter.
 
## Example:
 
```php
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", true);
```
and to decrypt:

```php
Base64_Encrypted::Decrypter( "pnhvNuYaaEmDv1QLl/gF+kB9EkWcv+vBtSzJn6dJAs5c5BLNHtSUhY62lEiN8eY5rIWZm+ar2j0", "My First Key", "My second Key", "My third Key", true);
```

<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
