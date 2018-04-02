# php_base64encrypted
Encrypt base64 via PHP. Short, fast, easy, practice and safe.

<br><br>

## Example: 

```php
Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key");`
``` 
 and to decrypt:

```php
Base64_Encrypted::Decrypter( "eoDqDtAimbUCQqHBTvH11fjj", "My First Key", "My second Key", "My third Key");
```

<br><br>
 
 To check the integrity of the encrypted data, add true to the fifth parameter.
 
## Example:
 
```php
Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key", true);
```
and to decrypt:

```php
Base64_Encrypted::Decrypter( "hoqk3NIv02X1WcamjOGKOoKXIdEWoWnC", "My First Key", "My second Key", "My third Key", true);
```

<br><br>  

To encryt data in URL, add true to the sixth parameter (return false if wrong data).

## Example:

```
phpBase64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key", true, true);
```
and to decrypt:

```
phpBase64_Encrypted::Decrypter( "u5lwZ_Mvi5-Ws36FF8FAV_HecU08p5Hv", "My First Key", "My second Key", "My third Key", true, true);
```




<br><br>



*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
