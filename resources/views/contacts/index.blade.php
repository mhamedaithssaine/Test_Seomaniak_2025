@extends('layouts.app')

@section('title', 'Liste des contacts')

@section('content')
    <div class="card">
        <div class="page-header">
            <h1 class="page-title">Contacts</h1>
            <a href="{{ route('contacts.create') }}" class="btn-primary">Nouveau contact</a>
        </div>

        <div class="table-wrap table-wrap--scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Notes</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ str()->limit($contact->notes ?? '', 30) }}</td>
                            <td class="text-end">
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn-link">Modifier</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">Aucun contact pour le moment. <a href="{{ route('contacts.create') }}" class="btn-link" style="margin-top: 0.5rem;">Créer un contact</a></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($contacts->hasPages())
            <div class="pagination-wrap">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
@endsection
