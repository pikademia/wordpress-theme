<?php
    $picture = esc_attr(get_option('profile_pic'));
    echo '<h1>Ustawienia motywu Pikademia</h1>';
    settings_errors();
    echo '<form method="post" action="options.php">';
    settings_fields('pikademia-settings-group');
    do_settings_sections('pikademia_motyw');
    echo "<img src='$picture' class='profile-picture' id='profile-picture-preview'/>";
    submit_button();
    echo '</form>';
    echo 'Odwiedź nas na <a href="https://www.pikademia.pl/">www.pikademia.pl</a>';