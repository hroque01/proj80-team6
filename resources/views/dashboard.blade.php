@extends('layouts.app')

@section('content')
    <div class="container dashboard-card">
        <div class="pt-5">

            {{-- title --}}
            <div class="text-center">
                <h1 class="dashboard-title">Ti diamo il benvenuto sul <span>Restaurant Hub</span>. </h1>
                <p class="mt-3" >{{ __('Sfrutta i dati a disposizione per far crescere il tuo business. Monitora le vendite, controlla i tuoi progressi e attira nuovi clienti con offerte speciali.') }}</p>
                <p class="mb-5">Adesso è ancora pi&uacute; facile modificare il tuo men&uacute;</p>
            </div>
            
            <div class="dash-flex">

                {{-- menu piatti --}}
                <div class="card">
                    <div class="header-dash">
                        Men&uacute;
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <img src="{{Vite::asset('resources/img/menu-res.jpg')}}" alt="menu ristorante">
                        
                        {{-- list --}}
                        <ul>
                            <li>
                                <span>&check;</span>Carica le tue foto in un istante
                            </li>
                            <li>
                                <span>&check;</span>Modifica facilmente nomi, descrizioni e prezzi
                            </li>
                            <li>
                                <span>&check;</span>Pubblica il tuo men&uacute; in pochi secondi
                            </li>
                            <li>
                                <span>&check;</span>Il tuo men&uacute; &eacute; sempre aggiornato e il tuoi clienti sono soddisfatti
                            </li>
                        </ul>

                        <div class="dashboard-link">
                            <a href="/restaurant" class="btn">Visualizza men&uacute;</a>
                        </div>
                        
                    </div>
                </div>
                {{-- chiusura menu piatti --}}

                {{-- lista ordini --}}
                <div class="card">
                    <div class="header-dash">
                        Ordini
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <img src="{{Vite::asset('resources/img/stats.jpg')}}" alt="menu ristorante">
                        
                        {{-- list --}}
                        <ul>
                            <li>
                                <span>&check;</span>Visualizza il riepilogo dei tuoi ordini
                            </li>
                            <li>
                                <span>&check;</span>Visualizza i dati dell'utente che ha effettuato l'ordine
                            </li>
                            <li>
                                <span>&check;</span>Visualizza le statistiche degli ordini ricevuti per mese/anno
                            </li>
                            <li>
                                <span>&check;</span>Visualizza l&#39;ammontare delle vendite
                            </li>
                        </ul>

                        <div class="dashboard-link">
                            <a href="/order" class="btn">Visualizza ordini</a>
                        </div>
                        
                    </div>
                </div>
                {{-- chiusura lista ordini --}}
            </div>
        </div>
    </div>
@endsection