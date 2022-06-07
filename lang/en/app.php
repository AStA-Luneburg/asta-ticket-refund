<?php

return [
    'languages' => [
        'de' => 'Deutsch',
        'en' => 'English',
    ],
    'steps' => [
        'first' => 'Welcome',
        'second' => 'Verify you\'re eligble',
        'third' => 'Enter your bank account details'
    ],
    'notifications' => [
        'success' => [
            'saved' => [
                'title' => 'Your changes have been saved!',
                'message' => 'We have updated your refund request with the new details.'
            ],
            'submitted' => [
                'title' => 'We have received your refund request!',
                'message' => 'We will try to process your refund as fast as possible. You can now close this site.'
            ],
            'email-notification' => 'Once the refunds are paid out, you will be notified by email.',
            'change-details' => 'As long as the application has not been processed, you can change your bank details at any time.',
        ],
        'exported' => [
            'title' => 'Your refund is complete!',
            'message' => 'We have informed our bank and the money will be transferred soon.'
        ]
    ],
    'welcome' => [
        'welcome-1' => 'Starting June 2022, the 9€-ticket became available for 3 months, letting you use all public transport across Germany. <strong class="font-semibold">However, students owning a Semesterticket do not need to buy it!</strong>',
        'welcome-2' => 'Throughout the months of June, July and August, your Semesterticket actually becomes a 9€-ticket.<br>Since you pay more than 9€ for the Semesterticket, you can now get a refund for those three months.',
        'how-does-it-work' => 'How does it work?',
        'step-1' => [
            'title' => 'Verify that you are/were a student at :university during the June, July and August 2022',
            'text' => 'We will send an email to your :university email address to verify you\'re really you. This email contains a link that you can use to login and fill out your refund request.',
        ],
        'step-2' => [
            'title' => 'Enter your bank account details',
            'text-1' => 'The refund will be transferred onto the account that you mention in your request. For that we only need your name and an IBAN number.',
            'text-2' => 'You can change your bank account details while the request is still pending. To do so, simply enter your email again and get a new link.'
        ],
        'step-3' => [
            'title' => 'Wait until we\'ve processed your request',
            'text' => 'We try to pay the refunds as fast as possible. We will notify you as soon as we process your request and transfer the money.',
        ]
    ],
    'mail-check' => [
        'text-1' => 'We just sent an email to <span class="font-medium text-asta-red">:email</a>.',
        'text-2' => 'Please open this mail and click on the link to verify your identity. If you cannot find an email in your inbox, check the spam folder. You can also generate another link below.',
        'text-3' => 'Feel free to contact <a href="mailto::support-mail" class="text-asta-red font-medium hover:opacity-70 underline">AStA support</a> if you have any problems verifying!',
    ],
    'student-verification' => 'Student Verification',
    '9-euro-ticket-refund' => '9€-Ticket Refund',
    'i_accept_privacy_policy' => 'The data will be processed only for the purpose of refunding the overpayment of the semester ticket under the 9€ ticket. For this purpose, I consent to the storage and processing of my data as well as to the <a href=":link" class="text-asta-red underline hover:opacity-70">data protection regulations</a> of the AStA.',
    'back' => 'Back',
    'continue' => 'Continue',
    'email' => ':university Email',
    'your-email' => 'Your :university email',
    'enter-email-to-continue' => 'To continue, you\'ll have to enter your student email address, so we can verify that you\'re a student at :university-full.',
    'no-private-email' => 'Do not enter your private email address (e.g. Gmail).',
    'example-mail-format' => 'This email address should end with <span class="font-bold">:email</span>.',
    'email-placeholder' => 'e.g. :example-mail',
    'my-refund' => 'My Refund',
    'check-mail' => 'Check your inbox',
    'email-verification' => 'E-Mail Verification',
    'resend-verification' => 'Resend verification email',
    'save' => 'Save',
    'matriculation-number' => 'Matriculation Number',
    'your-matriculation-number' => 'Your matriculation number',
    'can-not-be-edited' => 'can not be edited',
    'your-name' => 'Name',
    'name-placeholder' => 'e.g. Michelle Obama',
    'your-iban' => 'IBAN',
    'iban-placeholder' => 'DEXX XXXX XXXX XXXX XXXX XX',
    'your-bank-details' => 'Your bank account details',
    'invalid-iban' => 'Invalid IBAN',
    'verify-error' => [
        'not-leuphana-id' => 'Don\'t use the email address that includes your Leuphana-ID. Use the one including your name.',
        'could-not-verify' => 'We\'re sorry, but we could not find your email address in our records.',
        'email-not-found' => 'Therefore, we could not verify that you\'re eligble for a refund. <br> If you have any questions or you think this is a mistake, please contact <a class="font-semibold underline" href="mailto::support-mail">AStA support</a>.',
    ],
    'mails' => [
        'hello' => 'Hello!',
        'your-team' => 'Your AStA team!',
        'verification' => [
            'title' => 'Verification',
            'verification-button' => 'Please click the following button to complete your verification:',
            'verification-link' => 'You can also copy & paste this link into your browser instead:',
            'time-limit' => 'This link is valid for 48 hours. After that, you will need to verify again to get a new link.',
            'finish-verification' => 'Complete verification',
            'support' => 'If you have any problems verifying, feel free to contact <a href="mailto::email">AStA support</a>.',
            'message' => 'You tried to verify yourself with the <span style="font-weight: 600;">:name</span>, in order to apply for a Semesterticket refund due to the German 9€ ticket.',
        ],
        'submit-confirmation' => []
    ],
    'footer' => [
        'imprint' => 'Imprint',
        'privacy-policy' => 'Privacy Policy',
        'faq' => 'FAQ – Frequently Asked Questions',
        'powered-by' => 'A service of the <a href=":homepage">AStA :university</a>.',
    ]
];
