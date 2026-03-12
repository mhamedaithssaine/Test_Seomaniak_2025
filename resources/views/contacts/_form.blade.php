@csrf

<div class="form-group">
    <label class="form-label" for="first_name">Prénom</label>
    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Jean"
           value="{{ old('first_name', $contact->first_name ?? '') }}" autofocus>
    @error('first_name')
    <div class="form-error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="last_name">Nom</label>
    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Dupont"
           value="{{ old('last_name', $contact->last_name ?? '') }}">
    @error('last_name')
    <div class="form-error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="email">Email</label>
    <input type="text" id="email" name="email" class="form-control" placeholder="jean.dupont@exemple.fr" autocomplete="email"
           value="{{ old('email', $contact->email ?? '') }}">
    @error('email')
    <div class="form-error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="phone">Téléphone</label>
    <input type="text" id="phone" name="phone" class="form-control" placeholder="06 12 34 56 78"
           value="{{ old('phone', $contact->phone ?? '') }}">
    @error('phone')
    <div class="form-error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="notes">Notes</label>
    <textarea id="notes" name="notes" class="form-control" rows="3" placeholder="Notes optionnelles...">{{ old('notes', $contact->notes ?? '') }}</textarea>
    @error('notes')
    <div class="form-error">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn-primary">
    {{ $submitLabel ?? 'Enregistrer' }}
</button>
