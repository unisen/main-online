<script type="text/javascript">
    jQuery(document).on("ready pdocrud_on_load pdocrud_after_submission pdocrud_after_ajax_action", function (event, container) {
        jQuery("<?php echo $elementName; ?>").addClass("animated <?php echo implode(' ', $params);?>");
    });
</script>    