#A Symfony 5 Project
###Setup
+ Clone this file
+ [https://github.com/SachinKodagoda/symfony_interview](https://github.com/SachinKodagoda/symfony_interview)

###Composer Commands
```
composer install
- to install packages in the composer.json file

composer require <package>
- to add package to production environment

composer remove --dev <package>
- to remove package from dev environment

composer update symfony/*
- to update all symfony packages.

composer update
- to update all packages

composer self-update
- to update composer

composer show <package>
- to check the version and other details of a package.

composer unpack <package>
- to break a package in to small parts

composer recipes
- to check all the installed recipes and checking the updatability

composer recipes <package>
- to show more details

composer recipes:install <package> --force -v
- to update a recip

composer create-project symfony/skeleton <project_name>
- to create a new project with smallest configurations

composer create-project symfony/website-skeleton <project name>
- to create a new project including all features for web application

```
<br/><hr/>

###Symfony CLI commands
```
symfony new <project_name>
- to create a skeleton project
- this will initialize git also

symfony serve
- to start server with https

symfony.exe server:ca:install
- to install https this need to be run one time

symfony serve --help
- to get help

symfony serve -d
- run the server in background (--daemon)

symfony server:status
- to check server status

symfony server:stop
- to stop server

symfony console
- this is equal to php bin/console

```
<br/><hr/>

###PHP Command
```
php -S 127.0.0.1:8000 -t public/
- to create a server with http 

php bin/console debug:twig
- gives what twig can do in a app
- {{ value | raw }} => will will give raw value but not good for xss
- {{ value | markdown }} => to use markdown

php bin/console config:dump KnpMarkdownBundle
```
<br/><hr/>

###Router Command
```
php bin/console router:match <url>
- to check any errors with url

php bin/console router:match <url> --method=POST
- to check any errors with url with post method
- ex: /book/2

```
<br/><hr/>

###Debug Commands
```
php bin/console debug:autowiring
- to check autowiring classes (to make use of services)
- these autowiring are added with the bundles installation
- check bundles.php

php bin/console debug:autowiring <package>
- to check autowirable types in the package

php bin/console debug:autowiring <package> --all
- to check autowirable types in the package including your customized services

php bin/console debug:<package>
- to check what commands that package is having

php bin/console debug:container
- to see all the services inside of the Service Container

php bin/console debug:container --parameters
- to see all the parameters inside of the Service Container

php bin/console debug:container --parameters --env=prod
- to see all the parameters inside of the Service Container in production env
- before running prod env, cache:clear

php bin/console debug:container markdown
- to see what are the id's of markdown service

php bin/console debug:config FrameworkBundle cache
- to see what are your current values while config:dump will show all possible values

php bin/console debug:router
- to check routes

```
<br/><hr/>

###Config Commands
```
php bin/console config:dump <bundle>
- dump all the configuration of the bundle can be used

php bin/console config:dump FrameworkBundle cache
- it will dump cache of FrameworkBundle
```

<br/><hr/>

###Cache Commands
```
php bin/console cache:clear
- if you are in dev no issue but if you are in prod then,
- you have to manually clear cache when deploying
- untill clearing you want see changes in even twig

```

<br/><hr/>

###About Commands
```
php bin/console about
- This is giving info about our application

```

<br/><hr/>

###Packages/Bundles need to be installed

####_Composer_ *
+ this is a tool for dependency management in PHP
+ to [download](https://symfony.com/doc/current/routing.html)
```
composer require annotations
```

####_Routing_
+ for custom routing we can use annotations
+ to [read more](https://symfony.com/doc/current/routing.html)
```
composer require annotations
```

####_Markdown_
+ This will help to convert markdowns 
+ eg: `**value**` will be convert into `<strong>value</strong>`
+ eg: `*value*` will be convert into `<i>value</i>`
+ this will add **markdown** command to the twig
+ to [read more](https://github.com/KnpLabs/KnpMarkdownBundle)
```
composer require knplabs/knp-markdown-bundle
```

####_Debug_
+ this will help to use debugging
```
composer require debug --dev
```

####_Encore_
+ this will set up the environment for **webpack-encore** <br/>
  which is a layer for **webpack**
```
composer require encore

--after installation-- 
npm install
npm run dev
npm add jquery --dev
npm add bootstrap --dev (witch has js and css both)
@import "~bootstrap"; (used to import bootstrap)
{{ encore_entry_script_tags('app') }} (used to give path name dynamically)
```

####_Cache_
+ this is already coming with symfony
+ can check autowiriables by `php bin/console debug:cache`
+ to [read more](https://symfony.com/doc/current/components/cache.html)


####_Maker_
+ This bundle gives many console commands 
+ This does not give Services for Controllers
```
composer require maker --dev
- to install maker bundle

php bin/console make:command
- to create custom commands
- ex: app:random-spell

```

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<hr/>

###Important
+ in symfony `~` means `null`
+ values inside braces called wild cards in annotations {id} 
+ service is an object do the work for us
+ a **bundle** is a php library/symfony plugin 
+ twig use html entities to prevent xss attacks.<br/>
  to stop above scape you can use `{{ value | raw }}`, but it is not secured way.<br/>
  to a better way use `{{ value | markdown }}` it is coming with **markdown** bundle
+ to encrypt can use `md5($value)`
+ to pass a value to a function callback scope, you can do following
    ```
    $parsedText = $cache->get('markdown_'.md5($questionText), function() use ($questionText,$markdownParser){
        return $markdownParser->transformMarkdown($questionText);
    });
    ```
+ dump and die `dd($value1, $value2)`<br/><br/>
+ The **Service Container** is an associative array of services(objects).<br/>
  where each service(object) has a unique id
+ **Service Container** can have not only _Services_ but also _Parameters_
+ following way, we can add parameters in the **services.yaml** <br/>
  and can override by **services_dev.yaml** file
    ```
    parameters:
        cache_adapter: cache.adapter.apcu
    ```
+ `$this->getParameter('cache_adapter')` using this we can get parameters but <br/>
   usually we use in config files `'%cache_adapter%'`
    ```
    framework:
       cache: 
           app: '%cache_adapter%'
       ...
    ```
+ many services coming from bundles. each bundle has services it provides.<br/>
  which include id, classname, arguments for each one
  
+ service auto registration is done by **services.yaml**
  
+ low level services means which are running by symfony that we don't usually use
+ autowiring means accessing autowirable services and make use of them inside<br/>
  controller methods or to __construct
+ dependency inject can be done through constructor or autowiring it in to controller methods
+ FranewirkBundle was the core symfony bundle. other bundles are installed by us
+ `$value1 ?? $value2 ?? false` is it null?
+ creating our own services make good structure, can do unit testing, and support reusability
+ dependency injection when we need some values to pass; but it is good to pass by default <br/>
  then we can use dependency injection.
+ if one service need other service we can use dependency injection
+ 4.4.3 = major.minor.patch



###Git Commands
```
git add <file>
- to stage what will be commited

git add -p
- to stage by checking the changes
- to stage 'y' add 'n' to remove

git add .
- to stage what will be commited

git checkout -- <file>
- to discard changes in working directory

git checkout . 
- to revert all the changes

git reset HEAD <file>
- to unstage

git commit -m 'message'
- to commit files

git diff <file>
- to inspect the changes in the file.

git log
- to check commits

git show --name-only
- to check commited files (not in .gitignore file)

```
<br/><hr/>