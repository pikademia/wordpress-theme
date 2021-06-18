<div class="container-fluid pi-main-footer">
    <div class="container">
        <div class="row pi-footer-text">
            <p>pikademia</p>
            <p>O jeden krok do przodu ;) </p>
        </div>
        <div class="row">
            <?php wp_nav_menu(array('theme_location'=>'footer')); ?>
            <div class="pi-widgets">
                <div class="pi-widgets-footer">
                    <hr>
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>