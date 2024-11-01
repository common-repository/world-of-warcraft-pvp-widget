<?php 

/*
 Plugin Name: World of Warcraft PvP Widget
 Plugin URI: 
 Description: Shows some PvP stats of your WoW character
 Version: 1.0
 Author: Evgeniy Burmakin
 Author URI: http://freika.ru/
*/

function battlenet_widget($args) {

    extract($args);
    //Absolute path to plugin dir
    $plugin_dir_path = plugin_dir_url(__FILE__);



echo "<link rel='stylesheet' type='text/css' href='".$plugin_dir_path."css.css' />";







    echo $before_widget; 
    echo $before_title;
    echo get_option('battlenet_title'); 
    echo $after_title; 

//code to make correct request to battle.net api
$realm  = get_option('battlenet_realm');
$nick   = get_option('battlenet_character');
$url = 'http://eu.battle.net/api/wow/character/';
$check = get_headers('http://eu.battle.net/api/wow/character/'.rawurlencode($realm).'/'.$nick);

if ($check[0] == "HTTP/1.1 404 Not Found") { 
echo 'Персонаж не найден!'; 
} 

elseif ($check[0] == "HTTP/1.1 200 OK") {


            $raw    = file_get_contents($url.rawurlencode($realm).'/'.$nick.'?fields=pvp', true);
            $array  = json_decode($raw, true);

            //includes file with race and class 'switch-cases'
            include "snippets.php";

            //detect character's faction
            if ($array['race'] == '1' or $array['race'] == '11' or $array['race'] == '22' or $array['race'] == '4' or $array['race'] == '3' or $array['race'] == '25' or $array['race'] == '7') {
                $side = 'a';
                //echo "<style>.battlenet_widget {background-color: blue;}</style>";
            }

            elseif ($array['race'] == '2' or $array['race'] == '8' or $array['race'] == '10' or $array['race'] == '26' or $array['race'] == '6' or $array['race'] == '5' or $array['race'] == '9') {
                $side = 'h';
                //echo "<style>.battlenet_widget {background-color: red;}</style>";
            }
            else {
                $side = "n";
                //echo "<style>.battlenet_widget {background-color: green;}</style>";
            }





$link = 'http://eu.battle.net/wow/ru/character/'.$realm.'/'.$nick.'/simple';

            if (get_option('battlenet_show_rbg_icon')) {

                if ($array['pvp']['ratedBattlegrounds']['personalRating'] < '1099') {
                echo "<img src=".$plugin_dir_path."/images/lessthan1000".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1099' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1200') {
                    echo "<img src=".$plugin_dir_path."/images/1100".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1199' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1300') {
                    echo "<img src=".$plugin_dir_path."/images/1200".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1299' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1400') {
                    echo "<img src=".$plugin_dir_path."/images/1300".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1399' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1500') {
                    echo "<img src=".$plugin_dir_path."/images/1400".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1499' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1600') {
                    echo "<img src=".$plugin_dir_path."/images/1500".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1599' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1700') {
                    echo "<img src=".$plugin_dir_path."/images/1600".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1699' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1800') {
                    echo "<img src=".$plugin_dir_path."/images/1700".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1799' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '1900') {
                    echo "<img src=".$plugin_dir_path."/images/1800".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1899' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '2000') {
                    echo "<img src=".$plugin_dir_path."/images/1900".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '1999' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '2100') {
                    echo "<img src=".$plugin_dir_path."/images/2000".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '2099' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '2200') {
                    echo "<img src=".$plugin_dir_path."/images/2100".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '2199' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '2300') {
                    echo "<img src=".$plugin_dir_path."/images/2200".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '2299' and $array['pvp']['ratedBattlegrounds']['personalRating'] < '2400') {
                    echo "<img src=".$plugin_dir_path."/images/2300".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                elseif ($array['pvp']['ratedBattlegrounds']['personalRating'] > '2399') {
                    echo "<img src=".$plugin_dir_path."/images/2400".$side.".jpg class='wpw'> <a href=".$link.">".$array['name']."</a>";
                }
                else {
                    echo "";
                }
            }
            else {
                echo "<a href=".$link.">".$array['name']."</a>";
            }

            echo "<br>";
            echo $race.", ".$class;
            echo "<br>";
            if ($array['pvp']['ratedBattlegrounds']['personalRating'] == 0) {
                echo "Рейтинга нет :(";
            }
            else {
                echo "Рейтинг <abbr title='Рейтинговые поля боя'>РПБ</abbr>: ".$array['pvp']['ratedBattlegrounds']['personalRating'];
            }
            echo "<br>";
            //in dependency of on/off displaying arena rating shows it or not
            if (get_option('battlenet_show_2v2') == 'checked') {
                    foreach ($array['pvp']['arenaTeams'] as $team) {
                    if ($team['size'] == '2v2') {
                        echo "Рейтинг 2v2: ".$team[teamRating];
                        echo "<br>";
                    }

                }
            }

            if (get_option('battlenet_show_3v3') == 'checked') {
                    foreach ($array['pvp']['arenaTeams'] as $team) {
                    if ($team['size'] == '3v3') {
                        echo "Рейтинг 3v3: ".$team[teamRating];
                        echo "<br>";
                    }

                }
            }

            if (get_option('battlenet_show_5v5') == 'checked') {
                    foreach ($array['pvp']['arenaTeams'] as $team) {
                    if ($team['size'] == '5v5') {
                        echo "Рейтинг 5v5: ".$team[teamRating];
                        echo "<br>";
                    }

                }
            }
            echo "Почетных убийств: ".$array['pvp']['totalHonorableKills'];



}
    echo $after_widget; 

}

function register_battlenet() {
    register_sidebar_widget('WoW PvP Widget', 'battlenet_widget');
    register_widget_control('WoW PvP Widget', 'battlenet_control' );
}


function battlenet_control() {
    
    if (!empty($_REQUEST['battlenet_title'])) {
        update_option('battlenet_title', $_REQUEST['battlenet_title']);
    }

    if (isset($_REQUEST['battlenet_realm'])) {
        update_option('battlenet_realm', $_REQUEST['battlenet_realm']);
    }

    if (!empty($_REQUEST['battlenet_character'])) {
        update_option('battlenet_character', $_REQUEST['battlenet_character']);
    }

    if (isset($_REQUEST['battlenet_show_2v2'])) {
        update_option('battlenet_show_2v2', 'checked');
    }
    else {
        update_option('battlenet_show_2v2', ''); 
    }

    if (isset($_REQUEST['battlenet_show_3v3'])) {
        update_option('battlenet_show_3v3', 'checked');
    }
    else {
        update_option('battlenet_show_3v3', ''); 
    }
    if (isset($_REQUEST['battlenet_show_5v5'])) {
        update_option('battlenet_show_5v5', 'checked');
    }
    else {
        update_option('battlenet_show_5v5', ''); 
    }

    if (isset($_REQUEST['battlenet_show_rbg_icon'])) {
        update_option('battlenet_show_rbg_icon', 'checked');
    }
    else {
        update_option('battlenet_show_rbg_icon', '');
    }
?>
    Заголовок&nbsp;:&nbsp;<input type="text" name="battlenet_title" />
    Сервер:  <select name="battlenet_realm">
                <option value="ashenvale">Ясеневый лес</option>
                <option value="azuregos">Азурегос</option>
                <option value="blackscar">Черный Шрам</option>
                <option value="booty-bay">Пиратская бухта</option>
                <option value="deathguard">Страж Смерти</option>
                <option value="deathweaver">Ткач Смерти</option>
                <option value="deepholm">Подземье</option>
                <option value="eversong">Вечная Песня</option>
                <option value="fordragon">Дракономор</option>
                <option value="galakrond">Галакронд</option>
                <option value="goldrinn">Голдринн</option>
                <option value="gordunni">Гордунни</option>
                <option value="greymane">Седогрив</option>
                <option value="grom">Гром</option>
                <option value="howling-fjord">Ревущий Фьорд</option>
                <option value="lich-king">Король-Лич</option>
                <option value="razuvious">Разувий</option>
                <option value="soulflayer">Свежеватель Душ</option>
                <option value="thermaplugg">Термоштепсель</option>
                <option value="borean-thundra">Борейская тундра</option>
            </select>
            
    Персонаж: <input type="text" name="battlenet_character" value="<?php echo get_option('battlenet_character')?>">
    <br>
    <label for="battlenet_show_2v2"> <input type="checkbox" name="battlenet_show_2v2" id="battlenet_show_2v2" <?php echo get_option('battlenet_show_2v2'); ?>>Показывать рейтинг 2v2</label>
    <br>
    <label for="battlenet_show_3v3"> <input type="checkbox" name="battlenet_show_3v3" id="battlenet_show_3v3" <?php echo get_option('battlenet_show_3v3'); ?>>Показывать рейтинг 3v3</label>
    <br>
    <label for="battlenet_show_5v5"> <input type="checkbox" name="battlenet_show_5v5" id="battlenet_show_5v5" <?php echo get_option('battlenet_show_5v5'); ?>>Показывать рейтинг 5v5</label>
    <br>
    <label for="battlenet_show_rbg_icon"> <input type="checkbox" name="battlenet_show_rbg_icon" id="battlenet_show_rbg_icon" <?php echo get_option('battlenet_show_rbg_icon'); ?> >Показывать значок рейтинга RBG</label>
<?

}



add_action('init', 'register_battlenet');


?>