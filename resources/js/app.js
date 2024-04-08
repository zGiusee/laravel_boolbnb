import "./bootstrap";
import axios from "axios";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import { services } from "@tomtom-international/web-sdk-services";
import SearchBox from "@tomtom-international/web-sdk-plugin-searchbox";

// SEARCHBOX TOMTOM
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

// VALIDATIONS!!!!
$(document).ready(function () {
    // Function to display error message for a specific field
    function showError(field, message) {
        $("#" + field + "-error")
            .text(message)
            .show();
    }

    // Function to hide error message for a specific field
    function hideError(field) {
        $("#" + field + "-error").hide();
    }

    // Function to validate the form
    function validateForm() {
        var isValid = true;

        // VALIDAZIONE PER GLI APPARTAMENTI
        // Validate Title
        var title = $("#title").val();
        if (!title) {
            showError("title", "The title is required!");
            isValid = false;
        } else if (title.length > 100) {
            showError(
                "title",
                "The title must be a maximum of 100 characters long!"
            );
            isValid = false;
        } else {
            hideError("title");
        }

        // Validate Rooms
        var rooms = $("#rooms").val();
        if (!rooms) {
            showError("rooms", "The number of rooms is required!");
            isValid = false;
        } else if (!$.isNumeric(rooms) || parseInt(rooms) != rooms) {
            showError("rooms", "Rooms must be a whole number!");
            isValid = false;
        } else {
            hideError("rooms");
        }

        // Validate Beds
        var beds = $("#beds").val();
        if (!beds) {
            showError("beds", "The number of beds is required!");
            isValid = false;
        } else if (!$.isNumeric(beds) || parseInt(beds) != beds) {
            showError("beds", "Beds must be a whole number!");
            isValid = false;
        } else {
            hideError("beds");
        }

        // Validate Bathrooms
        var bathrooms = $("#bathrooms").val();
        if (!bathrooms) {
            showError("bathrooms", "The number of bathrooms is required!");
            isValid = false;
        } else if (
            !$.isNumeric(bathrooms) ||
            parseInt(bathrooms) != bathrooms
        ) {
            showError("bathrooms", "Bathrooms must be a whole number!");
            isValid = false;
        } else {
            hideError("bathrooms");
        }

        // Validate Square Meters
        var squareMeters = $("#square_meters").val();
        if (!squareMeters) {
            showError("square_meters", "Square meters are required!");
            isValid = false;
        } else if (squareMeters.length > 15) {
            showError(
                "square_meters",
                "Square meters must be a maximum of 15 characters long!"
            );
            isValid = false;
        } else {
            hideError("square_meters");
        }

        // Validate Address
        var address = $("#address").val();
        if (!address) {
            showError("address", "The address is required!");
            isValid = false;
        } else if (address.length > 100) {
            showError(
                "address",
                "The address must be a maximum of 100 characters long!"
            );
            isValid = false;
        } else {
            hideError("address");
        }

        // Validate Cover Image
        var coverImg = $("#cover_img").val();
        if (!coverImg) {
            showError("cover_img", "The cover image is required!");
            isValid = false;
        } else {
            var extension = coverImg.split(".").pop().toLowerCase();
            if (["jpg", "jpeg", "png"].indexOf(extension) == -1) {
                showError(
                    "cover_img",
                    "The cover image must be in .jpg, .png, or .jpeg format!"
                );
                isValid = false;
            } else {
                hideError("cover_img");
            }
        }

        // VALIDAZIONI PER LA REGISTRAZIONE
        // Validate Name
        var name = $("#name").val();
        if (!name) {
            showError("name", "The name is required!");
            isValid = false;
        } else {
            hideError("name");
        }

        // Validate Surname
        var surname = $("#surname").val();
        if (!surname) {
            showError("surname", "The surname is required!");
            isValid = false;
        } else {
            hideError("surname");
        }

        // Validate Date of Birth
        var dateOfBirth = $("#date_of_birth").val();
        if (!dateOfBirth) {
            showError("date_of_birth", "The date of birth is required!");
            isValid = false;
        } else {
            hideError("date_of_birth");
        }

        // Validate Email
        var email = $("#email").val();
        if (!email) {
            showError("email", "The email is required!");
            isValid = false;
        } else {
            hideError("email");
        }

        // Validate Password
        var password = $("#password").val();
        if (!password) {
            showError("password", "The password is required!");
            isValid = false;
        } else {
            hideError("password");
        }

        return isValid;
    }

    // On form submit, validate the form
    $("#submitCreate").click(function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});
