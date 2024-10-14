<?php

require_once __DIR__ . '/cibo.php';
require_once __DIR__ . '/cuccia.php';
require_once __DIR__ . '/giochi.php';

$products = [
    new Cibo('Cibo per Cani', 20, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQMSgAAsFWcQCZYWdEeczwTLHLmNluNKxVIbyVY2_AXkweLf5sKY3cumuj5b4uGI41ekwWXHYsa0MEJJv6VuumdqNGimS2Hi_o7I9zQN4HdhPp3jA_m-aKb', 'Cani', 'Manzo', 'Cibo delizioso per cani al gusto di manzo.'),
    new Gioco('Gioco per Gatti', 15, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcTTrySPjnL3knSfGXfxw3WZ_TbLDKLYWVgaRp9z83IYKt4-4eHJ_UkZ13GfBbRir_CXb016e8Ua4dkU8lzEpIOhXxOMd0cibLERSNSO5jyH7u-sdmB9u7BMdQ', 'Gatti', 'Plastica', 'Gioco divertente per gatti in plastica resistente.'),
    new Cuccia('Cuccia per Cani', 50, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTNs8YqA1MquDC_ROoFhyBorXpSYaCLdmD734Wa9Bxex7-e7Ny_-zPKuiDHj50jr5XlToc1CLBS2HnNPKfy15UvNswCDO4DOtQNMd7SbCx0ftc0Nqw2A_ef3A', 'Cani', 'Grande', 'Cuccia spaziosa e confortevole per cani di taglia grande.'),
    new Cibo('Cibo per Gatti', 18, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgB4fSP2BGZ31gKk5V7k1ZeftKSl_Cx-kgfQ&s', 'Gatti', 'Pesce', 'Cibo nutriente per gatti al gusto di pesce.'),
    new Gioco('Pettorina per Cani', 25, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8fHQTJA98fwGHgwusNpoV8QePg-DiSY4cag&s', 'Cani', 'Nylon', 'Pettorina regolabile in nylon per cani.'),
    new Cuccia('Tiragraffi per Gatti', 40, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJIUsNtL6HthDBhLpHp4zsw_7vwaxPG7ld0g&s', 'Gatti', 'Medio', 'Tiragraffi di dimensioni medie per gatti attivi.'),
];
