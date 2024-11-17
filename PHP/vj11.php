 <?php
        function prost($broj){
            for($i=2; $i<$broj; $i++){
                if($broj%$i == 0 and $broj != $i)
                    return false;
               
            } 
            return true;
            

        }
        echo "Prosti brojevi do 100 su:";
        for($i=2; $i<100; $i++){
            if(prost($i))
            echo "{$i} \t";
        }
    ?> 