# ex-akt Webpack Config Bundle

Dieses Bundle enthält eine standardisierte Webpack-Config für alle Kundenprojekte.
Damit muss nicht bei jedem Kundenprojekt die npm Abhängigkeiten laufend aktuell gehalten werden, sondern die Abhängigkeiten werden in diesem Bundle gepflegt.

## Installation
> [!IMPORTANT]
> Bei der Installation des Moduls sollte ```"ex-akt/contao-webpack-config-bundle": true``` unter ```allow-plugins``` hinzugefügt werden.
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

## Upgrade
Beim Update auf Version 2.0 kann in deiner Root composer.json das Skript npm-install entfernt werden. 

## Anwendung
> [!IMPORTANT]
> Ab Version 2.0 wird beim Update oder Installation des Moduls automatisch ein Update der npm-Abhängigkeiten durchgeführt. Eine manuelle Installation der Abhängigkeiten wird nicht mehr benötigt.

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