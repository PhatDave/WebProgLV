<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>neki naslov</h1>
    </body>
    <?php
        $student = array("David", "Majdandzic", "NEKIJMBAGIDEOVDJEJEL&347698325786285", 2387463, 3);
        foreach($student as $item) {
            echo $item . "<br>";
        }
        echo "<br>";
        $automobili = array(
            "Citroen" => array(
                    "tip_automobila" => "Brzi", 
                    "kubikaža" => "Jako mnogo!", 
                    "boja" => 0, 
                    "godina_proizvodnje" => 1290, 
                    "motor" => "Onaj sto ide BRRRRRRRRRRRR"
                ),
                "Mercedes" => array(
                    "tip_automobila" => "Malo brzi!", 
                    "kubikaža" => 1, 
                    "boja" => "Zuta", 
                    "godina_proizvodnje" => 13, 
                    "motor" => "WUN WUN"
                ),
        );

        echo "CITROEEEEEN" . "<br>";
        foreach($automobili['Citroen'] as $key=>$value) {
            echo $key . " " . $value . "<br>";
        }
        echo "<br>";
        echo "MERCEDEEEESS" . "<br>";
        echo $automobili['Mercedes']['tip_automobila'] . "<br>";
        echo $automobili['Mercedes']['kubikaža'] . "<br>";
        echo $automobili['Mercedes']['boja'] . "<br>";
        echo $automobili['Mercedes']['godina_proizvodnje'] . "<br>";
        echo $automobili['Mercedes']['motor'] . "<br>";
        echo "<br>" . "<br>";

        class Kupac {
            public $ime;
            public $prezime;

            function setIme($ime){
                $this->ime = $ime;
            }

            function setPrezime($prezime){
                $this->prezime = $prezime;
            }

            function Welcome() {
                echo "<br>Kupac je: ", $this->ime . " " . $this->prezime . "<br>";
            }
        }

        $zuco = new Kupac();
        $zuco->setIme("marko");
        $zuco->setPrezime("Zuti");

        $zuco->Welcome();
    ?>
</html>