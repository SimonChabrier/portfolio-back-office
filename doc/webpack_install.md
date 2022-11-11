# installer web pack

- [Doc Install](https://symfony.com/doc/current/frontend/encore/installation.html)
- [Doc Usage](https://symfony.com/doc/5.4/frontend/encore/simple-example.html)

<p>Travailler dans le dossier assets qui est à la racine du projet. Ensuite c'est WebPAckEncore qui compile les fichiers css et js
vers le dosssier build du dossier public<p>

### Install

```shell
composer require symfony/webpack-encore-bundle
```

### Compiler scss et js vers public/build

```shell
npm run build
```

### Ajouter js et css dans la template base 

```php
{% block javascripts %}
    {{ encore_entry_script_tags('app') }}
{% endblock %}
```

```php
{% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
{% endblock %}
```

