function formElement() {

    var divContainer = document.createElement("div");
    divContainer.setAttribute("class", "appFormInputContainer");

    //Create form
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    // form.setAttribute("action", "createModules.php");
    form.setAttribute("id", "formElementAdd");
    form.classList.add("appForm");

    //Create field Modules name
    var divContainerModules = document.createElement("div");
    divContainerModules.setAttribute("class", "appFormInputContainer");

    var labelElementModules = document.createElement("label");
    labelElementModules.setAttribute("for", "modules_name");
    labelElementModules.innerText = "Modules name";

    var inputElementModules = document.createElement("input");
    inputElementModules.setAttribute("type", "text");
    inputElementModules.classList.add("appFormInput");
    inputElementModules.setAttribute("id", "modules_name");
    inputElementModules.setAttribute("name", "modules_name");

    divContainerModules.appendChild(labelElementModules);
    divContainerModules.appendChild(inputElementModules);

    //Create field English word
    var divContainerEnglish = document.createElement("div");
    divContainerEnglish.setAttribute("class", "appFormInputContainer");

    var labelElementEnglish = document.createElement("label");
    labelElementEnglish.setAttribute("for", "english_word1");
    labelElementEnglish.innerText = "English word";

    var inputElementEnglish = document.createElement("input");
    inputElementEnglish.setAttribute("type", "text");
    inputElementEnglish.classList.add("appFormInput");
    inputElementEnglish.setAttribute("id", "english_word1");
    inputElementEnglish.setAttribute("name", "english_word1");

    divContainerEnglish.appendChild(labelElementEnglish);
    divContainerEnglish.appendChild(inputElementEnglish);

    //Create field Ukr word
    var divContainerUkr = document.createElement("div");
    divContainerUkr.setAttribute("class", "appFormInputContainer");

    var labelElementUkr = document.createElement("label");
    labelElementUkr.setAttribute("for", "ukr_word1");
    labelElementUkr.innerText = "Ukr word";

    var inputElementUkr = document.createElement("input");
    inputElementUkr.setAttribute("type", "text");
    inputElementUkr.classList.add("appFormInput");
    inputElementUkr.setAttribute("id", "ukr_word1");
    inputElementUkr.setAttribute("name", "ukr_word1");

    divContainerUkr.appendChild(labelElementUkr);
    divContainerUkr.appendChild(inputElementUkr);

    var ButtonElementFields = document.createElement("Button");
    ButtonElementFields.setAttribute("type", "submit");
    // ButtonElementFields.classList.add( "");
    // // ButtonElementFields.classList.add("fa-plus");
    ButtonElementFields.setAttribute("id", "addMoreFields");
    // var buttonElement = document.getElementById('addMoreFields');
    ButtonElementFields.addEventListener('click', function (e) {
        e.preventDefault();
        add_more_fields();
    });
    ButtonElementFields.innerText = "Add Fields";

    //Create field Button
    var ButtonElement = document.createElement("Button");
    ButtonElement.setAttribute("type", "submit");
    ButtonElement.classList.add( "appBtn");
    ButtonElement.classList.add("fa-plus");
    ButtonElement.setAttribute("id", "appBtn");
    ButtonElement.innerText = "Add modules";

    //Add to form
    form.appendChild(divContainerModules);
    form.appendChild(divContainerEnglish);
    form.appendChild(divContainerUkr);
    form.appendChild(ButtonElementFields);
    form.appendChild(ButtonElement);

    return form;
}
var userAddFormContainer = document.getElementById('userAddFormContainer');
var formElements = formElement();
userAddFormContainer.appendChild(formElements);

var counter = 1;
function add_more_fields() {
    counter += 1;

    //Create field English word
    var divContainerEnglish = document.createElement("div");
    divContainerEnglish.setAttribute("class", "appFormInputContainer");

    var labelElementEnglish = document.createElement("label");
    labelElementEnglish.setAttribute("for", "english_word"+ counter);
    labelElementEnglish.innerText = "English word";

    var inputElementEnglish = document.createElement("input");
    inputElementEnglish.setAttribute("type", "text");
    inputElementEnglish.classList.add("appFormInput");
    inputElementEnglish.setAttribute("id", "english_word" + counter);
    inputElementEnglish.setAttribute("name", "english_word" + counter);

    divContainerEnglish.appendChild(labelElementEnglish);
    divContainerEnglish.appendChild(inputElementEnglish);

    //Create field Ukr word
    var divContainerUkr = document.createElement("div");
    divContainerUkr.setAttribute("class", "appFormInputContainer");

    var labelElementUkr = document.createElement("label");
    labelElementUkr.setAttribute("for", "ukr_word" + counter);
    labelElementUkr.innerText = "Ukr word";

    var inputElementUkr = document.createElement("input");
    inputElementUkr.setAttribute("type", "text");
    inputElementUkr.classList.add("appFormInput");
    inputElementUkr.setAttribute("id", "ukr_word" + counter);
    inputElementUkr.setAttribute("name", "ukr_word" + counter);

    divContainerUkr.appendChild(labelElementUkr);
    divContainerUkr.appendChild(inputElementUkr);

    var formAdd = document.getElementById('formElementAdd')
    var buttonElement = formAdd.querySelector("button");
    formAdd.appendChild(divContainerEnglish);
    formAdd.appendChild(divContainerUkr);
    formAdd.insertBefore(divContainerEnglish,buttonElement);
    formAdd.insertBefore(divContainerUkr,buttonElement);
}