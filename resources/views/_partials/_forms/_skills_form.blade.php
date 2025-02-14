<div>

    <h2>{{ $skill ? 'Modifier la' : 'Créer une nouvelle'  }} compétence</h2>

    <form id="skills_form"action="{{ route('admin.save_skill', ['id' => isset($skill) ? $skill->id : null]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Nom<span class="req"> *</span></label>
            <input type="text" name="title" id="" @if(isset($skill)) value="{{$skill->title}}" @endif required autofocus>
        </div>
        <div class="form-group">
            <label for="version">Version</label>
            <input type="text" name="version" id="" @if(isset($skill)) value="{{$skill->version}}" @endif>
        </div>
        <input class="button" type="submit" value="Enregistrer" value="save_skill">
        <p><span class="req">*</span> : champs obligatoires</p>
    </form>
</div>