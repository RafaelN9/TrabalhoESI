<?php
    function runSQL($sql){
        require('conn.inc.php');
        $result = $conn->query($sql); 
        if ($result != true) 
            $result = $conn->error;
        $conn->close();
        
        return $result;
    }

    function showError($divToDisplay, $errorMsg){
        echo "<script>
            var divToDisplay = document.querySelector('#$divToDisplay');
            divToDisplay.style = {display: defaultStatus}
            divToDisplay.innerText = '$errorMsg';
            setTimeout(function() {
                divToDisplay.innerText = '';
                divToDisplay.hidden = true;
            }, 3000);
        </script>";
    }
