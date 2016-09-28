<?php

    $user = App\User::all();
    echo "Hallo " . $user->random()->name . " welkom op uw pagina";
?>
