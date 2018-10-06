## [Composer](https://getcomposer.org/doc/01-basic-usage.md)

create composer.json file to PhPStorm
Tools | Composer | Init Composer...  
    
        {
          "name": "vendor_name/package_name",
          "description": "description_text",
          "minimum-stability": "stable",
          "license": "proprietary",
          "authors": [
            {
              "name": "author's name",
              "email": "email@example.com"
            }
          ]
        }
        
        
        
        
PictureManager

Используем логер monolog/monolog. В файле composer.json прописываем и [т.д ....](https://getcomposer.org/doc/01-basic-usage.md)
        
        {
            "require": {
                "monolog/monolog": "1.0.*"
            }
        }
        
 Packagist Репозиторий пакетов PHP https://packagist.org/       
guzzle/guzzle
            
            composer require guzzle/guzzle
            
  > Этот пакет оставлен и больше не поддерживается. Вместо этого автор предлагает использовать пакет guzzlehttp / guzzle .