# ex-akt Webpack Config Bundle

Dieses Bundle enthält eine standardisierte Webpack-Config für alle Kundenprojekte.
Damit muss nicht bei jedem Kundenprojekt die npm Abhängigkeiten laufend aktuell gehalten werden, sondern die Abhängigkeiten werden in diesem Bundle gepflegt.

## Install
```bash
composer require ex-akt/contao-webpack-config-bundle
```

Ergänze folgende Scripts in deiner Root composer.json:
```json
 "scripts": {
   ...
    "npm-install":[
        "npm --prefix vendor/ex-akt/contao-webpack-config-bundle install"
        ],
    "dev": [
        "npm --prefix vendor/ex-akt/contao-webpack-config-bundle run dev"
        ],
    "prod": [
        "npm --prefix vendor/ex-akt/contao-webpack-config-bundle run prod"
        ]
    }
````

## Anwendung
Nach dem ersten composer require, oder composer update müssen die npm-Abhängigkeiten geladen werden:
```bash
composer run npm-install
```

Danach kann die lokale Entwicklungsumgebung gestartet werden:
```bash
composer run dev
```

## Projekt-Deployment
Für die Einbindung von Webpack ins Projekt-Deployment kann das Skript "prod" aufgerufen werden:
```bash
composer run prod
```

### Deployment über Mage
Füge der Mage-Konfiguration folgende Zeile hinzu:
```yml
- exec: { cmd: 'php -d memory_limit=-1 /usr/local/bin/composer.phar run prod', desc: 'Running Symfony Encore' }
```

> **_Hinweis:_** Dieser Code funktioniert nicht zuverlässig auf allen Geräten, daher ist der Mage-Teil Produktion als "buggy" einzustufen.