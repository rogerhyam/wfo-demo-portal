    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()"
            class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
            <i class="fa fa-remove"></i>
        </a>
        <form>
            <div class="w3-bar-item">
                <input type="text" name="search" placeholder="Plant name" style="width: 100%" />
            </div>

            <div class="w3-bar-item" style="text-align: right">
                <input type="checkbox" name="free_text" value="true" />&nbsp;Free text&nbsp;
                <input type="submit" value="Search" />
            </div>
        </form>
        <?php
    // define the facets to render in the order to be rendered
    $facet_q_numbers = array('Q6256', 'Q2355817');

    foreach ($facet_q_numbers as $facet_q_number) {
        
        // get the facet from the index
        $facet_doc = $index->getSolrDoc($facet_q_number);

        echo "<div class=\"w3-bar-item\"><strong>{$facet_doc->label_s}</strong></div>";

        if(isset($facet_doc->facet_values)){
            $query = array(
                'query' => 'id:(' . implode(' ', $facet_doc->facet_values) . ')',
                'sort' => 'label_s asc',
                'limit' => 1000
            );
            $value_docs = $index->getSolrDocs($query);
            echo "<div class=\"w3-bar-item\" style=\"height: 10em; overflow-y: scroll; font-size: 80%;\" >";
            foreach($value_docs as $fv_doc){
               echo "<input type=\"checkbox\" name=\"$facet_q_number\" value=\"{$fv_doc->id}\" />";
               echo "&nbsp;";
               echo "$fv_doc->label_s<br/>";
            }
            echo "</div>";
            
        }
        

    }

?>

    </nav>