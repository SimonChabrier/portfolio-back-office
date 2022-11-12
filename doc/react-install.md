# Installer React dans le projet

## ! après chaque install relancer le serveur

```shell
yarn add react react-dom prop-types
```

décommenter `.enableReactPreset()`dans le fchier webpack.config.js

Relancer le serveur

```shell
yarn encore dev-server
```

Ensuite je peux installer les dépendances React dont j'ai besoin.

Pour le css 

- 1 /décommenter `.enableSassLoader()` dans webpack.config.js
- 2 /Installer :

```shell
yarn add sass-loader@^13.0.0 sass --dev
```

Axios pour les requêtes fetch

```shell
yarn add axios
```

React Router

```shell
yarn add react-router-dom
```


