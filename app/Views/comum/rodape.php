    <script src="/js/plugins/jquery.min.js"></script>
    <script src="/js/plugins/bootstrap.min.js"></script>
    <script src="/js/plugins/jquery-mask.min.js"></script>
    <script src="/js/plugins/jquery-validate.min.js"></script>
    <script src="/js/plugins/moment.min.js"></script>
    <script src="/js/plugins/date-range-picker.min.js"></script>
    <script src="/js/global.js"></script>
    <?php if (isset($js)) { ?> 
        <?php foreach ($js as $src) { ?>
            <script src="/js/<?php echo $src ?>"></script>
        <?php } ?> 
    <?php } ?> 
  </body>
</html>