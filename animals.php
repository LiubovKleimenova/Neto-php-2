<?php
$fauna= array(
    "Africa"=> array("Hexaprotodon liberiensis", "Potamochoerus porcus", "Civettictis civetta"),
    "Asia"=> array("Ailura fulgens", "Cervus eldii", "Arctictis"),
    "Northern America"=> array("Ovibos", "Condylura cristata", "Ondatra zibethicus"),
    "Southern America"=> array("Caiman", "Natalus haymani Goodwin", "Ateles hybridus"),
    "Australia"=> array("Macropus rufus", "Phascolarctos cinereus", "Ornithorhynchus anatinus phoxinus"),
    "Europe"=>array("Spalax giganteus", "Capra cylindricornis", "Lepus granatensis granatensis")
);

//составляем массив из двухсловных названий и выводим его, кроме того составляем отдельный массив из вторых слов для последующего перемешивния
$two_words_species=array();
$second_word=array();
foreach ($fauna as $continent=>$names)
   {foreach ($names as $animal)
        {$number=str_word_count($animal);
             if ($number==2)
             {//var_dump ($animal);
              array_push($two_words_species, $animal);
               //$fauna2[$continent][]=$animal;
               //здесь создаем массив из перых слов двухсловных животных с ключами по континентам для последующей сортировки фантазийных  
               $word=explode(" ", $animal);   
               $fauna3[$continent][]=$word[0];
               array_push($second_word, $word[1]);
              }
         }
    }
echo '<h3>Названия из двух слов:</h3>';
$print=implode(", ", $two_words_species);
echo $print;

shuffle ($second_word);

//создаем массив фантазийных названий
echo '<h3>Фантазийные названия:</h3>';
$i=0;
foreach ($fauna3 as $continent=>$names)
    {foreach ($names as $animal1)
        {$fantasy[$continent][]="$animal1 "."$second_word[$i]";
         $i++;
        }
    }
//print_r ($fantasy);
//выводим массив фантазийных названий
foreach ($fantasy as $continent=>$names){
    foreach ($names as $animal2){
        echo '<p>',$animal2,'</p>';
    }
}
//допюзадание: выводим массив фантазийных названий по континентам
foreach ($fantasy as $continent=>$names)
   {echo "<h2>$continent</h2>";
     $view=implode(", ", $names);
     echo $view;
    }