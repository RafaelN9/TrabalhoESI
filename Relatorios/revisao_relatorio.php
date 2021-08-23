<?php include_once('../view/header.php'); 

    $sectionTitle = '#SectionTitle';
    $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu mauris in diam faucibus dapibus. Sed quis pulvinar nulla. Fusce nec fermentum justo. Etiam ut libero lacinia, elementum augue at, vestibulum quam. Maecenas posuere eleifend pharetra. Donec eleifend lobortis volutpat.';

    $section ="
        <div class='container-fluid'>
            <h3>$sectionTitle</h3>
            <p class='text-break'>$content</p>
        </div>";
?>
<div class="container-fluid p-5" style="height: 50%;">
    <div class="container h-100 bg-principal p-5 overflow-auto text-light">
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

<style>
    ::-webkit-scrollbar{
        width: 0;
    }
</style>

<?php include_once('../view/footer.php'); ?>