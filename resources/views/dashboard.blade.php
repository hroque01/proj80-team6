@extends('layouts.app')

@section('content')
    <div class="container dashboard-card">
        <div class="pt-5">

            {{-- title --}}
            <div class="dashboard-title mb-4">
                <h1 class="mb-4">Ciao <span>{{Auth::user()-> restaurant->business_name}}</span>! Benvenuto nel tuo Restaurant Hub!</h1>
                <p>Sfrutta i dati a disposizione per far crescere il tuo business. Monitora le vendite, controlla i tuoi progressi e attira nuovi clienti con offerte speciali.</p>
                <p>Adesso è ancora pi&ugrave; facile modificare il tuo men&ugrave;&excl;</p>
            </div>
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-modal-dash mb-4" data-toggle="modal" data-target="#exampleModalCenter">
                Vedi dettagli del tuo ristorante
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{Auth::user()-> restaurant->business_name}}</h5>
            
                    </div>
                    <div class="modal-body">
                        <img src="{{Auth::user()-> restaurant->image}}" alt="">
                        <p>{{Auth::user()-> restaurant->address}}</p> 
                        <p><em>{{Auth::user()-> restaurant->description}}</em> </p> 
                        <p>{{Auth::user()-> restaurant->opening_time}} - {{Auth::user()-> restaurant->closure_time}}</p>
                        <p>{{Auth::user()-> restaurant->delivery_price}}&euro;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-dash" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

            <div class="dash-flex">

                {{-- menu piatti --}}
                <div class="card">
                    <div class="header-dash">
                        Men&ugrave;
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
                                <span>&check;</span>Pubblica il tuo men&ugrave; in pochi secondi
                            </li>
                            <li>
                                <span>&check;</span>Il tuo men&ugrave; &egrave; sempre aggiornato e il tuoi clienti sono soddisfatti
                            </li>
                        </ul>

                        <div class="dashboard-link">
                            <a href="/restaurant" class="btn">Visualizza men&ugrave;</a>
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
                                <span>&check;</span>Visualizza l'ammontare delle vendite
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