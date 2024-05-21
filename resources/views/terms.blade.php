@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>
        <div class="col-6">
            <h1>Terms and Conditions</h1>
            <div>Benvenuti nel nostro sito web. Prima di utilizzare il nostro sito, vi preghiamo di leggere attentamente i
                seguenti termini e condizioni. L'utilizzo del nostro sito implica l'accettazione piena e incondizionata di
                questi termini e condizioni. Se non accettate questi termini e condizioni, vi preghiamo di non utilizzare il
                nostro sito.

                Utilizzo del Sito: Il nostro sito è destinato all'uso personale e non commerciale. Non è consentito
                utilizzare il sito per scopi illegali o non autorizzati.

                <h3>Contenuti:</h3> Tutti i contenuti presenti sul sito, inclusi testi, immagini, video, sono di nostra
                proprietà o utilizzati con il permesso dei proprietari. È vietata la riproduzione, distribuzione o modifica
                dei contenuti senza il nostro consenso.
                <h3> Privacy:</h3>Rispettiamo la privacy dei nostri utenti. Consultate la nostra politica sulla privacy per
                informazioni dettagliate su come raccogliamo, utilizziamo e proteggiamo i vostri dati personali.

                <h3> Cookie:</h3> Utilizziamo i cookie per migliorare l'esperienza degli utenti sul nostro sito. Continuando
                a utilizzare il sito, accettate l'uso dei cookie secondo la nostra politica sui cookie.
                <h3>Legge applicabile:</h3> Questi termini e condizioni sono regolati e interpretati secondo le leggi
                vigenti nel nostro Paese.

                Per qualsiasi domanda riguardante i nostri termini e condizioni, vi preghiamo di contattarci.
            </div>

        </div>
        <div class="col-3">
            @include('shared.search_box')
            @include('shared.follow_box')

        </div>
    </div>
@endsection
