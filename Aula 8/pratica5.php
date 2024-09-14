<?php
    $disciplinas = array(
        "BDII",
        "EDII",
        "ESII",
        "PWI"
    );
    $professores = array(
        "Marco",
        "Bastos",
        "Jullian",
        "Cleber"
    );
    for ($i = 0; $i < count($disciplinas); $i++) {
        print "Disciplina " . $disciplinas[$i] . ", professor " . $professores[$i] . ".<br>";
    }
?>
