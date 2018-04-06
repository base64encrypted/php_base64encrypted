# php_base64encrypted
Encrypt base64 via PHP without mcrypt extension nor openssl. This algorithm is written in pure PHP which makes it compatible with old versions of PHP. Short, fast, easy, practice and safe.

<br><br>

## Example: 

```php
Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key");
``` 
 and to decrypt:

```php
Base64_Encrypted::Decrypter( "xAx6cdpWjdAbMn9GSpdd35+/", "My First Key", "My second Key", "My third Key");
```

<br><br>
 
 To check integrity of the encrypted data, add true to the fifth parameter (return false if wrong data).
 
## Example:
 
```php
Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key", true);
```
and to decrypt:

```php
Base64_Encrypted::Decrypter( "3B5X3OX2FSi+csW/VXaa/ksv", "My First Key", "My second Key", "My third Key", true);
```

<br><br>  

To encryt data in URL, add true to the sixth parameter.

## Example:

```php
Base64_Encrypted::Crypter("Hello World!", "My First Key", "My second Key", "My third Key", true, true);
```
and to decrypt:

```php
Base64_Encrypted::Decrypter( "G92Ohvus9hZlRuw4q9yNlGLP-C5YJN_O", "My First Key", "My second Key", "My third Key", true, true);
```




<br><br>



*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
