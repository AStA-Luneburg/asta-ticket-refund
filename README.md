# <img src="resources/readme/asta.svg" align="right"> Web-App für 9€-Ticket Rückerstattungen

> Veröffentlicht unter MIT-Lizenz, Copyright © 2022 [Lukas Mateffy](https://mateffy.me)

Software um Anträge auf Semesterticket-Rückerstattungen aufgrund des 9€-Tickets anzunehmen und zu verarbeiten. Erstellt für den [AStA der Universität Lüneburg](https://asta-lueneburg.de).

<details>
  <summary>Screenshots</summary>
  
  ![](resources/readme/screenshot_4.png)
  ![](resources/readme/screenshot_1.png)
  
</details>

<br />

-   [Demo](https://9-euro.asta-lueneburg.de)
-   [Features](#features)
-   [Installation](#installation)
-   [Anpassung an deine Universität](#anpassung-an-deine-universität)
-   [Admin Dashboard](#admin-dashboard)
-   [Anleitungen zur Nutzung](#anleitungen-zur-nutzung)
-   [Changelog](#changelog)

<br />

## Features

### Studierenden-Validierung via Uni-Email

-   Studierende an der Leuphana haben alle eine E-Mail Adresse, die mit `@stud.leuphana.de` endet.
-   Um Studierende zu verifizieren, wird eine E-Mail an diese Adresse geschickt, die einen MagicLink enthält.
-   Mit diesem Link kann sich in das System angemeldet werden. Jede/r Studierende/r kann sich damit klar identifizieren, ohne das Passwörter gespeichert werden müssen.

**Damit wird ausgeschlossen, dass Studierende mehrere Anträge abgeben.**

<br>

### Automatische Überprüfung der Matrikelnummer auf Antrags-Berechtigung

-   Im Antrag mussder Name und die IBAN angegeben werden.
-   Die Matrikelnummer wird dem Studierenden zur Bestätigung angezeigt
-   Name und IBAN können auch nach der Einreichung solange geändert werden, bis die Anträge vom Administrator exportiert wurden

**Die eingegebene Matrikelnummer wird aus dem Datensatz der berechtigten Studierenden übernommen, damit sichergestellt wird, dass der Antrag auch berechtigt ist.**

<br>

### Leicht auf Shared-Webspaces zu installieren

-   Die Software ist mit PHP und MySQL aufgebaut
-   Dadurch ist einfache Datenbankeinrichtung via phpMyAdmin möglich (je nach Webhost)
-   Nutzt das [Laravel Framework](https://laravel.com), ist damit leicht modifizierbar

<br />

### Weitere Features

-   Bankdaten können im Admin Interface als JSON oder CSV exportiert werden
-   Software ist sowohl auf Deutsch, als auch auf Englisch verfügbar

<br /><br /><br />

## Installation

### Requirements

-   PHP >= 8
-   MySQL-Datenbank
-   Webspace mit SSH-Zugang und [Composer](https://getcomposer.org) installiert

### Software laden

Melde dich über SSH auf deinem Webspace an und navigiere zu dem Ordner, in dem die Software liegen soll.
Du kannst sie dann mit `git clone` herunterladen.

```bash
git clone https://github.com/asta-luneburg/asta-ticket-refund

cd asta-ticket-refund
# Du bist jetzt im Ordner der Installation
```

### Software konfigurieren

Du muss nun ein paar Variablen konfigurieren, damit die Software richtig laufen kann.
Erstelle eine neue Datei (entweder über FTP oder via SSH z.B. `nano .env`) und füge folgenden Inhalt hinein:

```env
# Laravel Einstellungen
APP_ENV=production
APP_KEY=
APP_DEBUG=false

# Software Optionen
APP_NAME="AStA Rückerstattung"
APP_URL=https://asta-ticket-refund.test
ADMIN_EMAILS="admin@students.example.com"
ASTA_NAME="AStA Universität Musterstadt"
UNIVERSITY_NAME="Beispiel Universität"
UNIVERSITY_NAME_FULL="Beispiel Universität Musterstadt"
SUPPORT_MAIL="support@example.com"

# Footer
HOMEPAGE_URL="https://example.com/"
PRIVACY_URL="https://example.com/datenschutzerklaerung/"
IMPRESSUM_URL="https://example.com/impressum/"
FAQ_URL="https://example.com/faq/"
FOOTER_ADDRESS="<strong>Allgemeiner Student*innenausschuss</strong><br>Gebäude A1.001<br>Musterstraße 12345<br>Musterstadt"

# Email-Verifizierung
MAIL_ENDING="@students.example.com"
EXAMPLE_MAIL="max.muster@students.example.com"

# E-Mail Versand
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
# MAIL_PORT=1025
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_FROM_ADDRESS="support@example.com"
MAIL_FROM_NAME="AStA Universität Musterstadt"

# Datenbank Optionen
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=asta-ticket-refunds
DB_USERNAME=root
DB_PASSWORD=root
```

Ersetze die Variablen mit Werten, die für deine Universität sinn machen.

E-Mail Versand und die Datenbank müssen konfiguriert werden, bevor die Software richtig funktionieren kann. Du musst also die `DB_` und `MAIL_` Variablen überprüfen. Richte dich hier nach der [Laravel Dokumentation](https://laravel.com/docs/9.x/installation).

### Software vorbereiten

Wenn Datenbank und co. richtig konfiguriert sind, müssen erforderliche Tabellen erstellt werden.

Dafür müssen im Ordner der Software (`asta-ticket-refund/`) folgende Kommandos ausgeführt werden:

```bash
# Dependencies installieren
composer install

# Laravel vorbereiten
php artisan key:generate
php artisan migrate
```

Die Tabellen werden nun erstellt, und die Software ist konfiguriert.

### Berechtigte Studenten hinzufügen

Verbinde dich nun manuell mit der MySQL-Datenbank. Das geht am besten mit einem Tool wie phpMyAdmin. Dies ist bei vielen Webhostern bereits vorinstalliert.

Navigiere dort in deine Datenbank und wähle die Tabelle `users` aus. Du kannst über den `Import`-Reiter Daten aus verschiedenen Formaten importieren (z.B. XLSX, SQL, ODS oder CSV), allerdings müssen diese in folgendem Spalten-Format sein:

![](resources/readme/columns.png)

### Fertig

Die Software ist nun fertig installiert und konfiguriert.

<br />

**Um sie aus dem Internet erreichbar zu machen, musst du deine Domain auf den `public/`-Ordner richten. Siehe [Laravel Deployment](https://laravel.com/docs/9.x/deployment).**

<br /><br /><br />

## Anpassung an deine Universität

Die Software kann an deine Universität angepasst werden.

### Allgemeine Anpassungen

In der `.env`-Datei kannst du mit den Variablen `ASTA_NAME`, `UNIVERSITY_NAME` etc. eine Personalisierung auf deine Universität festlegen.

Außerdem sind folgende Anpassungen einfach machbar:

#### Logo

Du kannst ein Logo als SVG oder JPEG/PNG einbinden, indem du sie in folgenden Dateien hinterlegst:

-   `resources/views/components/application-logo-colored.blade.php`
-   `resources/views/components/application-logo.blade.php`

#### Texte & Übersetzungen

Falls du die Texte ändern willst, kannst du das in den Views und den Übersetzungen tun.

-   `lang/de` und `lang/en`
-   `resources/views`

### Erweiterte Anpassungen

Detailliertere Anpassungen können mithilfe des Codes entwickelt werden.

Die Software ist auf Laravel aufgebaut und nutzt dessen best-practices. Daher kannst du in der [Laravel Dokumentation](https://laravel.com) herausfinden, wie man damit arbeitet.

<br /><br /><br />

## Admin Dashboard

Du kannst die Admin-UI über diese URL erreichen: `9-euro.example.com/admin`

Du kannst eine oder mehrere valide Admin-Email mithilfe der `ADMIN_EMAILS` Variable festlegen. Du kannst mehrere E-Mails angeben, indem du sie mit `,` trennst.
Zusätzlich müssen für diese E-Mails Nutzereinträge in der `users`-Tabelle existieren.

Du musst dich dann über die Studierenden-Verifizierung mit diesern Mails angemeldet haben, um auf das Dashboard zuzugreifen.

```env
ADMIN_EMAILS="email-1@example.com"

# oder

ADMIN_EMAILS="email-1@example.com,email-2@example.com,..."
```

<br />

## Anleitungen zur Nutzung

Im Wiki sind mehrere Anleitungen zur Nutzung verfügbar.

[Hier geht's zum Wiki!](https://github.com/AStA-Luneburg/asta-ticket-refund/wiki)

<br />

## Changelog

### v1.1.0 Admin Release

-   Neue Admin UI
-   Excel Export
    -   Format passend für Import in [SEPAapp](https://sepaapp.eu)
-   **Deprecation**: Die `ADMIN_EMAIL` Env-Variable ist deprecated, und wird in der Zukunft entfernt.
    -   Stattdessen kann die `ADMIN_EMAILS` Variable benutzt werden
    -   Diese unterstützt mehrere E-Mails, die mit `,` getrennt werden können

### v1.0.0 Initial Release

-   Der erste Release
