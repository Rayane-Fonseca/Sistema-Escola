<?

function safe($text){
    return htmlspecialchars($text, ENT_COMPAT | ENT_HTML5, 'UFT-8', false);
}

?>