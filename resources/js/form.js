const addExperience = document.querySelector("#add-experience");
const experiencesWrapper = document.querySelector("#experiences");
console.log("loaded form");

const addNewExperience = () => {
    console.log("clicker");
    const inputCount = document.querySelectorAll(
        "#experiences fieldset"
    ).length;

    const newElement = document.createElement("fieldset");
    newElement.classList.add("form-group");
    newElement.innerHTML = `
    <legend>Nouvelle expérience</legend>
    <div class="form-group">
        <label for="experiences[${inputCount}][title]">Titre</label>
        <input type="text" name="experiences[${inputCount}][title]">
    </div>
    <div class="form-group">
        <label for="experiences[${inputCount}]">Description</label>
        <input type="text" name="experiences[${inputCount}][description]">
    </div>
    `;

    experiencesWrapper.append(newElement);
};
if (addExperience) {
    addExperience.addEventListener("click", addNewExperience);
}
