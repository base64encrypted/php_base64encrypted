# php_base64encrypted
Encrypt base64 via PHP (Proof Of Concept). Short, fast, easy, practice and safe (-quantom aside ^_^- this encryption is impossible to break).

<br><br>

## Example: 

```php
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key");`
``` 
 and to decrypt:

```php
Base64_Encrypted::Decrypter( "p9LmYwjbVqs6cuzjd15PE5JTAdyrDDq+PTbRXkCBoV8ReOmRZXcw5eH9OZ/Za22ybS5", "My First Key", "My second Key", "My third Key");
```

<br><br>
 
 To check the integrity of the encrypted data, add true to the fifth parameter.
 
## Example:
 
```php
Base64_Encrypted::Crypter("Hello World ! My nickname is Boby. Have fun.", "My First Key", "My second Key", "My third Key", true);
```
and to decrypt:

```php
Base64_Encrypted::Decrypter( "OuQFAqJ+QTz+PfLdrxvWfxQF6sOeymDLnwh7iRcmsn9mBROZz3z8UIMn8rUPYxTTUU6WANi9f5C", "My First Key", "My second Key", "My third Key", true);
```

<br><br>





Source: http://inseparables.j-ad.net/archives/24/

*PS: Un big merci à Steph dit la fouine :) pour ses avis éclairés !*
