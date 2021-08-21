<?php include_once('../view/header.php'); 

    $sectionTitle = '#SectionTitle';
    $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris in diam faucibus dapibus. Sed quis pulvinar nulla. Fusce nec fermentum justo. Etiam ut libero lacinia, elementum augue at, vestibulum quam. Maecenas posuere eleifend pharetra. Donec eleifend lobortis volutpat.';

    $section ="
        <div class='container-fluid'>
            <h3>$sectionTitle</h3>
            <p class='text-break'>$content</p>
        </div>";
?>
<div class="container-fluid h-100 m-0 p-0 pl-5 pr-5" style="background-color: #FFFFFF;">
    <div class="container-fluid h-100 bg-principal p-5 overflow-auto text-light">
        <?php echo $section ?>
        <?php echo $section ?>
        <?php echo $section ?>
        <?php echo $section ?>
        <?php echo $section ?>
        <?php echo $section ?>
        <?php echo $section ?>
        <a class="btn-lg btn-primary float-right pl-4 pr-4">Avaliar</a>
    </div>
</div>

<?php include_once('../view/footer.php'); ?>