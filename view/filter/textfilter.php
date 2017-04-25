<?php
$textfilterSamples = [
    "[b]Lorem ipsum dolor[/b] [i]sit amet, consectetur[/i] [url=https://dbwebb.se/]adipisicing elit...[/url]",
    "https://dbwebb.se/",
    "Excepteur sint occaecat cupidatat(Newline \\n)\n  non proident, sunt(Newline \\n)\n in culpa qui officia deserunt",
    "#h1 ##h2,\n>blockquote,\n[Link](http://dbwebb.se/)"
];

$allInOne = implode("", $textfilterSamples);
?>

<div class="textfilter_wrapper">

    <div class="textfilter_block">

        <h2>Example bbcode</h2>

        <h3>Source</h3>
        <p><?=$textfilterSamples[0]?></p>

        <hr>

        <h3>Output</h3>
        <p><?=$app->filter->doFilter($textfilterSamples[0], "bbcode")?></p>

    </div>

    <div class="textfilter_block">

        <h2>Example link</h2>

        <h3>Source</h3>
        <p><?=$textfilterSamples[1]?></p>

        <hr>

        <h3>Output</h3>
        <p><?=$app->filter->doFilter($textfilterSamples[1], "clickable")?></p>

    </div>

    <div class="textfilter_block">

        <h2>Example nl2br</h2>

        <h3>Source</h3>
        <p><?=$textfilterSamples[2]?></p>

        <hr>

        <h3>Output</h3>
        <p><?=$app->filter->doFilter($textfilterSamples[2], "nl2br")?></p>

    </div>

    <div class="textfilter_block">

        <h2>Example markdown</h2>

        <h3>Source</h3>
        <p><?=$textfilterSamples[3]?></p>

        <hr>

        <h3>Output</h3>
        <p><?=$app->filter->doFilter($textfilterSamples[3], "markdown")?></p>

    </div>

    <div class="textfilter_block">

        <h2>All together</h2>

        <h3>Source</h3>
        <p><?=$allInOne?></p>

        <hr>

        <h3>Output</h3>
        <p><?=$app->filter->doFilter($allInOne, "bbcode, nl2br, clickable")?></p>

    </div>

</div>
