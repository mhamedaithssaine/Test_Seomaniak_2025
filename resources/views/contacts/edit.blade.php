@extends('layouts.app')

@section('title', 'Modifier le contact')

@section('content')
    <a href="{{ route('contacts.index') }}" class="btn-back">← Retour à la liste</a>

    <div class="card">
        <h1 class="card-title">Modifier le contact</h1>

        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" novalidate>
            @method('PUT')
            @include('contacts._form', ['submitLabel' => 'Mettre à jour'])
        </form>
    </div>
@endsection
