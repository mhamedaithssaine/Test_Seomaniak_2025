@extends('layouts.app')

@section('title', 'Nouveau contact')

@section('content')
    <div class="card">
        <h1 class="card-title">Nouveau contact</h1>

        <form action="{{ route('contacts.store') }}" method="POST" novalidate>
            @include('contacts._form', ['submitLabel' => 'Créer le contact', 'contact' => new \App\Models\Contact()])
        </form>
    </div>
@endsection
