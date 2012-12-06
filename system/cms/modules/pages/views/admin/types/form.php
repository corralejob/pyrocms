<section class="title">
	<?php if ($this->method == 'create'): ?>
	<h4><?php echo lang('page_types.create_title');?></h4>
	<?php else: ?>
	<h4><?php echo sprintf(lang('page_types.edit_title'), $page_type->title);?></h4>
	<?php endif; ?>
</section>

<section class="item">
	
<?php echo form_open(); ?>

	<div class="tabs">
	
		<ul class="tab-menu">
			<li><a href="#page-layout-html"><span><?php echo lang('page_types.html_label');?></span></a></li>
			<li><a href="#page-layout-css"><span><?php echo lang('page_types.css_label');?></span></a></li>
			<li><a href="#page-layout-script"><span><?php echo lang('pages:js_label');?></span></a></li>
		</ul>
		
		<div class="form_inputs" id="page-layout-html">
		
			<fieldset>
				
				<ul>
					<li class="even">
						<label for="title"><?php echo lang('global:title');?> <span>*</span></label>
						<div class="input"><?php echo form_input('title', $page_type->title, 'maxlength="60"'); ?></div>
					</li>

					<?php if ($this->method === 'create'): ?>
					<li>
						<label for="stream_slug"><?php echo lang('page_types:select_stream');?></label>
						<div class="input"><?php echo form_dropdown('stream_slug', array(0 => lang('page_types:auto_create_stream')) + $page_type->streams, isset($page_type->stream_slug) ? $page_type->stream_slug : false); ?></div>
					</li>
					<?php endif; ?>
					
					<li>
						<label for="theme_layout"><?php echo lang('page_types:theme_layout_label');?></label>
						<div class="input"><?php echo form_dropdown('theme_layout', $theme_layouts, $page_type->theme_layout ? $page_type->theme_layout : 'default'); ?></div>
					</li>
			
					<li class="even">
						<label for="html_editor"><?php echo lang('page_types.layout'); ?></label>
						<?php echo form_textarea(array('id'=>'html_editor', 'name'=>'body', 'value' => ($page_type->body == '' ? '<h2>{{ page:title }}</h2>'.PHP_EOL.'{{ page:body }}' : $page_type->body), 'rows' => 50)); ?>
					</li>
				</ul>
				
			</fieldset>
		
		</div>
		
		<!-- Design tab -->
		<div class="form_inputs" id="page-layout-css">
			
			<fieldset>
		
			<ul>
				<li>
					<label for="css">CSS</label><br />
					<?php echo form_textarea('css', $page_type->css, 'class="css_editor" id="css"'); ?>
				</li>
			</ul>
			
			</fieldset>
			
		</div>
		
		<!-- Script tab -->
		<div class="form_inputs" id="page-layout-script">

			<fieldset>

			<ul>
				<li>
					<label for="js">JavaScript</label><br />
					<?php echo form_textarea('js', $page_type->js, 'class="js_editor" id="js"'); ?>
				</li>
			</ul>

			</fieldset>

		</div>
		
	</div>

	<div class="buttons float-right padding-top">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel') )); ?>
	</div>

<?php echo form_close(); ?>
</section>