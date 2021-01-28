# Dock

Local development based on Docker for Laravel.

This setup includes:

 * Nginx (latest)
 * PHP 8.0
 * MySQL 8.0
 * Redis Caching
 * Redis Queue
 * Mailhog (local mail development)
 * Xdebug
 * Node, npm and yarn

## Installation 

Prepares docker compose and your .env file for docker based development

```bash
composer require viezel/dock --dev
php artisan dock:install
dock start
```

Use `dock stop` to stop the development server. 

## Customize Your Docker Setup

If you want to customize the docker setup, then run:

```bash
php artisan dock:publish
```

## Commands

Running `dock` will give the list of commands.

```bash
Docker commands: 
 
  * build      building containers
  * install    install the app for the first time
  * up         start containers
  * start      start containers
  * down       stop containers
  * stop       stop containers
  * reset      resetting containers. Careful - you are deleting everything
  * remove     removing containers. Careful - you are deleting everything
 
------
 
Laravel commands: 
 
  * ssh        SSH into laravel
  * ssh-mysql  SSH into mysql
  * dusk       run dusk tests. 'dock dusk' or append: 'dock dusk --group=foo' 
  * c          run composer commands. 'dock c dump-autoload'
  * composer   run composer commands. 'dock composer dump-autoload'
  * art        run artisan commands. 'dock art view:clear'
  * artisan    run artisan commands.
  * tinker     run tinker
  * worker     start a new queue worker
  * cc         clear cache
  * rl         route list. 'dock rl --path=api/foo/bar'
  * migrate    migrate the app
  * redis      start redis cli
 
------
```

## Credits

- [Mads Møller](https://github.com/viezel)
- [Chris Fidao](https://github.com/fideloper)  
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
