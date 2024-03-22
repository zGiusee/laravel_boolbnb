import "./bootstrap";
import axios from "axios";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);
import { services } from "@tomtom-international/web-sdk-services";
import SearchBox from "@tomtom-international/web-sdk-plugin-searchbox";

var options = {
    searchOptions: {
        key: "GYNVgmRpr8c30c7h1MAQEOzsy73GA9Hz",

        language: "it-IT",

        limit: 5,
    },

    autocompleteOptions: {
        key: "GYNVgmRpr8c30c7h1MAQEOzsy73GA9Hz",

        language: "en-GB",
    },
};

var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);

var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

document.body.append(searchBoxHTML);
