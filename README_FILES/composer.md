## [Composer](https://getcomposer.org/doc/01-basic-usage.md)

Создаём в корне проекта файл composer.json

> - create composer.json file to PhPStorm
> - Added Request class and refactoring index fileTools | Composer | Init Composer...  
    
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
        
- update composer.json

    
            {
              "config": {
                "sort-packages": true
              },
              "require": {
                "php": ">=7.1.0"
              }
            }
            
       
       
run command-line 
    
    composer install 
    
    
    composer require --dev roave/security-advisories:dev-master
        
add autoload section

    "autoload": {
        "psr-4": {
          "Framework\\": "src/Framework/"
        }
      }
      
    composer dump-autoload
    
    
Добавляем в index.php 
        
        chdir(dirname(__DIR__));    //использовать пути из корневой папки
        require"vendor/autoload.php";
        
Если  PhpStorm нераспознаёт путь require"vendor/autoload.php";(подсвечивает)

 - Прописываем пути ![](https://i.imgur.com/U3A93Es.png)
 - [To configure include paths](https://www.jetbrains.com/help/phpstorm/configuring-include-paths.html)

PictureManager

Используем логер monolog/monolog. В файле composer.json прописываем и [т.д ....](https://getcomposer.org/doc/01-basic-usage.md)
        
        {
            "require": {
                "monolog/monolog": "1.0.*"
            }
        }
        
        
 - [ ] 1:11:00 - секция "scripts"  в composer.json файле
    
        composer install --dev - (для разработки)
        composer install --no-dev (для продакшин)
        
    Добавляем в composer.json file    
        
        "scripts": {
            "serverLoc": "php -S 0.0.0.0:8080 -t public public/index.php",
            "tests": "phpunit --color=always"
          }
          
     Для запуска скриптов:
      
      Сервер:
      
            composer serverLoc
      Тесты:      
      
            composer tests 
    
    Скрипт "serverLoc" может выдать ошибку подключения Если сервер запущен.
    ищем php процес:
            lsof -i tcp:8080 
            
            splaa@splaa-Acer-Extensa-7630G:~/Sites/ElisDn/framework.loc$ lsof -i tcp:8080
            COMMAND   PID  USER   FD   TYPE  DEVICE SIZE/OFF NODE NAME
            php     17208 splaa    8u  IPv4 1791811      0t0  TCP *:http-alt (LISTEN)
            
      Убиваем php процесс: kill -9 17208
         
            splaa@splaa-Acer-Extensa-7630G:~/Sites/ElisDn/framework.loc$ kill -9 17208
            
        
 Packagist Репозиторий пакетов PHP https://packagist.org/       
guzzle/guzzle
            
            composer require guzzle/guzzle
            
  > Этот пакет оставлен и больше не поддерживается. Вместо этого автор предлагает использовать пакет guzzlehttp / guzzle .