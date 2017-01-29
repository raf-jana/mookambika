<p align="center">
<a href="https://mookambika.com/">
<img src="https://pigjian.com/uploads/Logo.png" alt="Powered By Mookambika team" width="160">
</a>
</p>

<p align="center">ðŸŽˆ Mookambika is an open source blog built with Laravel and Vue.js. <a href="https://mookambika.com">https://mookambika.com</a></p>

# Mookambika

This is a powerful blog, I try to build the blog more beautiful, more convenient. 

`Laravel 5.*` and `Vuejs 2.*` combined with the establishment of a good response and quickly dashboard, the dashboard made through the `Vuejs` component development.

I believe it will be better and better. If you are interested in this, you can join and enjoy it.


## Basic Features

- Manage users, landing pages, Hotel/Taxi/Pooja bookings, payments and media
- Statistical tables
- Label classification
- Content moderation
- Markdown Editor
- and more...

[Mookambika](https://github.com/raf-jana/mookambika) Laravel 5.*


## Install

### 1. Clone the source code or create new project.

```shell
git clone https://github.com/raf-jana/mookambika.git
```

```

### 2. Set the basic config

```shell
cp .env.example .env
```

Edit the `.env` file and set the `database` and other config for the system after you copy the `.env`.example file.

### 2. Install the extended package dependency.

Install the `Laravel` extended repositories: 

```shell
composer install
composer update
```

Install the `Vuejs` extended repositories: 

```shel
npm install
```

### 3. Run the blog install command, the command will run the `migrate` command and generate test data.

```shell
php artisan blog:install
```

## Contributors

- [Nageswara Rao](http://github.com/nagsamayam)

## Thanks

- [Laravist](https://www.laravist.com/)

## License

The project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
