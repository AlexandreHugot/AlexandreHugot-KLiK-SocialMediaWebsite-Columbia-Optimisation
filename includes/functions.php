<?php
// File that contains some functions

/**
 * Remove the trigger of Html tags in text and consider it as simple text
 * @param $text the text where the html sould be removed
 * @return string the text without effective Html tags
 */
function avoidHtmlInjections($text)
{
    // Call to a function which remove effectivness of Html tags
    return htmlspecialchars($text);
}

?>