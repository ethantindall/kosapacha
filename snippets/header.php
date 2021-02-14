<div id="header-row-1">
    <form method="post" action="index.php">
        <input type="hidden" name="language" value="<?php echo $_SESSION['lang']; ?>">
            <input id="language" type="submit" value="Language">
            <input type="hidden" name="action" value="swap-language">
    </form>

</div>

<div id="header-row-2">
    <span class="material-icons">menu</span>
    <p>KOSA<b>PACHA</b></p>
    <span class="material-icons">shopping_bag</span>
</div>

<script src="script.js"></script>
