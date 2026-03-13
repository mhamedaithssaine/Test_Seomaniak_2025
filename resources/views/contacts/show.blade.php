@extends('layouts.app')

@section('title', 'Détail du contact')

@section('content')
    <a href="{{ route('contacts.index') }}" class="btn-back">← Retour à la liste</a>

    <div class="card contact-detail-card">
        <div class="page-header">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <div class="contact-avatar">{{ str()->upper(str()->substr($contact->first_name, 0, 1)) }}</div>
                <div>
                    <h1 class="card-title" style="margin: 0 0 0.25rem;">{{ $contact->first_name }} {{ $contact->last_name }}</h1>
                    <p style="margin: 0; font-size: 0.9375rem; color: var(--text-muted);">{{ $contact->email }}</p>
                </div>
            </div>
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn-primary">Modifier</a>
        </div>

        <div class="detail-items">
            <div class="detail-item">
                <div class="detail-item__label">Nom complet</div>
                <div class="detail-item__value">{{ $contact->first_name }} {{ $contact->last_name }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-item__label">Email</div>
                <div class="detail-item__value"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
            </div>
            <div class="detail-item">
                <div class="detail-item__label">Téléphone</div>
                <div class="detail-item__value">{{ $contact->phone ?? '—' }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-item__label">Notes</div>
                <div class="detail-item__value">{{ $contact->notes ?: '—' }}</div>
            </div>
        </div>
    </div>
@endsection
