
## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the 
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.


SCREENSHOTS
![image](https://user-images.githubusercontent.com/81837957/236729403-4699f899-82d8-45e9-a588-5ffdb5f5c57b.png)
![image](https://user-images.githubusercontent.com/81837957/236729479-053fefcc-4825-4f02-a24d-269c72044332.png)
![image](https://user-images.githubusercontent.com/81837957/236729346-6f9b6e4c-f1c7-4df4-aae0-e622ef0036ee.png)
![image](https://user-images.githubusercontent.com/81837957/236729674-40a0fef3-636b-4f49-8169-874c1dcefddd.png)
![image](https://user-images.githubusercontent.com/81837957/236729801-8818e34d-1b74-418f-b46d-4295aeedf45a.png)

