# ex-akt Webpack Config Bundle

Dieses Bundle enthält eine standardisierte Webpack-Config für alle Kundenprojekte.
Damit muss nicht bei jedem Kundenprojekt die npm Abhängigkeiten laufend aktuell gehalten werden, sondern die Abhängigkeiten werden in diesem Bundle gepflegt.

## Installation
> [!NOTICE]
> Für die Entwicklung (require-dev) empfehlen wir die automatische Installation der npm-Ahbhängigkeiten über Composer-Plugin ```ex-akt/composer-npm-install-plugin```
```bash
composer require ex-akt/contao-webpack-config-bundle
```

Ergänze folgende Scripts in deiner Root composer.json:
```json
 "scripts": {
   ...
    "dev": [
        "npm --prefix vendor/ex-akt/contao-webpack-config-bundle run dev"
        ],
    "prod": [
        "npm --prefix vendor/ex-akt/contao-webpack-config-bundle run prod"
        ]
    }
````
## Vorraussetzungen
Lauffähige Version von Node.js und npm ([Installationsanleitung](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)). 
Zur Überprüfung, ob npm bei dir bereits installiert ist, kannst du es folgendem Aufruf testen:
```bash
npm -v
```

## Anwendung
Die lokale Entwicklungsumgebung kann so gestartet werden:
```bash
composer run dev
```

## Projekt-Deployment
Für die Einbindung von Webpack ins Projekt-Deployment kann das Skript "prod" aufgerufen werden:
```bash
composer run prod
```

### Deployment über deployer
Nutze die ex-akt recipes für deployer
```bash
composer require-dev ex-akt/deployer-recipes
```

Über den Aufruf dep ```deploy:encore:compile``` werden die Assets kompiliert und mit im Projekt deployed.