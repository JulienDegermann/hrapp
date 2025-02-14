<form method="POST" action="{{ route('admin.save_job', $job->id ?? null ) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="title">
            Titre de l'annonce<span class="req"> *</span>
        </label>
        <input type="text" name="title" id="title" @if(isset($job)) value="{{ $job->title }}" @endif required autofocus>
    </div>
    <div class="form-group">
        <label for="description">
            Description<span class="req"> *</span>
        </label>
        <textarea name="description" id="description" required>@if(isset($job)){{ $job->description }}@endif</textarea>
    </div>
    <div class="form-group">
        <label for="location">
            Lieu de travail<span class="req"> *</span>
        </label>
        <input type="text" name="location" id="location" @if(isset($job)) value="{{ $job->location }}" @endif required>
    </div>
    <div class="form-group">
        <label for="remuneration_min">
            Rémunération minimale<span class="req"> *</span>
        </label>
        <input type="int" name="remuneration_min" id="remuneration_min" @if(isset($job)) value="{{ $job->remuneration_min }}" @endif required>
    </div>
    <div class="form-group">
        <label for="remuneration_max">
            Rémunération maximale<span class="req"> *</span>
        </label>
        <input type="int" name="remuneration_max" id="remuneration_max" @if(isset($job)) value="{{ $job->remuneration_max }}" @endif required>
    </div>
    <div class="form-group">
        <label for="start_date">
            Date de commencement souhaitée<span class="req"> *</span>
        </label>
        <input type="date" name="start_date" id="start_date" @if(isset($job)) value="{{ $job->start_date }}" @endif required>
    </div>
    <div class="form-group">
        <label for="publised_at">
            Date de publication
        </label>
        <input type="date" name="publised_at" id="publised_at" @if(isset($job)) value="{{ $job->publised_at }}" @endif>
    </div>

    <div class="form-group">
        <label for="picture">Image du poste</label>
        <input type="file" name="picture" id="picture" class="form-control">
        @if(isset($job->picture))
        <br />
        <img src="{{ asset('uploads/images/' . $job->picture) }}" alt="photo du poste {{ $job->title }}">
        <div class="form-group flex">
            <input id="delete_picture" name="delete_picture" class="form-control" type="checkbox">
            <label for="delete_picture">Supprimer l'image</label>
        </div>
        @endif
    </div>
    <input class="button" type="submit" value="enregistrer">
    <p><span class="req">*</span> : champs obligatoires</p>
</form>