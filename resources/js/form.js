const addExperience = document.querySelector("#add-experience");
const experiencesWrapper = document.querySelector("#experiences");

let experienceToggler = document.querySelectorAll("#experiences fieldset");

const toggleExperience = (e) => {
    console.log("clicked");
    e.target.classList.toggle("hide");
};
const addNewExperience = () => {
    console.log("clicker");
    const inputCount = document.querySelectorAll(
        "#experiences fieldset"
    ).length;

    const newElement = document.createElement("fieldset");
    newElement.innerHTML = `
    <legend>Nouvelle expérience</legend>
                    <input
                        type="hidden"
                        name="experiences[${inputCount}][id]"
                        id="experiences[${inputCount}][id]">
                    <div class="form-group">
                        <label
                            for="experiences[${inputCount}][title]">
                            Titre
                        </label>
                        <input
                            type="text"
                            name="experiences[${inputCount}][title]"
                            id="experiences[${inputCount}][title]">
                    </div>
                    <div class="form-group">
                        <label
                            for="experiences[${inputCount}][description]">
                            Description
                        </label>
                        <input
                            type="text"
                            name="experiences[${inputCount}][description]"
                            id="experiences[${inputCount}][description]">
                    </div>
                    <div class="form-group">
                        <label
                            for="experiences[${inputCount}][url]">
                            Lien site web
                        </label>
                        <input
                            type="text"
                            name="experiences[${inputCount}][url]"
                            id="experiences[${inputCount}][url]">
                    </div>
                    <div class="form-group">
                        <label
                            for="experiences[${inputCount}][github]">
                            Lien Github
                        </label>
                        <input
                            type="text"
                            name="experiences[${inputCount}][github]"
                            id="experiences[${inputCount}][github]">
                    </div>
                    <div class="form-group">
                        <label
                            for="experiences[${inputCount}][skills]">
                            Compétences
                        </label>
       
                        <select name="experiences[${inputCount}][skills][]" multiple>
                            @foreach($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="experiences[${inputCount}][picture]">Photo de profil</label>
                        <input type="file" name="experiences[${inputCount}][picture]" id="experiences[${inputCount}][picture]" class="form-control">

                        @if(isset($profile->experiences[$i]->picture))
                        <br />
                        <img src="{{ asset('uploads/images/' . $profile->experiences[$i]->picture) }}" alt="photo du projet {{ $profile->experiences[$i]->title }}">
                        <div class="form-group flex">
                            <input id="experiences[${inputCount}][delete_picture]" name="experiences[${inputCount}][delete_picture]" class="form-control" type="checkbox">
                            <label for="experiences[${inputCount}][delete_picture]">Supprimer l'image</label>
                        </div>
                        @endif
                    </div>



                    <div class="form-group">
                        <input
                            type="checkbox"
                            name="experiences[${inputCount}][delete]"
                            id="experiences[${inputCount}][delete]">
                        <label
                            for="experiences[${inputCount}][delete]">
                            Supprimer
                        </label>
                    </div>
    `;

    experiencesWrapper.append(newElement);
    experienceToggler = document.querySelectorAll("#experiences fieldset");
    console.log(experienceToggler);
    experienceToggler.forEach((toggler) => {
        toggler.addEventListener("click", toggleExperience);
    });
};

if (addExperience) {
    addExperience.addEventListener("click", addNewExperience);
}
experienceToggler.forEach((toggler) => {
    toggler.addEventListener("click", toggleExperience);
});
