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
                'message' => 'Dein Antrag ist bei uns eingegangen und wird in Kürze bearbeitet. Du hast jetzt alles getan, was du tun musst!'
            ],
            'email-notification' => 'Sobald die Rückerstattungen ausgezahlt werden, wirst du per E-Mail benachrichtigt.',
            'change-details' => 'Solange der Antrag noch nicht bearbeitet wurde, kannst du deine Bankverbindung jederzeit ändern.',
        ],
        'exported' => [
            'title' => 'Deine Rückerstattung ist abgeschlossen!',
            'message' => 'Wir haben unsere Bank informiert und das Geld wird demnächst überwiesen.'
        ]
    ],
    'student-verification' => 'Studierenden-Verifizierung',
    '9-euro-ticket-refund' => '9€-Ticket Rückerstattung',
    'i_accept_privacy_policy' => 'Die Verarbeitung der Daten erfolgt lediglich zum Zweck der Rückerstattung der Überzahlung des Semestertickets im Rahmen des 9€-Tickets. Ich willige hierfür in die Speicherung und Verarbeitung meiner Daten sowie in die <a href=":link" class="text-asta-red underline hover:opacity-70">Datenschutzbestimmungen</a> des AStA ein.',
    'back' => 'Zurück',
    'continue' => 'Weiter',
    'email' => ':university E-Mail',
    'your-email' => 'Deine :university E-Mail',
    'enter-email-to-continue' => 'Um fortzufahren, musst du nun deine Studierenden-Email angeben, damit wir dich verifizieren können.',
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
    'your-matriculation-number' => 'Deine Matrikelnummer',
    'can-not-be-edited' => 'kann nicht bearbeitet werden',
    'your-name' => 'Name',
    'name-placeholder' => 'z.B. Peter Fox',
    'your-iban' => 'IBAN',
    'iban-placeholder' => 'DEXX XXXX XXXX XXXX XXXX XX',
    'your-bank-details' => 'Deine Bankverbindung',
    'invalid-iban' => 'Die IBAN ist ungültig.',
    'verify-error' => [
        'not-leuphana-id' => 'Benutze nicht die Email-Adresse, die deine Leuphana-ID enthält. Nutze die, mit deinem Namen.',
        'could-not-verify' => 'Tut uns leid, aber diese E-Mail existiert nicht in unseren Unterlagen',
        'email-not-found' => 'Wir können deshalb nicht verifizieren, dass du Anspruch auf eine Rückerstattung hast. <br> Falls du Fragen hast, oder du eigentlich immatrikuliert bist, kontaktiere bitte den <a class="font-semibold underline" href="mailto::support-mail">AStA Support</a>.',
    ],
    'mails' => [
        'hello' => 'Hallo!',
        'your-team' => 'Dein AStA Team!',
        'powered-by' => 'Betrieben durch den <a href=":homepage">Allgemeinen Student*innenausschuss der :university</a>',
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
];
