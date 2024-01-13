
let label_map = null;
let form_data = null;
let search_results = null;

function load_label_cache(lang = 'en') {

    fetch('json_label_map.php?lang=' + lang)
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
            label_map = json;
        });

}

function update_search_results() {

    const params = new URLSearchParams(document.cookie.substring(7));
    fetch('json_search_results.php?' + params)
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
            search_results = json;
        });

}

function search_param_change(input) {

    //console.log(label_map);

    var form_data = new FormData(input.form);

    // save the form state
    let params = new URLSearchParams(form_data);
    document.cookie = 'search=' + params.toString();

    // pass all form parameters to the page
    fetch('json_search_results.php?' + params)
        .then((response) => response.json())
        .then((json) => {
            console.log(json);

            // populate form

            // fill in search results
            if (json.response && json.response.docs) {

                const results_wrapper = document.getElementById('search_results');
                const params = JSON.parse(json.responseHeader.params.json);

                let search_terms = params.query.replace('all_names_alpha_ss:', '')
                search_terms = search_terms.replace('*', '');
                search_terms = search_terms.replace('\\', '');
                console.log(search_terms);
                const re = new RegExp(search_terms, "g");

                results_wrapper.innerHTML = `<ul>
                ${json.response.docs.map(doc => {
                    return `<li>
                        <strong>${doc.full_name_string_html_s}</strong>
                        <div>
                        ${doc.all_names_alpha_ss.map(syn => {
                        // we need to highlight the search 
                        // terms if they are found in the 
                        // synonyms
                        highlighted = syn.replace(re, `<strong class="syn_highlight">${search_terms}</strong>`);
                        return highlighted;

                    }).join('; ')};
                        </div>
                    </li>`;
                }).join('')
                    }
                </ul > `;
            }// got some docs

            //document.getElementById('search_results').innerHTML = json
        });

}

function initialize_form() {
    const form = document.getElementById("main_form");
    const params = new URLSearchParams(document.cookie.substring(7));
    const entries = params.entries();
    for (const [key, val] of entries) {
        //http://javascript-coder.com/javascript-form/javascript-form-value.phtml
        const input = form.elements[key];
        switch (input.type) {
            case 'checkbox': input.checked = !!val; break;
            default: input.value = val; break;
        }
    }

}
