@if(isset($profile))

<form method="POST" action="{{ route('update_experiences', $profile->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div id="experiences">
        <input type="hidden" name="profile_id" id="profile_id" class="form-control" value="{{ isset($profile) ? $profile->id : '' }}">
        @for($i=0; $i < count($profile->experiences); $i ++)
            <fieldset>
                <legend>Nouvelle expérience</legend>
                <input
                    type="hidden"
                    name="experiences[{{$i}}][id]"
                    id="experiences[{{$i}}][id]"
                    value="{{ $profile->experiences[$i]->id }}">
                <div class="form-group">
                    <label
                        for="experiences[{{$i}}][title]">
                        Titre
                    </label>
                    <input
                        type="text"
                        name="experiences[{{$i}}][title]"
                        id="experiences[{{$i}}][title]"
                        value="{{ $profile->experiences[$i]->title }}">
                </div>
                <div class="form-group">
                    <label
                        for="experiences[{{$i}}][description]">
                        Description
                    </label>
                    <input
                        type="text"
                        name="experiences[{{$i}}][description]"
                        id="experiences[{{$i}}][description]"
                        value="{{ $profile->experiences[$i]->description }}">
                </div>
                <div class="form-group">
                    <label
                        for="experiences[{{$i}}][url]">
                        Lien site web
                    </label>
                    <input
                        type="text"
                        name="experiences[{{$i}}][url]"
                        id="experiences[{{$i}}][url]"
                        value="{{ $profile->experiences[$i]->url }}">
                </div>
                <div class="form-group">
                    <label
                        for="experiences[{{$i}}][github]">
                        Lien Github
                    </label>
                    <input
                        type="text"
                        name="experiences[{{$i}}][github]"
                        id="experiences[{{$i}}][github]"
                        value="{{ $profile->experiences[$i]->github }}">
                </div>


                <div class="form-group">
                    <label
                        for="experiences[{{$i}}][skills]">
                        Compétences
                    </label>
                    <select multiple name="skills">
                        <option value="react">React</option>
                        <option value="vue">Vue</option>
                        <option value="symfonu">Symfony</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="experiences[{{$i}}][picture]">Photo de profil</label>
                    <input type="file" name="experiences[{{$i}}][picture]" id="experiences[{{$i}}][picture]" class="form-control">
                    
                    @if(isset($profile->experiences[$i]->picture))
                    coucoiucoucocuo
                    <br />
                    <img src="{{ asset('uploads/images/' . $profile->experiences[$i]->picture) }}" alt="photo du projet {{ $profile->experiences[$i]->title }}">
                    <div class="form-group flex">
                        <input id="experiences[{{$i}}][delete_picture]" name="experiences[{{$i}}][delete_picture]" class="form-control" type="checkbox">
                        <label for="experiences[{{$i}}][delete_picture]">Supprimer l'image</label>
                    </div>
                    @endif
                </div>



                <div class="form-group">
                    <input
                        type="checkbox"
                        name="experiences[{{$i}}][delete]"
                        id="experiences[{{$i}}][delete]">
                    <label
                        for="experiences[{{$i}}][delete]">
                        Supprimer
                    </label>
                </div>



            </fieldset>
            @endfor
    </div>
    </div>
    <button class=" button" type="button" id="add-experience">Ajouter une expérience</button> <br />
    <input type="submit" class="button" value="enregistrer" name="add_experiences">
</form>
@endif