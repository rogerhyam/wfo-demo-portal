<!DOCTYPE html>
<html lang="en">

<head>
    <title>World Flora Online Demo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 1em;
    }

    .syn_highlight {
        background-color: yellow;
    }

    #search_results {
        width: 60%;
    }

    #facet_box {
        float: right;
        width: 30%;
        border: solid 1px gray;
        padding: 1em;
        margin: 1em;
    }

    #facet_box h2,
    #facet_box h3 {
        margin-top: 0px;
        margin-bottom: 0.3em;
    }

    #facet_inputs ul {
        padding-left: 0px;
        max-height: 10em;
        overflow-y: auto;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div>
        <strong>WFO Portal Demo</strong>
        |
        <a href="about.php">About</a>
        |
        <a href="index.php">Taxonomy</a>
        |
        <a href="nomenclature.php">Nomenclature</a>
    </div>
    <hr />