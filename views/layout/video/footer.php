    <script type="text/javascript">
        let apiKey    =  <?php print api_key?>;
        let sessionId = '<?php print $_SESSION['tokbox']['sessonId']; ?>';
        let token     = '<?php print $_SESSION['tokbox']['token']; ?>';
        let base_url  = '<?=base_url?>';
    </script>
    <script type="text/javascript" src="<?=base_url?>plugins/Tokbox/tokbox.js"></script>
</body>
</html>