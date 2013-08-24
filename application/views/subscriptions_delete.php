<div id="content">
	<h1><i class="icon icon-rss"></i><?php echo $sub->fed_title; ?></h1>
	<ul class="actions">
		<li><a href="<?php echo base_url(); ?>subscriptions"><i class="icon icon-step-backward"></i><?php echo $this->lang->line('back'); ?></a></li>
	</ul>
	<?php echo form_open(current_url()); ?>
	<h2><?php echo $this->lang->line('delete'); ?></h2>
	<?php echo validation_errors(); ?>
	<p>
	<span class="label"><?php echo $this->lang->line('title'); ?></span>
	<?php echo $sub->fed_title; ?>
	</p>

	<p>
	<span class="label"><?php echo $this->lang->line('url'); ?></span>
	<?php echo $sub->fed_link; ?>
	</p>

	<p>
	<span class="label"><?php echo $this->lang->line('url_site'); ?></span>
	<?php echo $sub->fed_url; ?>
	</p>

	<?php if($sub->fed_description) { ?>
		<p>
		<span class="label"><?php echo $this->lang->line('description'); ?></span>
		<?php echo $sub->fed_description; ?>
		</p>
	<?php } ?>

	<?php if($sub->fed_lasterror) { ?>
		<p>
		<span class="label"><?php echo $this->lang->line('error'); ?></span>
		<?php echo $sub->fed_lasterror; ?>
		</p>
	<?php } ?>

	<p>
	<?php echo form_label($this->lang->line('confirm').' *', 'confirm'); ?>
	<?php echo form_checkbox('confirm', '1', FALSE, 'id="confirm" class="inputcheckbox"'); ?>
	</p>

	<p>
	<button type="submit"><?php echo $this->lang->line('send'); ?></button>
	</p>
	<?php echo form_close(); ?>
</div>
