import "./bootstrap";
import axios from "axios";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import { services } from "@tomtom-international/web-sdk-services";
import SearchBox from "@tomtom-international/web-sdk-plugin-searchbox";

// MODALE PER L'ELIMINAZIONE DEI RECORD
const deleteButtons = document.querySelectorAll(".my_delete_button");

deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
        // Recupero lo slug dai data
        let slug = button.getAttribute("data-slug");

        // Recupero il nome del progetto
        let title = button.getAttribute("data-title");

        // Recupero il tipo di dato
        let type = button.getAttribute("data-type");

        // Recupero lo spazio riservato al nome del progetto dentro il modal
        const apartment_title = document.getElementById("apartment_title");

        // Applico il contenuto al modal
        apartment_title.textContent = title;

        // Definisco la url
        let url = `${window.location.origin}/user/${type}/${slug}`;

        // Recupero la form
        let delete_form = document.getElementById("delete_form");

        // applico alla form l'url
        delete_form.setAttribute("action", url);
    });
});

// SEARCHBOX TOMTOM
// Div dentro la form di Apartments/Create dove 'appendere' la searchbox di TomTom

// Div dentro la form di Apartments/Create/Edit dove 'appendere' la searchbox di TomTom
let myInput = document.getElementById("myInput");

// Input Address della form Apartments/Create/Edit
let address = document.getElementById("address");

// Bottone della form Apartments/Create/Edit
let submitCreate = document.getElementById("submitCreate");
let api = import.meta.env.VITE_TOMTOM_APIKEY;

var options = {
    searchOptions: {
        key: api,

        language: "it-IT",

        limit: 5,
    },

    autocompleteOptions: {
        key: api,

        language: "it-IT",
    },
};

// Definisco la searchbox
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

// Posiziono la searchbox
myInput.appendChild(searchBoxHTML);

// Creo l'evento per applicare il valore della searchbox all nostro input address
submitCreate.addEventListener("click", () => {
    address.value = ttSearchBox.getValue();
    // let value = ttSearchBox.getValue();
    // address.value = value;
});

// Recupero valore di old-value
let old = myInput.getAttribute("old-value");

// Controllo se il vecchio indirizzo è inserito
if (old != "") {
    // Assegno all'input il valore del vecchio indirizzo
    address.value = ttSearchBox.setValue(old);
}
