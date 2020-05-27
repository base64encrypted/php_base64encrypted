# php_base64encrypted
Encrypt base64 via PHP. This is the first and the unique cryptographic algorithm at this time IN THE WORLD that encrypt natively base64. With its three keys, it protects against brute force attacks and therefore, is probably quantum resistant. Short, fast, easy, practice and safe.

Enjoy!

<br><br>



## Example: 

```php
echo Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key");
``` 
 and to decrypt:

```php
echo Base64_Encrypted::Decrypter("OUAN+QiXDQoGg5kHaD/HuA0V", "My First Key", "My second Key", "My third Key");
```

<br><br>
 
 To check integrity of the encrypted data, add true to the fifth parameter (return false if wrong data).
 
## Example:
 
```php
echo Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key", true);
```
and to decrypt:

```php
echo Base64_Encrypted::Decrypter("C5y7yH4fF+euSn0fKSuPayZw/iiXWOZE", "My First Key", "My second Key", "My third Key", true);
```

<br><br>  

To encrypt data in URL, add true to the sixth parameter.

## Example:

```php
echo Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key", true, true);
```
and to decrypt:

```php
echo Base64_Encrypted::Decrypter("tJwL81RKQ_vxErTsIgyicgoZEaS-sHqh", "My First Key", "My second Key", "My third Key", true, true);
```




<br><br>



*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
