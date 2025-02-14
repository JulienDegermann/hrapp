<form action="{{ route('job_apply', $job->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="first_name">Prénom<span class="req"> *</span></label>
        <input type="text" name="first_name" id="first_name" required>
    </div>
    <div class="form-group">
        <label for="last_name">Nom<span class="req"> *</span></label>
        <input type="text" name="last_name" id="last_name" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail<span class="req"> *</span></label>
        <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="phone">Téléphone<label>
        <input type="phone" name="phone" id="phone">
    </div>
    <div class="form-group">
        <label for="resume">CV<span class="req"> *</span></label>
        <input type="file" name="resume" id="resume" accept="application/pdf" required>
    </div>
    <div class="form-group">
        <label for="message">Message<span class="req"> *</span></label>
        <textarea name="message" id="message" accept="application/pdf" required></textarea>
    </div>
    <input type="submit" value="envoyer" class="button">
    <p><span class="req">*</span> : champs obligatoires</p>
</form>