import "./bootstrap";
import axios from "axios";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import { services } from "@tomtom-international/web-sdk-services";
import SearchBox from "@tomtom-international/web-sdk-plugin-searchbox";

// Div dentro la form di Apartments/Create dove 'appendere' la searchbox di TomTom
let myInput = document.getElementById("myInput");

// Input Address della form Apartments/Create
let address = document.getElementById("address");

// Bottone della form Apartments/Create
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

// Posizioo la searchbox
myInput.appendChild(searchBoxHTML);

// Creo l'evento per applicare il valore della searchbox all nostro input address
submitCreate.addEventListener("click", () => {
    let value = ttSearchBox.getValue();
    address.value = value;
});
