<footer class="fade-in-f mt-auto">
            <?php
                $currentPage = basename($_SERVER['PHP_SELF']);
                $waveContainerClass = ($currentPage == 'home.php') ? 'text-center p-3 text-white' : 'text-center p-3 text-white mt-5';
            ?>
            <div class="<?php echo $waveContainerClass; ?>">
                &copy; <?php echo date("Y"); ?> EcmosDev. Tous droits réservés.
            </div>
        </footer>
    </div>
    <!-- Inclure le JS de Bootstrap et ses dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>