<?php
/*
    the index page is the default taxonomy search 
    page as that is what most people will want to do.
*/
require_once('../config.php');
require_once('../include/SolrIndex.php');
$index = new SolrIndex();

require_once('header.php');

?>
<form method="GET" action="index.php" id="main_form">
    <h2>Taxon Search</h2>
    <div>
        <input type="text" name="search" id="search_box" placeholder="Type a taxon name" style="width: 80%;"
            onkeyup="search_param_change(this)" />
        <input type="submit" value="Search" />
    </div>
    <div id="facet_box">
        <h2>Filters</h2>
        <div id="facet_inputs">
            Facets appear here.
        </div>
    </div>
    <div id="search_results">
        <p>Taxonomic searching is most common.</p>
    </div>


</form>

<script src="scripts/layout.js"></script>
<script src="scripts/main.js"></script>
<script>
// once page has loaded
load_label_cache();

// we do an initial search so that the facet boxes are available
// to be populated
search_param_change(document.getElementById("search_box"));

// then we initialise the form with saved values
initialize_form();


//update_search_results();
//
</script>

<?php
    require_once('footer.php');
?>