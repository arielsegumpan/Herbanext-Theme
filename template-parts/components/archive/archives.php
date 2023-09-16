<?php
$archives = wp_get_archives(array(
    'type' => 'monthly',
    'format' => 'option',
    'show_post_count' => 1,
    'echo' => 0, // Get the result as a string instead of echoing it
));
?>

<select name="archive-dropdown" class="form-select py-2 mt-4 mb-4" aria-label="Select category" id="exampleFormControlSelect1" onchange="window.location.href=this.value;">
    <option value="" selected disabled><?php esc_html_e('Select Month'); ?></option>
    <?= $archives; ?> <!-- Use shorthand PHP echo syntax -->
</select>
