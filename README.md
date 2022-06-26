# AStA 9€-Ticket Rückerstattungs-Software

Software des AStA der Universität Lüneburg, um Anträge auf Semesterticket-Rückerstattungen wegen des 9€-Tickets anzunehmen und zu verwalten.

## Features

### Studierenden-Validierung via Uni-Email

-   Studierende an der Leuphana haben alle eine E-Mail Adresse, die mit `@stud.leuphana.de` endet.
-   Um Studierende zu verifizieren, wird eine E-Mail an diese Adresse geschickt, die einen MagicLink enthält.
-   Mit diesem Link kann sich in das System angemeldet werden. Jede/r Studierende/r kann sich damit klar identifizieren, ohne das Passwörter gespeichert werden müssen.

**Damit wird ausgeschlossen, dass Studierende mehrere Anträge abgeben.**

---

### Automatische Überprüfung der Matrikelnummer auf Antrags-Berechtigung

-   Im Antrag muss die Matrikelnummer, der Name und die IBAN angegeben werden.
-   Nach Einreichung kann die Matrikelnummer nicht mehr vom Nutzer geändert werden.
-   Name und IBAN können auch nach der Einreichung solange geändert werden, bis die Anträge vom Administrator exportiert wurden

**Die eingegebene Matrikelnummer wird mit dem Datensatz der berechtigten Studierenden abgeglichen, damit sichergestellt wird, dass der Antrag auch berechtigt ist.**

---

### Leicht auf Shared-Webspaces zu installieren

-   Die Software ist mit PHP und MySQL aufgebaut

## **Die eingegebene Matrikelnummer wird mit dem Datensatz der berechtigten Studierenden abgeglichen, damit sichergestellt wird, dass der Antrag auch berechtigt ist.**

### Weitere Features

-   Bankdaten können im Admin Interface als JSON oder CSV exportiert werden
-   Software ist sowohl auf Deutsch, als auch auf Englisch verfügbar

## Anpassung an deine Universität
