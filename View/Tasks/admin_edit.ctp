<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>
	<fieldset>
		<legend><?php echo __d('q3_task','Editar tarea'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('next', array('type' => 'text', 'class' => 'datetime','label'=>__d('q3_task','Próxima ejecucion')));
		echo $this->Form->input('interval',array('label'=>__d('q3_task','Intervalo (minutos)')));
		echo $this->Form->input('action',array('label'=>__d('q3_task','Acción')));
		echo $this->Form->input('comments',array('label'=>__d('q3_task','Observaciones')));
		echo $this->Form->input('active',array('label'=>__d('q3_task','Activa'),'options'=>array(TASK_STATUS_INACTIVE=>__d('q3_task','Inactiva'),TASK_STATUS_ACTIVE=>__d('q3_task','Activa'))));
	?>
	</fieldset>
<?php $link = $this->Html->link(__d('q3_task','Cancelar'), array('action' => 'index'), array(), __d('q3_task','¿Descartar los cambios realizados?')); ?><?php echo $this->Form->submit(__d('q3_task','Guardar'), array('before' => $link)); ?>
<?php echo $this->Form->end(); ?>
</div>
