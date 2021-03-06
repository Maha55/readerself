	<nav>
		<ul class="actions">
			<li><a href="<?php echo base_url(); ?>feeds/feedly"><i class="icon icon-plus"></i>Feedly Essentials</a></li>
			<?php if($feeds) { ?>
				<li><a href="<?php echo base_url(); ?>feeds/export"><i class="icon icon-upload-alt"></i><?php echo $this->lang->line('export'); ?></a></li>
			<?php } ?>
		</ul>
	</nav>
</header>
<aside>
	<ul>
		<li class="static">
			<?php echo form_open(current_url()); ?>
				<p>
				<?php echo form_label($this->lang->line('title'), 'feeds_fed_title'); ?>
				<?php echo form_input($this->router->class.'_feeds_fed_title', set_value($this->router->class.'_feeds_fed_title', $this->session->userdata($this->router->class.'_feeds_fed_title')), 'id="feeds_fed_title" class="inputtext"'); ?>
				</p>
				<?php if($errors > 0) { ?>
					<p>
					<?php echo form_label($this->lang->line('errors').' ('.$errors.')', 'feeds_fed_lasterror'); ?>
					<?php echo form_dropdown($this->router->class.'_feeds_fed_lasterror', array('' => '--', 0 => $this->lang->line('no'), 1 => $this->lang->line('yes')), set_value($this->router->class.'_feeds_fed_lasterror', $this->session->userdata($this->router->class.'_feeds_fed_lasterror')), 'id="feeds_fed_lasterror" class="select numeric"'); ?>
					</p>
				<?php } ?>
				<p>
				<button type="submit"><?php echo $this->lang->line('send'); ?></button>
				</p>
			<?php echo form_close(); ?>
		</li>
		<?php if($last_added) { ?>
		<li class="static"><h2><i class="icon icon-bookmark-empty"></i><?php echo $this->lang->line('last_added'); ?></h2></li>
			<?php foreach($last_added as $added) { ?>
			<li<?php if($added->direction) { ?> dir="<?php echo $added->direction; ?>"<?php } ?>><a style="background-image:url(https://www.google.com/s2/favicons?domain=<?php echo $added->fed_host; ?>&amp;alt=feed);" class="favicon" href="<?php echo base_url(); ?>feeds/read/<?php echo $added->fed_id; ?>"><?php echo $added->fed_title; ?></a></li>
			<?php } ?>
		<?php } ?>
	</ul>
</aside>
<main>
	<section>
		<section>
	<article class="title">
		<h2><i class="icon icon-rss"></i><?php echo $this->lang->line('feeds'); ?> (<?php echo $position; ?>)</h2>
	</article>

	<?php if($feeds) { ?>
		<?php foreach($feeds as $fed) { ?>
		<article<?php if($fed->fed_direction) { ?> dir="<?php echo $fed->fed_direction; ?>"<?php } ?>>
			<ul class="actions">
				<?php if($this->member->mbr_administrator == 1) { ?>
					<li><a href="<?php echo base_url(); ?>feeds/update/<?php echo $fed->fed_id; ?>"><i class="icon icon-wrench"></i><?php echo $this->lang->line('update'); ?></a></li>
				<?php } ?>
				<?php if($fed->subscribers == 0) { ?>
					<li><a href="<?php echo base_url(); ?>feeds/delete/<?php echo $fed->fed_id; ?>"><i class="icon icon-trash"></i><?php echo $this->lang->line('delete'); ?></a></li>
				<?php } ?>
				<li><a href="<?php echo base_url(); ?>feeds/subscribe/<?php echo $fed->fed_id; ?>"><i class="icon icon-bookmark-empty"></i><?php echo $this->lang->line('subscribe'); ?></a></li>
			</ul>
			<h2><a style="background-image:url(https://www.google.com/s2/favicons?domain=<?php echo $fed->fed_host; ?>&amp;alt=feed);" class="favicon" href="<?php echo base_url(); ?>feeds/read/<?php echo $fed->fed_id; ?>"><?php echo $fed->fed_title; ?></a></h2>
			<ul class="item-details">
				<?php if($fed->fed_lastcrawl) { ?><li><i class="icon icon-truck"></i><?php echo $fed->fed_lastcrawl; ?></li><?php } ?>
				<li><i class="icon icon-group"></i><?php echo $fed->subscribers; ?> <?php if($fed->subscribers > 1) { ?><?php echo mb_strtolower($this->lang->line('subscribers')); ?><?php } else { ?><?php echo mb_strtolower($this->lang->line('subscriber')); ?><?php } ?></li>
				<li class="hide-phone"><a href="<?php echo $fed->fed_link; ?>" target="_blank"><i class="icon icon-rss"></i><?php echo $fed->fed_link; ?></a></li>
				<?php if($fed->fed_url) { ?><li class="block"><a href="<?php echo $fed->fed_url; ?>" target="_blank"><i class="icon icon-external-link"></i><?php echo $fed->fed_url; ?></a></li><?php } ?>
				<?php if($this->config->item('tags') && $fed->categories) { ?>
				<li class="block hide-phone"><i class="icon icon-tags"></i><?php echo implode(', ', $fed->categories); ?></li>
				<?php } ?>
				<?php if($fed->fed_lasterror) { ?><li class="block"><i class="icon icon-bell"></i><?php echo $fed->fed_lasterror; ?></li><?php } ?>
			</ul>
			<div class="item-content">
				<?php echo $fed->fed_description; ?>
			</div>
		</article>
		<?php } ?>
		<div class="paging">
			<?php echo $pagination; ?>
		</div>
	<?php } ?>
		</section>
	</section>
</main>
