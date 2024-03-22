import "./bootstrap";
import axios from "axios";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import { services } from "@tomtom-international/web-sdk-services";
import SearchBox from "@tomtom-international/web-sdk-plugin-searchbox";

let myInput = document.getElementById("myInput");
let address = document.getElementById("address");
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

var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);

var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

myInput.appendChild(searchBoxHTML);

submitCreate.addEventListener("click", () => {
    let value = ttSearchBox.getValue();
    address.value = value;
    console.log(value);
});
