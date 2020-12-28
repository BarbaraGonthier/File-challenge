<?php
include('inc/head.php');
if (isset($_POST["content"])) {
    $file = "files/roswell/".$_POST["file-name"];
    $handledFile = fopen($file, "w");
    fwrite($handledFile, $_POST["content"]);
    fclose($handledFile);
}

?>
<h2> Roswell </h2>
<?php

$directory = opendir("files/roswell");

while ($handledFile = readdir($directory)) {
    if (!in_array($handledFile, [".", "..",])) {
        $extension = pathinfo($handledFile, PATHINFO_EXTENSION);
        ?>
        <ul>
            <?php
        if ($extension == "txt" || $extension == "html") {
        ?>
                <li>
                    <?= $handledFile?>
                    <a href="?f=<?= "roswell/".$handledFile?>"> Edit
                    </a>
                </li>
            </ul>
        <?php } else { ?>
            <li>
                    <?= $handledFile?>
            </li>

                <?php
        }
        ?> </ul> <?php
    }

}
?>
    <h2> Uk </h2>
<?php
$directory = opendir("files/uk");

while ($handledFile = readdir($directory)) {
    if (!in_array($handledFile, [".", "..",])) {
        ?>
        <ul>
            <li>
                <?= $handledFile?>
                <a href="?f=<?="uk/".$handledFile?>"> Edit
                </a>
            </li>
        </ul>
        <?php
    }
}
?>
<?php
if(isset($_GET["f"])) {
    $file = "files/".$_GET["f"];
    $content = file_get_contents($file);
?>

    <form method="POST" action="index.php">
        <textarea name="content" style="width:100%;height:300px;"><?= $content; ?></textarea>
        <input type="hidden" name="file-name" value="<?= $_GET["f"]?>"/>
        <input type="submit" value="Envoyer"/>
    </form>
<?php
}
include('inc/foot.php'); ?>