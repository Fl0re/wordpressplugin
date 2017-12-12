<?/*
Plugin Name: Popup
Description: popup
Version: 0.0.1
Author: moi
license: free
*/

add_action("wp_enqueue_scripts", "custom_popup_scripts");
function custom_popup_scripts(){
    wp_enqueue_script("popup_script", plugin_dir_url("./")."/popup/script.js", array("jquery") );
    wp_enqueue_style("popup_style", plugin_dir_url( "./" )."/popup/style.css");

}

add_action("admin_menu", "generate_popup_menu");
add_action("admin_init", "add_option_popup");

function add_option_popup(){
add_option("custom_popup", []);
};

function generate_popup_menu(){
add_menu_page(
"Popup",
"Popup",
"administrator",
"moi_popup_menu",
"generate_popup",
"dashicons-format-quote",
50
);}

$popup = [
"page" => 0,
"categorie" => 0,
"article" => 0
];

function generate_popup(){

if(isset($_POST["accueil"])){
    $popup["page"] = 1;
}

if(isset($_POST["article"])){
    $popup["article"] = 1;
}

if(isset($_POST["cat"])){
    $popup["categorie"] = 1;
}

update_option("custom_popup", $popup);
if(get_option("custom_popup")){
    var_dump($popup);
    $popup = get_option("custom_popupj ");
}

?>

<h1> Popup</h1><br><br>

<form method="post">
    <label>
        <span> affichage :</span><br><br>


        <label>
            <input type="checkbox" name="accueil">
            <span>Accueil</span>
        </label><br><br>

        <label>
            <input type="checkbox" name="article">
            <span>Articles</span>
        </label><br><br>

        <label>
            <input type="checkbox" name="cat">
            <span>Categorie</span>
        </label><br><br>
            
    </label>
    <input type="submit" value="Valider"><br><br>
</form> 

<h2>Choix Pop-up :</h2>
<p> [pop1] : "Je suis ton pere" </p>
<p> [pop2] : "Vous ne passerez pas !" </p>
<p> [pop3] : "supercalifragilisticexpialidocious !" </p>
<p> [pop4] : "la force est avec moi et je fais corps avec la force !" </p>
<p> [pop5] : "oh un squelette qui fais des claquettes" </p>
<?php
}


add_shortcode("pop1", "display_pop1");


function display_pop1($atts){
    echo "<div class='pop'><p class='x'> X pop-up<p>  <p>Je suis ton pere</p></div>";
};


add_shortcode("pop2", "display_pop2");

function display_pop2($atts){
    echo "<div class='pop'><p class='x'> X pop-up<p>  <p>Vous ne passerez pas</p></div>";
};

add_shortcode("pop3", "display_pop3");

function display_pop3($atts){
    echo "<div class='pop'><p class='x'> X pop-up<p>  <p>supercalifragilisticexpialidocious</p></div>";
 
};

add_shortcode("pop4", "display_pop4");

function display_pop4($atts){
    
    echo "<div class='pop'><p class='x'> X pop-up<p>  <p>la force est avec moi et je fais corps avec la force</p></div>";
};

add_shortcode("pop5", "display_pop5");

function display_pop5($atts){
    echo "<div class='pop'><p class='x'> X pop-up<p>  <p>oh un squelette qui fais des claquettes</p></div>";
};
?>
