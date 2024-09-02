<?php

use App\Http\Controllers\AngularController;
use Illuminate\Support\Facades\Route;

Route::get('/bootstrap-italia/i18n/it.json', function () {
    //resource_path('public/assets/angular/browser/bootstrap-italia/i18n/it.json')
    return response()->json([
      "it"=> [
        "general"=> [
          "save"=> "Salva",
          "send"=> "Invia",
          "abort"=> "Annulla",
          "close"=> "Chiudi",
          "continue"=> "Continua",
          "edit"=> "Modifica",
          "show"=> "Visualizza",
          "show-all"=> "Mostra tutto",
          "details"=> "Dettagli",
          "download"=> "Scarica"
        ],
        "errors"=> [
          "generic"=> "Si è verificato un errore",
          "generic-support-message"=> "Si è verificato un errore imprevisto. Riprova più tardi o contatta il supporto.",
          "invalid-field"=> "Questo campo non è valido",
          "required-field"=> "Questo campo è obbligatorio",
          "check-all-fields"=> "Verifica di aver compilato correttamente tutti i campi",
          "min-invalid"=> "Il valore minimo per questo campo è=> {{min}}",
          "max-invalid"=> "Il valore massimo per questo campo è=> {{max}}",
          "min-length-invalid"=> "La lunghezza minima per questo campo è=> {{min}}",
          "max-length-invalid"=> "La lunghezza massima per questo campo è=> {{max}}",
          "email-invalid"=> "Inserisci un email valida",
          "tel-invalid"=> "Inserisci un formato telefonico valido",
          "url-invalid"=> "Inserisci un url valido",
          "tax-code-invalid"=> "Inserisci un codice fiscale valido",
          "vat-number-invalid"=> "Inserisci una partita iva valida",
          "cap-invalid"=> "Inserisci un CAP valido",
          "iban-invalid"=> "Inserisci un IBAN valido",
          "regex-invalid"=> "Inserisci un espressione REGEX valida",
          "pattern-invalid"=> "Il campo deve avere il pattern {{pattern}}",
          "password-no-match"=> "Le password devono essere identiche",
          "password-min-length"=> "La password deve contenere almeno {{minLength}} caratteri!",
          "password-number"=> "La password deve avere almeno un numero!",
          "password-capital-case"=> "La password deve contenere almeno un carattere maiuscolo!",
          "password-small-case"=> "La password deve contenere almeno un carattere minuscolo!",
          "password-special-character"=> "La password deve contenere almeno un carattere speciale!"
        ],
        "core"=> [
          "close-modal"=> "Chiudi finestra modale",
          "close-notification"=> "Chiudi notifica=> {{title}}",
          "close-alert"=> "Chiudi avviso",
          "page"=> "Pagina",
          "previous"=> "Precedente",
          "previous-page"=> "Pagina precedente",
          "next"=> "Successiva",
          "next-page"=> "Pagina successiva",
          "go-to"=> "Vai a",
          "page-of-total"=> "Pagina {{page}} di {{total}}",
          "progress"=> "Progresso",
          "loading"=> "Caricamento",
          "active"=> "Attivo",
          "remove"=> "Elimina",
          "confirm"=> "Conferma",
          "confirmed"=> "Confermato",
          "step"=> "Step",
          "step-of"=> "Step {{current}} di {{available}}",
          "back"=> "Indietro",
          "forward"=> "Avanti",
          "rate-star"=> "Valuta {{current}} stelle su {{total}}",
          "rating-star"=> "Valutazione {{current}} stelle su {{total}}"
        ],
        "form"=> [
          "caps-inserted"=> "CAPS LOCK inserito",
          "password-strength-meter"=> [
            "description"=> [
              "default"=> "Inserisci almeno {{minLength}} caratteri",
              "number"=> "un numero",
              "capital-case"=> "un carattere maiuscolo",
              "special-character"=> "un carattere speciale"
            ],
            "password-short"=> "Password molto debole",
            "password-bad"=> "Password debole",
            "password-good"=> "Password sicura",
            "password-strong"=> "Password molto sicura"
          ],
          "increase-value"=> "Aumenta valore",
          "decrease-value"=> "Diminuisci valore",
          "upload"=> "Upload",
          "upload-drag-file"=> "Trascina il file per caricarlo",
          "upload-loading"=> "Caricamento in corso...",
          "upload-complete"=> "Caricamento completato",
          "upload-or"=> "oppure",
          "upload-select-device"=> "selezionalo dal dispositivo",
          "uploaded-file"=> "File caricato=> {{name}}",
          "delete-file"=> "Elimina file {{name}}"
        ],
        "navigation"=> [
          "home"=> "Home",
          "go-back"=> "Torna indietro",
          "upper-level"=> "Livello superiore",
          "secondary-navigation"=> "Navigazione secondaria",
          "login"=> "Accedi",
          "full-login"=> "Accedi all'area personale",
          "search"=> "Cerca",
          "website-search"=> "Cerca nel sito",
          "navigation-path"=> "Percorso di navigazione"
      ],
        "navbar"=> [
          "aria-label-main"=> "Navigazione principale",
          "aria-label-toggle"=> "Mostra/Nascondi la navigazione",
          "hide"=> "Nascondi la navigazione"
        ],
        "utils"=> [
          "selected"=> "Selezionata",
          "language-selection"=> "Selezione lingua=> {{lang}}",
          "select-language"=> "Seleziona una lingua",
          "error-page"=> [
            "404"=> [
              "title"=> "Risorsa non trovata",
              "description"=> "Oops! La risorsa che cerchi non è stata trovata, torna alla homepage e utilizza il menu per continuare la navigazione."
            ],
            "403"=> [
              "title"=> "Non autorizzato",
              "description"=> "Non sei autorizzato ad accedere a questa risorsa!"
            ],
            "500"=> [
              "title"=> "Si è verificato un errore",
              "description"=> "Si è verificato un errore imprevisto. Riprova più tardi o contatta il supporto."
            ],
            "go-to-homepage"=> "Torna alla homepage"
          ]
        ],
        "date-ago-pipe"=> [
          "just-now"=> "Proprio adesso",
          "singular-year-ago"=> "{{count}} anno fa",
          "year-ago"=> "{{count}} anni fa",
          "singular-month-ago"=> "{{count}} mese fa",
          "month-ago"=> "{{count}} mesi fa",
          "singular-week-ago"=> "{{count}} settimana fa",
          "week-ago"=> "{{count}} settimane fa",
          "singular-day-ago"=> "{{count}} giorno fa",
          "day-ago"=> "{{count}} giorni fa",
          "singular-hour-ago"=> "{{count}} ora fa",
          "hour-ago"=> "{{count}} ore fa",
          "singular-minute-ago"=> "{{count}} minuto fa",
          "minute-ago"=> "{{count}} minuti fa",
          "singular-second-ago"=> "{{count}} secondo fa",
          "second-ago"=> "{{count}} secondi fa"
        ],
        "duration"=> [
          "second"=> "{{count}} secondo",
          "seconds"=> "{{count}} secondi",
          "minute"=> "{{count}} minuto",
          "minutes"=> "{{count}} minuti",
          "hour"=> "{{count}} ora",
          "hours"=> "{{count}} ore",
          "day"=> "{{count}} giorno",
          "days"=> "{{count}} giorni",
          "week"=> "{{count}} settimana",
          "weeks"=> "{{count}} settimane",
          "month"=> "{{count}} mese",
          "months"=> "{{count}} mesi",
          "year"=> "{{count}} anno",
          "years"=> "{{count}} anni"
        ]
      ]
    ]);
});

require __DIR__.'/auth.php';
Route::any('/{any}', [AngularController::class, 'index'])->where('any', '^(?!api).*$');

