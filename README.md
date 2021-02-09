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
 * Node, npm, npx and yarn. Use `dock npm` etc.
 * Laravel Dusk E2E browser testing. Use `dock dusk`

## Installation 

Prepares docker compose and your .env file for docker based development

```bash
composer require viezel/dock --dev
php artisan dock:install
dock start
```

Use `dock stop` to stop the development server. 

### Create a testing database 

If you want to have a MySQL testing database, just run:

```bash
dock testdb
```

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
  * logs       view logs from PHP and Nginx. Use '--follow' to tail it
  * logs-mysql view logs from MySQL. Use '--follow' to tail it
  * logs-queue view logs from the queue. Use '--follow' to tail it
  * logs-redis view logs from Redis. Use '--follow' to tail it
  * testdb     create a MySQL test database
------
 
Laravel commands: 
 
  * ssh        SSH into laravel
  * ssh-mysql  SSH into mysql
  * dusk       run dusk tests. 'dock dusk' or append: 'dock dusk --group=foo'
  * dusk-fails run dusk failing tests 
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
  * expose     share site via Expose
 
------
 
JS commands: 
 
  * node       run node commands
  * npm        run npm commands
  * npx        run npx commands
  * yarn       run yarn commands

```

## Credits

Credits to [Chris Fidao](https://github.com/fideloper) for creating Vessel and [Taylor Otwell](https://github.com/taylorotwell) for Sail. 

- [Mads Møller](https://github.com/viezel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
