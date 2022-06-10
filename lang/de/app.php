<?php

return [
    'languages' => [
        'de' => 'Deutsch',
        'en' => 'English',
    ],
    'steps' => [
        'first' => 'Anleitung',
        'second' => 'Studierenden-Verifizierung',
        'third' => 'Bankverbindung angeben'
    ],
    'notifications' => [
        'success' => [
            'saved' => [
                'title' => 'Deine Änderungen wurden gespeichert!',
                'message' => 'Wir haben deinen Antrag mit den neuen Daten aktualisiert.'
            ],
            'submitted' => [
                'title' => 'Wir haben deinen Antrag erhalten!',
                'message' => 'Dein Antrag ist bei uns eingegangen und wird in Kürze bearbeitet. Du kannst die Seite jetzt schließen.'
            ],
            'email-notification' => 'Sobald die Rückerstattungen ausgezahlt werden, wirst du per E-Mail benachrichtigt.',
            'change-details' => 'Solange der Antrag noch nicht bearbeitet wurde, kannst du deine Bankverbindung jederzeit ändern.',
        ],
        'exported' => [
            'title' => 'Deine Rückerstattung ist abgeschlossen!',
            'message' => 'Wir haben unsere Bank informiert und das Geld wird demnächst überwiesen.'
        ]
    ],
    'welcome' => [
        'welcome-1' => 'Seit Juni 2022 gibt es für 3 Monate das 9-Euro-Ticket, mit dem der ÖPNV in ganz Deutschland genutzt werden kann. <strong class="font-semibold">Da ihr als Studierende ein Semesterticket habt, braucht ihr kein 9-Euro-Ticket erwerben!</strong>',
        'welcome-2' => 'Ihr könnt für die Monate Juni, Juli und August euer Semesterticket im gesamten deutschen ÖPNV nutzen.<br>Da ihr aber für euer Semesterticket mehr als 9 Euro pro Monat zahlt, bekommt ihr jetzt Geld vom AStA zurück!',
        'how-does-it-work' => 'Wie funktioniert das?',
        'step-1' => [
            'title' => 'Verifiziere, dass du im SoSe 2022 an der :university immatrikuliert bist/warst',
            'text' => 'In dem wir eine E-Mail an deine :university-Email senden, können wir dich identifizieren und sicher stellen, dass du auch wirklich du bist. Diese E-Mail enthält einen Link, mit dem du dich anmelden und deinen Antrag ausfüllen kannst.'
        ],
        'step-2' => [
            'title' => 'Gebe eine Bankverbindung an',
            'text-1' => 'Wir werden die Rückerstattung auf das Konto überweisen, das du in deinem Antrag angibst. Wir brauchen dafür nur deinen Namen und deine IBAN.',
            'text-2' => 'Solange dein Antrag noch nicht bearbeitet wurde, kannst du deine Kontodaten jederzeit ändern, indem du dich über dieses Formular erneut anmeldest.'
        ],
        'step-3' => [
            'title' => 'Warten, bis wir deinen Antrag bearbeiten',
            'text' => 'Wir versuchen so schnell wie möglich, die Rückerstattungen abzuarbeiten und euer Geld zurückerstatten. Sobald wir deinen Antrag bearbeiten und das Geld überweisen, werden wir dich per E-Mail informieren.'
        ]
    ],
    'mail-check' => [
        'text-1' => 'Wir haben dir eine E-Mail an <span class="font-medium text-asta-red">:email</span> gesendet.',
        'text-2' => 'Bitte öffne diese E-Mail und klicke auf den Link, um deine E-Mail-Adresse zu bestätigen. Falls die E-Mail nicht in deinem Posteingang landet, suche auch im Spam-Ordner. Du kannst auch einen neuen Link anfordern.',
        'text-3' => 'Falls du Probleme mit der Verifizierung hast, wende dich gerne an den <a href="mailto::support-mail" class="text-asta-red font-medium hover:opacity-70 underline">AStA Support</a>!',
    ],
    'student-verification' => 'Studierenden-Verifizierung',
    '9-euro-ticket-refund' => '9€-Ticket Rückerstattung',
    'i_accept_privacy_policy' => 'Die Verarbeitung der Daten erfolgt lediglich zum Zweck der Rückerstattung der Überzahlung des Semestertickets im Rahmen des 9€-Tickets. Ich willige hierfür in die Speicherung und Verarbeitung meiner Daten sowie in die <a href=":link" class="text-asta-red underline hover:opacity-70">Datenschutzbestimmungen</a> des AStA ein.',
    'back' => 'Zurück',
    'continue' => 'Weiter',
    'email' => ':university E-Mail',
    'your-email' => 'Deine :university E-Mail',
    'enter-email-to-continue' => 'Um fortzufahren, musst du nun deine Studierenden-Email angeben, damit wir verifizieren können, dass du an der :university-full studierst.',
    'no-private-email' => 'Gebe hier nicht deine private E-Mail Adresse an (z.B. Gmail).',
    'example-mail-format' => 'Die E-Mail sollte mit <span class="font-bold">:email</span> enden.',
    'email-placeholder' => 'z.B. :example-mail',
    'my-refund' => 'Meine Rückerstattung',
    'check-mail' => 'Überprüfe dein Postfach',
    'email-verification' => 'E-Mail-Verifizierung',
    'resend-verification' => 'Mail erneut senden',
    'save' => 'Bankdaten aktualisieren',
    'submit' => 'Antrag einreichen',
    'matriculation-number' => 'Matrikelnummer',
    'matriculation-number-placeholder' => 'z.B. 123456',
    'your-matriculation-number' => 'Deine Matrikelnummer',
    'matriculation_number_unchangeable' => 'Deine Matrikelnummer kann jetzt nicht mehr geändert werden. Falls du eine falsche Matrikelnummer angegeben hast, kontaktiere bitte den <a class="font-semibold underline" href="mailto::support-mail">AStA Support</a>.',
    'can-not-be-edited' => 'kann nicht bearbeitet werden',
    'your-name' => 'Name der/des Kontoinhabenden',
    'name-placeholder' => 'z.B. Peter Fox',
    'your-iban' => 'IBAN',
    'iban-placeholder' => 'DEXX XXXX XXXX XXXX XXXX XX',
    'your-bank-details' => 'Deine Bankverbindung',
    'invalid-iban' => 'Die IBAN ist ungültig.',
    'verify-error' => [
        'not-leuphana-id' => 'Benutze nicht die Email-Adresse, die deine Leuphana-ID enthält. Nutze die, mit deinem Namen.',
        'not-university-mail' => 'Bitte nutze eine :university E-Mail-Adresse die mit ":suffix" endet (z.B. :example-mail).',
        'could-not-verify' => 'Tut uns leid, aber diese E-Mail existiert nicht in unseren Unterlagen',
        'invalid-matriculation-number' => 'Die Matrikelnummer ist ungültig. Sie darf nur aus Zahlen bestehen und ist 5-8 Ziffern lang.',
        'matriculation-number-not-found' => 'Wir kennen diese Matrikelnummer nicht, weshalb wir dir keine Rückerstattung ausstellen könnnen. Falls du glaubst, das sei ein Fehler, kontaktiere bitte den <a class="font-semibold underline" href="mailto::support-mail">AStA Support</a>.',
        'matriculation-number-used' => 'Diese Matrikelnummer wurde bereits für einen anderen Antrag verwendet. Falls du glaubst, das sei ein Fehler, kontaktiere bitte den <a class="font-semibold underline" href="mailto::support-mail">AStA Support</a>.',
        'email-not-found' => 'Wir können deshalb nicht verifizieren, dass du Anspruch auf eine Rückerstattung hast. <br> Falls du Fragen hast, oder du eigentlich immatrikuliert bist, kontaktiere bitte den <a class="font-semibold underline" href="mailto::support-mail">AStA Support</a>.',
    ],
    'mails' => [
        'hello' => 'Hallo!',
        'your-team' => 'Dein AStA Team!',
        'verification' => [
            'title' => 'Verifizierung',
            'verification-button' => 'Bitte klicke nun auf den folgenden Button, um deine Verifizierung abzuschließen:',
            'verification-link' => 'Du kannst stattdessen auch diesen Link in deinen Browser kopieren:',
            'time-limit' => 'Der Link ist 48h Stunden gültig. Nach Ablauf musst du dich erneut verifizieren, um einen aktualisierten Link zu erhalten.',
            'finish-verification' => 'Verifizierung abschließen',
            'support' => 'Falls du Probleme mit der Verifizierung hast, melde dich gerne beim <a href="mailto::email">AStA Support</a>.',
            'message' => 'Du hast dich beim <span style="font-weight: 600;">:name</span> verifizieren wollen, um eine Rückerstattung für das 9€-Ticket anzufordern.',
        ],
        'submit-confirmation' => [
            'title' => 'Confirmation',
            'message' => 'Du hast deinen Antrag auf Rückerstattung für das 9€-Ticket beim <span style="font-weight: 600;">:name</span> eingereicht.<br>Wir haben deinen Antrag erhalten und werden bei dir melden, sobald wir das Geld überweisen.',
            'verification-button' => 'Bitte klicke nun auf den folgenden Button, um deine Verifizierung abzuschließen:',
            'verification-link' => 'Du kannst stattdessen auch diesen Link in deinen Browser kopieren:',
            'time-limit' => 'Der Link ist 48h Stunden gültig. Nach Ablauf musst du dich erneut verifizieren, um einen aktualisierten Link zu erhalten.',
            'support' => 'Falls du Probleme mit der Verifizierung hast, melde dich gerne beim <a href="mailto::email">AStA Support</a>.',
        ]
    ],
    'footer' => [
        'imprint' => 'Impressum',
        'privacy-policy' => 'Datenschutzerklärung',
        'faq' => 'FAQ – Häufig gestellte Fragen',
        'powered-by' => 'Betrieben durch den <a href=":homepage">Allgemeinen Student*innenausschuss der :university</a>',
    ]
];
