<div>
    <h2>Formulaire de contact</h2>

    <form id="contact-form" method="POST" action="{{ route('contact_send', isset($profile) ? $profile->id : null) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="first_name">Prénom<span class="req"> *</span></label>
            <input type="text" name="first_name" id="first_name" class="form-control" required {{ isset($profile) ? "autofocus" : "" }}>
        </div>
        <div class="form-group">
            <label for="last_name">Nom<span class="req"> *</span></label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for=" email">Email<span class="req"> *</span></label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="phone" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="company">Entreprise</label>
            <input type="text" name="company" id="company" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <input type="submit" class="button" value="envoyer">
        <p><span class="req">*</span> : champs obligatoires</p>
    </form>
</div>