@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="card dashboard-card">
                    <div class="card-header header-form">
                        <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo" class="logo-form">
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <h1 class="dashboard-title">Ti diamo il benvenuto sul <span>Restaurant Hub</span>. </h1>
                        {{ __('Sfrutta i dati a disposizione per far crescere il tuo business. Monitora le vendite, controlla i tuoi progressi e attira nuovi clienti con offerte speciali.') }}

                        <span>Adesso è ancora pi&uacute; facile modificare il tuo men&uacute;</span>
                        
                        {{-- list --}}
                        <ul>
                            <li>
                                <span>&check;</span>Carica le tue foto in un istante
                            </li>
                            <li>
                                <span>&check;</span>Modifica facilmente nomi, descrizioni e prezzi
                            </li>
                            <li>
                                <span>&check;</span>Offri varie opzioni ai tuoi clienti
                            </li>
                            <li>
                                <span>&check;</span> Pubblica il tuo men&uacute; in pochi secondi
                            </li>
                            <li>
                                <span>&check;</span>Il tuo men&uacute; &eacute; sempre aggiornato e il tuoi clienti sono soddisfatti
                            </li>
                        </ul>

                        <div class="dashboard-link">
                            <a href="/restaurant" class="btn">Comicia</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection