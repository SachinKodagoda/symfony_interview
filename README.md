#Symfony 5 Project

This is basically including all the stuff you want to get start

##Setup
+ Clone this file
+ Run **composer install** to download Composer Dependencies
[Composer install](https://getcomposer.org/download/)
```
composer install
```


```
php bin/console debug:twig
- gives what twig can do in a app
- {{ value | raw }} => will will give raw value but not good for xss
- {{ value | markdown }} => to use markdown

php bin/console config:dump KnpMarkdownBundle


```
##Composer Commands
```
composer require <package>...
- to add package to production environment

composer remove --dev <package>...
- to remove packages from dev environment

composer update symfony/*
- to update all symfony packages.

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
```

##Git Commands
```
git add <file>...
- to add what will be commited

git add -p
- to add by checking the changes
- to add 'y' add 'n' to remove

git add .
- to add what will be commited

git checkout -- <file>...
- to discard changes in working directory

git reset HEAD <file>...
- to unstage

git commit -m 'message'
- to commit files

git diff
- to inspect the changes.

git checkout . 
- to revert all the changes
```
