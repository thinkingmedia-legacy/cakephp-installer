# cakephp-installer

Console classes for CakePHP 3.x for installing and configuring an applications.

## AppConfig


Use `AppConfig` to make changes to the `app.php` file.

```PHP
$config = new App\Console\Config\AppConfig();
$config->setSalt();
$config->setToken('__DB_NAME__','AppDatabase');
$config->setToken('__DB_USER__','AppUser');
$config->setToken('__DB_PASS__',App\Console\Config\Tokens::create(16));
$config->save();
```

## Hash


The `Hash` class uses the [mcrypt_create_iv](http://php.net/manual/en/function.mcrypt-create-iv.php) to generate passwords and salt values.

```PHP
App\Console\Config\Hash::generate(15);
```
