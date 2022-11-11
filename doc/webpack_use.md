# Utiliser WebPack en dev

Webpacke compile le JS et le css de son dossier assets vers le dossier public/build.

1 - Il faut lancer le monitoring de la compilation
2 - Il faut lancer le serveur local

### Gérer la compilation du Js et Css en dev

- [Doc Symfony Seve](https://symfony.com/doc/5.4/setup/symfony_server.html)
  
Compile les assets Webpack en utilisant Symfony Encore en backgroud pour ne pas bloquer le terminal.
La compilation se fait en auto quand on fait des modifications sans rafrâichier la page.

Pour lancer le watch et compiler une fois

```shell
symfony run -d yarn encore dev --watch
```

Pour lancer le serveur et compiler en auto

```shell
yarn encore dev-server
```

- [Doc Yar Server](https://symfony.com/doc/5.4/frontend/encore/dev-server.html)

```shell
yarn dev-server
```

- [Autres commandes yarn et npm](https://symfony.com/doc/current/frontend/encore/simple-example.html)

### Lancer le serveur local

Pour le lancer et monitorer l'activité request/response

```shell shell
symfony server:start
```

Pour le lancer en background

```shell
symfony server:start -d
```

Pour voir les logs et l'activité du serveur

```shell
symfony server:log
```

Pour voir le statut du serveur 

```shell
symfony server:status
```

Pour stopper le serveur local php et yarn

```shell
symfony local:server:stop
```

# Deployer en prod

Il faut buider les assets pour compiler le css et le js dans le dossier public/build.

Compiler les assets dans leur version finale.

```shell
yarn build
```

Optimiser les assets pour la prod

```shell
./node_modules/.bin/encore production
```



- [Doc déploiement sans install Node sur le serveur](https://symfony.com/doc/current/frontend/encore/faq.html#how-do-i-deploy-my-encore-assets)