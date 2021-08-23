<?php include_once('../view/header.php'); 
    $MAX_ELEM = 10;
    $sectionTitle = '#SectionTitle';
    $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris in diam faucibus dapibus. Sed quis pulvinar nulla. Fusce nec fermentum justo. Etiam ut libero lacinia, elementum augue at, vestibulum quam. Maecenas posuere eleifend pharetra. Donec eleifend lobortis volutpat.';

    $section ="
        <div class='container-fluid'>
            <h3>$sectionTitle</h3>
            <p class='text-break'>$content</p>
        </div>";
?>
<div class="container-fluid" style="min-height: 100%;">
    <div class="container bg-principal p-5 overflow-auto text-light w-75" style="height: 100%;">
        <?php 
            for($i=0; $i<$MAX_ELEM; $i++)
                echo $section 
        ?>
        <a class="btn-lg btn-primary float-right pl-4 pr-4">Avaliar</a>
    </div>
</div>

<?php include_once('../view/footer.php'); ?>