@if(isset($profile))

<form method="POST" action="{{ route('update_experiences', $profile->id) }}">
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