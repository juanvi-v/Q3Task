<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>
	<fieldset>
		<legend><?php echo __d('q3_task','Admin Add Task'); ?></legend>
	<?php
		echo $this->Form->input('last', array('type' => 'text', 'class' => 'datetime'));
		echo $this->Form->input('next', array('type' => 'text', 'class' => 'datetime'));
		echo $this->Form->input('interval');
		echo $this->Form->input('action');
		echo $this->Form->input('comments');
		echo $this->Form->input('error');
		echo $this->Form->input('result');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php $link = $this->Html->link(__d('q3_task','Cancelar'), array('action' => 'index'), array(), __d('q3_task','¿Descartar los cambios realizados?')); ?><?php echo $this->Form->submit(__d('q3_task','Guardar'), array('before' => $link)); ?>
<?php echo $this->Form->end(); ?>
</div>
