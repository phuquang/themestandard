<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ( !function_exists('theme_debug') ) {
    function theme_debug($var)
    {
        $bt = debug_backtrace();
        $caller = array_shift($bt);
        echo '<div class="recursiveThemeDebug">';
        echo "<div class='header'>Debug line {$caller['line']} in {$caller['file']}</div>";
        recursiveThemeDebug($var);
        echo '</div>';
        ?><style>.recursiveThemeDebug{background: #272822;font-size: 13px;color:#fff;padding: 5px;}
.recursiveThemeDebug tr:nth-of-type(odd) {background-color: rgba(0,0,0,.05);}
.recursiveThemeDebug td:first-child {width: 5%;}
.recursiveThemeDebug td {border: 1px solid #75715e;vertical-align: top;}
.recursiveThemeDebug td td {border-left: 0;border-bottom: 0;}
.recursiveThemeDebug td td:last-child{border-right: 0;}
.recursiveThemeDebug td tr:first-child td {border-top: 0;}
.recursiveThemeDebug table {width: 100%;border-spacing: 0px;border-collapse: collapse;}
.recursiveThemeDebug td.hidden + td{background:#75715e;}
.recursiveThemeDebug td.hidden + td > *{display: none;}
.recursiveThemeDebug span {padding-left: 5px;padding-right: 5px;}
.recursiveThemeDebug .int {color: #ae81ff;}
.recursiveThemeDebug .string {color: #e6db74;}
.recursiveThemeDebug .null {color: #75715e;font-style: italic;}
.recursiveThemeDebug .bool {color: #ae81ff;}
.recursiveThemeDebug .obj {color: #66d9ef;}
.recursiveThemeDebug .key {color: #a6e22b;}
</style><script>
var recursiveThemeDebug = document.querySelectorAll('.recursiveThemeDebug td');
Array.from(recursiveThemeDebug).map(item => {
    item.addEventListener('click', function (e) {this.classList.toggle('hidden');}, false);
});
</script><?php
    }
    function recursiveThemeDebug($variable)
    {
        if ( is_string($variable) && !empty($variable) ) {
            echo "<span class='string' title='String'>{$variable}</span>";
        } elseif ( is_numeric($variable) ) {
            echo "<span class='int' title='Number'>{$variable}</span>";
        } elseif ( is_bool($variable) ) {
            echo '<span class="bool" title="Boolean">' . ($variable ? 'true' : 'false').'</span>';
        } elseif ( is_object($variable) || (is_array($variable) && count($variable) ) ) {
            $class = '';
            if ( is_array($variable) ) {
                $class= 'key';
                $title= 'Array';
            }
            if ( is_object($variable) ) {
                $class= 'obj';
                $title= 'Object';
            }
            echo '<table>';
            foreach ($variable as $key => $value) {
                echo "<tr>";
                    echo "<td><span class='{$class}' title='{$title}'>{$key}</span></td>";
                    echo '<td>';
                    recursiveThemeDebug($value);
                    echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "<span class='null' title='Null'>null</span>";
        }
    }
}

include_once get_parent_theme_file_path('form-controllers/page-contact-controller.php');
?>
<html>
<head></head>
<body>
<?php
if($form_status === ""){
    include_once get_parent_theme_file_path('template-parts/content-contact.php');
}
if($form_status === "confirm"){
    include_once get_parent_theme_file_path('template-parts/content-contact-confirmation.php');
}
?>
</body>
</html>