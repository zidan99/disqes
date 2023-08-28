</div>
</div>
</div>
</div>

<script>
    const hamburgerButton = document.querySelector('.hamburger');
    const sidebarMenu = document.querySelector('.sidebar');

    const topbarButton = document.querySelector('.wrapper-profile');
    const topbarMenu = document.querySelector('.topbar-menu');

    hamburgerButton.addEventListener('click', function() {
        sidebarMenu.classList.toggle('active');
    });

    topbarButton.addEventListener('click', function() {
        topbarMenu.classList.toggle('active');
    });
</script>

<!-- SCRIPT JS -->
<script src="<?= BASEURL; ?>js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>js/script.js"></script>
<!-- END SCRIPT JS -->
</body>

</html>