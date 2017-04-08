<?php
// $urlHome  = $app->url->create("");
// $urlAbout = $app->url->create("about");
// $urlReport = $app->url->create("report");

// $thisRoute = $app->request->getRoute();

// $navbar = [
//     "config" => [
//         "navbar-class" => "navbar"
//     ],
//     "items" => [
//         "hem" => [
//             "text" => "Hem",
//             "route" => "$urlHome",
//         ],
//         "about" => [
//             "text" => "Om",
//             "route" => "$urlAbout",
//         ],
//         "report" => [
//             "text" => "Report",
//             "route" => "$urlReport",
//         ],
//     ]
// ];

?>


<nav class="<?=$navbar['config']['navbar-class']?>" role="navigation">
    <ul>
        <?php
        foreach ($navbar['items'] as $key => $value) :
        ?>

            <a href="<?= $value['route'] ?>">
                <?= $value['text'] ?>
            </a>

        <?php
        endforeach
        ?>
    </ul>
</nav>


<main>
