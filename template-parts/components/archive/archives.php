<select name="archive-dropdown" class=" form-control custom-select" id="exampleFormControlSelect1" onChange='document.location.href=this.options[this.selectedIndex].value;'>
<option value=""><?php echo esc_attr(__('Select Month')); ?></option>
<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>