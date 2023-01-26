</div>

<?php $banco->close(); ?>

</body>

</html>

<footer>
    <?php
    echo "<p>Acessado por " . $_SERVER['REMOTE_ADDR'] . " em " . date('d/M/Y') . "</p>";
    echo "<p>Desenvolvido por Maicon Franzen &copy; 2023</p>";
    ?>
</footer>