<div>
    <h2> {{ $profile ? 'Modifier le' : 'Ajouter un' }} profil</h2>

    <form
        id="profile_form"
        method="POST"
        action="{{ route('admin.save_profile', $profile->id ?? null) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Prénom<span class="req"> *</span></label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ isset($profile) ? $profile->first_name : '' }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="last_name">Nom<span class="req"> *</span></label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ isset($profile) ? $profile->last_name : '' }}" required>
        </div>
        <div class="form-group">
            <label for=" email">Email<span class="req"> *</span></label>
            <input type="email" name="email" id="email" class="form-control" value="{{ isset($profile) ? $profile->email : '' }}" required>
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
            <label for="linkedin">Profil Linkedin<span class="req"> *</span></label>
            <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ isset($profile) ? $profile->linkedin : '' }}" required>
        </div>
        <div class="form-group">
            <label for="github">Profil GitHub</label>
            <input type="url" name="github" id="github" class="form-control" value="{{ isset($profile) ? $profile->github : '' }}">
        </div>
        <div class="form-group">
            <label for="resume">Présentation</label>
            <textarea name="resume" id="resume" class="form-control">{{ isset($profile) ? $profile->resume : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="picture">Photo de profil</label>
            <input type="file" name="picture" id="picture" class="form-control">
            @if(isset($profile->picture))
            <br />
            <img src="{{ asset('uploads/images/' . $profile->picture) }}" alt="photo de profil de {{ $profile->first_name }}">
            <div class="form-group flex">
                <input id="delete_img" name="delete_img" class="form-control" type="checkbox">
                <label for="delete_img">Supprimer l'image</label>
            </div>
            @endif
        </div>

        <input type="submit" class="button" value="enregistrer" name="save_profile">
        <p><span class="req">*</span> : champs obligatoires</p>
    </form>
</div>