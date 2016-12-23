# blog -----(Laravel5)


>https://github.com/johnlui/Learn-Laravel-5

##current situation

- done [Tutorial](https://github.com/johnlui/Learn-Laravel-5)

##develop plan

- change edit text to sup markdown

##some tip:

```
cd learnlaravel5/public
php -S 0.0.0.0:1024


//database

php artisan make:migration create_article_table

php artisan migrate

php artisan make:seeder ArticleSeeder

php artisan db:seed


//generate model control

php artisan make:model Article

php artisan make:controller Admin/HomeController


// sum

//这样一次性建立了 Comment 类和 2016_06_03_220325_create_comments_table 两个文件

php artisan make:model Comment -m
php artisan migrate


```