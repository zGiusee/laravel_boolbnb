import "./bootstrap";
import axios from "axios";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// MODALE PER L'ELIMINAZIONE DEI RECORD
const deleteButtons = document.querySelectorAll(".my_delete_button");

deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
        // Recupero lo slug/id dai data
        let slug = button.getAttribute("data-slug");

        // Recupero il nome del progetto
        let info = button.getAttribute("data-info");

        // Recupero il tipo di dato
        let type = button.getAttribute("data-type");

        // Recupero lo spazio riservato al nome dell appartamento dentro il modal
        const modal_text = document.getElementById("modal_text");

        // Recupero lo spazio riservato al titolo del progetto dentro il modal
        const modal_title = document.getElementById("modal_title");

        switch (type) {
            case "apartment":
                modal_text.textContent = `Are you sure you want to delete the "${info}" Apartment?`;
                modal_title.textContent = "Apartment cancellation";
                break;
            case "message":
                modal_text.textContent = `Are you sure you want to delete the message from "${info}" ?`;
                modal_title.textContent = "Message cancellation";
                break;
            default:
                break;
        }

        // Definisco la url
        let url = `${window.location.origin}/user/${type}/${slug}`;

        // Recupero la form
        let delete_form = document.getElementById("delete_form");

        // applico alla form l'url
        delete_form.setAttribute("action", url);
    });
});

// MODALE PER LA VISUALIZZAZIONE DEL DETTAGLIO MESSAGGIO
const detailButtons = document.querySelectorAll(".my_detail_button");

detailButtons.forEach((button) => {
    button.addEventListener("click", function () {
        // Recupero tutte le informazioni che mi serviranno per comporre il modale
        let apartment = button.getAttribute("data-apartment");
        let description = button.getAttribute("data-description");
        let date = button.getAttribute("data-date");
        let email = button.getAttribute("data-email");

        // Recupero gli spazi dentro il modale per i dati
        const modal_apartment = document.getElementById("modal_apartment");
        const modal_description = document.getElementById("modal_description");
        const modal_date = document.getElementById("modal_date");
        const modal_email = document.getElementById("modal_email");

        // Applico i valori agli spazi dedicati
        modal_email.textContent = email;
        modal_date.textContent = date;
        modal_description.textContent = description;
        modal_apartment.textContent = apartment;
    });
});

// INIZIALIZZAZIONE DELLE DATATABLES
$(document).ready(function () {
    $("#table_apartment").DataTable();
});

$(document).ready(function () {
    $("#table_messages").DataTable();
});

$(document).ready(function () {
    $("#table_sponsor").DataTable();
});
