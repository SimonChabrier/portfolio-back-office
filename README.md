# Manage GitHub Portfolio Data.

Use it to manage data content on my personnal portfolio.

## Available dependencies

- Debug Bar
- Doctrine
- Maker Bundle
- Doctrine Fixture
- Php Faker
- Stof Extension Bundle
- Security Bundle
- Validator
- Verify Email Bundle
- Form Bundle
- Mailer
- Assets
- Twig Bundle
- Easy Admin

## Available feature

- Basic HomeController
- Basic home template
- Basic routes and redirects after login logout register
- Full user register and login
- AutoLogin after new user registration
- Remember Me Token
- Verification email send + display success message after user click on mail verification link.
- CreatedAt UpdatedAt generate in User Entity by Stof Extensio Bundle
- Slug generate in User Entity by Stof Extensio Bundle
- Public directory content: pictures / css + reset.css -> scss ready (need Sass Compiler extension) / fonts -> Poppins / js / Favicon
- ready to personalize

## configure app to launch it

- make and personalize your own .env.local
- personalize .gitignore file as you need
- install requiered depencies

```shell
composer install
```

- create the database configured in your .env.local

```shell
bin/console doctrine:database:create
```
- create the database table/s

```shell
bin/console doctrine:migrations:migrate 
```

- launch symfony server

```shell
symfony serve
```

## start to use app

- create a user account
- use your username to login

