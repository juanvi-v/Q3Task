
<div class="FichaActionToolbar">

	<?php echo $this->Html->link(
		__d('q3_task','Agregar nueva tarea'), 
		array('action' => 'add'),
		array('escape' => false, 'class' => 'btn u-btnMainAction pull-right')
	); ?> 

	<ul class="list-inline">
	  <li>
		<?php echo $this->Html->link(
			'<i class="icon icon-dehaze"></i> ' . __d('q3_task','Volver al listado de tareas'), 
			array('action' => 'index'),
			array('escape' => false)
		); ?>
	  </li>
	</ul> 

<div style="clear:both;"></div>
</div>

<div class="panel panel-default">

  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __d('q3_task','Editar tarea'); ?></h3>
  </div>
  
  <div class="panel-body panel-form-wrapper">

	<div class="tasks form"><!-- .form wrapper -->
	<?php echo $this->Form->create('Task'); ?>
		<fieldset>
			
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('next', array('type' => 'text', 'class' => 'datetime','label'=>__d('q3_task','Próxima ejecucion')));
			echo $this->Form->input('interval',array('label'=>__d('q3_task','Intervalo (minutos)')));
			echo $this->Form->input('action',array('label'=>__d('q3_task','Acción')));
			echo $this->Form->input('comments',array('label'=>__d('q3_task','Observaciones')));
			echo $this->Form->input('active',array('label'=>__d('q3_task','Activa'),'options'=>array(TASK_STATUS_INACTIVE=>__d('q3_task','Inactiva'),TASK_STATUS_ACTIVE=>__d('q3_task','Activa'))));
		?>
		</fieldset>

		<fieldset>
		<?php $link = $this->Html->link(
			__d('q3_task','Cancelar'), 
			array('action' => 'index'), 
			array('escape' => false, 'class' => 'btn btn-default pull-right'), __d('q3_task','¿Descartar los cambios realizados?')
		); ?>
		<?php echo $this->Form->submit(
			__d('q3_task','Guardar'), 
			array('before' => $link, 'class' => 'btn u-btnMainAction pull-left')
		); ?>
		</fieldset>

	<?php echo $this->Form->end(); ?>
	</div><!-- /.form wrapper -->

  </div><!-- /panel-body -->

  <div class="panel-footer clearfix">

    <!-- <button type="submit" class="btn u-btnMainAction pull-left"><i class="icon icon-create"></i> Guardar</button> -->
    <!-- <a class="btn btn-default pull-right"><i class="icon icon-clear"></i> Cancelar</a> -->

  </div>

</div><!-- /panel -->

<?php /*

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

*/ ?>