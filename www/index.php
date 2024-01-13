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
    <input type="text" name="search" placeholder="Type a taxon name" style="width: 80%;"
        onkeyup="search_param_change(this)" />
    <input type="submit" value="Search" />

    <div id="search_results">
        <p>Taxonomic searching is most common.</p>
    </div>

</form>

<script src="scripts/layout.js"></script>
<script src="scripts/main.js"></script>
<script>
// once page has loaded
load_label_cache();
update_search_results();
//initialize_form();
</script>

<?php
    require_once('footer.php');
?>