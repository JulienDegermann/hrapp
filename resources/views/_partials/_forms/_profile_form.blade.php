<form method="POST" action="{{ isset($profile) ? route('admin.profile.edit', ['id' => $profile->id]) : route('admin.profile.create') }}">
    @csrf
    @method('PUT')
    <legend> {{ isset($profile) ? 'Modifier' : 'Ajouter' }} un profil</legend>
    <div class="form-group">
        <label for="first_name">Prénom</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ isset($profile) ? $profile->first_name : '' }}">
    </div>
    <div class="form-group">
        <label for="last_name">Nom</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ isset($profile) ? $profile->last_name : '' }}">
    </div>
    <div class="form-group">
        <label for=" email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ isset($profile) ? $profile->email : '' }}">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ isset($profile) ? $profile->phone : '' }}">
    </div>
    <div class="form-group">
        <label for="date_of_birth">Date de naissance</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ isset($profile) ? $profile->date_of_birth : '' }}">
    </div>
    <div class="form-group">
        <label for="linkedin">Profil Linkedin</label>
        <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ isset($profile) ? $profile->linkedin : '' }}">
    </div>
    <div class="form-group">
        <label for="github">Profil GitHub</label>
        <input type="url" name="github" id="github" class="form-control" value="{{ isset($profile) ? $profile->github : '' }}">
    </div>
    <div class="form-group">
        <label for="resume">Présentation</label>
        <textarea name="resume" id="resume" class="form-control">{{ isset($profile) ? $profile->resume : '' }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>