# cakephp-installer

Console classes for CakePHP 3.x for installing and configuring an applications.

## Hash


The `Hash` class uses the [mcrypt_create_iv](http://php.net/manual/en/function.mcrypt-create-iv.php) to generate passwords and salt values.

```PHP
\Installer\Hash::generate(15);
```

## Tokens


The `Tokens` class lets you replace tokens in the `app.php` file with new string values.

```PHP
$app = \Installer\Tokens::AppConfig();
$app->set('__SALT__', Installer\Hash::create());
$app->set('__DB_NAME__','database');
$app->set('__DB_USER__','username');
$app->set('__DB_PASS__',Installer\Hash::create(16));
$app->save();
```
