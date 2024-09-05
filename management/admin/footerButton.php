<?php ?>

<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="#" onclick="logout();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>

<script>
    function logout() {
        // Destroy all sessions
        <?php session_destroy(); ?>
        // Redirect to index.php
        window.location.href = "index.php";
    }
</script>

<?php ?>