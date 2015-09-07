<?php
App::import('Vendor', 'Funciones');
?>

<?php // Secondary / contextual navbar ?>
<nav class="SecondaryNavbar" role="navigation">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
      
        <div class="navbar-header">
          <h1 class="SecondaryNavbar_sectionTitle"><?php echo __d('q3_task','Tareas'); ?></h1>
        </div>
     
     	<?php /*
        <ul class="SecondaryNavbar_contextualNav">
          <li class="active"><a href="#">Contextual option1</a></li>
          <li><a href="#">Contextual option2</a></li>
        </ul>
        */ ?>

      </div>
    </div>
  
  </div>
</nav>

<div class="tasks index">
	<?php /* <h2><?php echo __d('q3_task','Tareas'); ?></h2> */ ?>

	<?php /* echo $this->Form->create('Task');?>

	<fieldset class="search">
		<legend><?php echo __d('q3_task','Búsqueda de Tasks'); ?></legend>
		<?php

		echo '<div id="open_search">';
		echo $this->Form->input('open_search', array('label' => __d('q3_task','Búsqueda libre')));
		echo '</div>';
		echo '<div id="advanced_search" class="hidden">';
		echo $this->Form->input('last', array('type' => 'text', 'class' => 'datetime', 'required' => false));
		echo $this->Form->input('next', array('type' => 'text', 'class' => 'datetime', 'required' => false));
		echo $this->Form->input('interval', array('required' => false));
		echo $this->Form->input('action', array('required' => false));
		echo $this->Form->input('comments', array('required' => false));
		echo $this->Form->input('error', array('required' => false));
		echo $this->Form->input('result', array('required' => false));
		echo '</div>';
		$link = $this->Html->link(__d('q3_task','Filtro avanzado'), array(), array('class' => 'advanced_filter'));
		echo $this->Form->submit(__d('q3_task','Buscar'), array('after' => $link));

	?>
	</fieldset>
	<?php echo $this->Form->end();*/?>
	<?php echo $this->Form->create('Task',array('url' => array('action' => 'index','plugin'=>false),'id'=>'index_form'));?>


	<div class="BulkActionToolbar">

		<!-- <a class="btn u-btnMainAction pull-right">Crear nuevo</a> -->
		<?php echo $this->Html->link(
			' ' . __d('q3_task','Nueva'),
			array('action' => 'add'),
			array('escape' => false, 'class' => 'btn u-btnMainAction pull-right')
		); ?>

		<?php if(!empty($tasks)):?>
		<ul class="list-inline">

			<li>
			<?php echo $this->Html->link(
				'<i class="icon icon-delete"></i> ' . __d('q3_task','Eliminar'),
				array('action' => 'delete'),
				array('escape' => false, 'class' => 'index_form_link')
			); ?>
			</li>
			
			<li>
			<?php echo $this->Html->link(
				'<i class="icon icon-lock-open"></i> '.__d('q3_task','Activar'),
				array('action'=>'set_active', 1),
				array('escape'=>false, 'class' => 'index_form_link')
			);?>

			</li>
			<li>
			<?php echo $this->Html->link(
				'<i class="icon icon-https"></i> '.__d('q3_task','Desactivar'),
				array('action'=>'set_active', 0),
				array('escape'=>false, 'class' => 'index_form_link')
			);?>
			</li>
	
		</ul>
		<?php endif; ?>	
	
	<div style="clear:both;"></div>
	</div>

	<?php /*

	<div class="index_actions">
	<ul>
		<li>
			<?php echo $this->Html->link(
							$this->Html->image('icons/add.png', array('alt' => '')) . ' ' . __d('q3_task','Nueva'),
							array('action' => 'add'),
							array('escape' => false)
						); ?>
		</li>
		<?php if(!empty($tasks)):?>
		<li>
			<?php echo $this->Html->link(
							$this->Html->image('icons/cross.png', array('alt' => '')) . ' ' . __d('q3_task','Eliminar'),
							array('action' => 'delete'),
							array('escape' => false, 'class' => 'index_form_link')
						); ?>
		</li>


		<li>

		<?php echo $this->Html->link(
					$this->Html->image('icons/unlocked.png',array('alt'=>'')).' '.__d('q3_task','Activar'),
					array('action'=>'set_active', 1),
					array('escape'=>false, 'class' => 'index_form_link')
				);?>

		</li>
		<li>
		<?php echo $this->Html->link(
					$this->Html->image('icons/locked.png',
					array('alt'=>'')).' '.__d('q3_task','Desactivar'),
					array('action'=>'set_active', 0),
					array('escape'=>false, 'class' => 'index_form_link')
				);?>
		</li>
	<?php endif; ?>	</ul>
	</div>

	*/ ?>

	<table class="table table-striped table-hover" id="js-datatable-tasks">
		<thead>
			<tr>
				<?php /* only for datatables
				<th class="no-sort"><?php echo $this->Form->checkbox('main', array('id'=>'main')); ?></th>
				<th><?php echo __d('q3_task','Última ejecución'); ?></th>
				<th><?php echo __d('q3_task','Próxima ejecución'); ?></th>
				<th><?php echo __d('q3_task','Intervalo'); ?></th>
				<th><?php echo __d('q3_task','Acción'); ?></th>
				<th><?php echo __d('q3_task','Observaciones'); ?></th>
				<th><?php echo __d('q3_task','Resultado'); ?></th>
				<th><?php echo __d('q3_task','Activa'); ?></th>
				<th class="no-sort u-thTableActions"><?php echo __d('q3_task','Acciones'); ?></th>
				*/ ?>

				<?php /* Antiguas ordenaciones */ ?>
				<th><?php echo $this->Form->checkbox('main', array('id'=>'main')); ?></th>
				<th><?php echo $this->Paginator->sort('last',__d('q3_task','Última ejecución')); ?></th>
				<th><?php echo $this->Paginator->sort('next',__d('q3_task','Próxima ejecución')); ?></th>
				<th><?php echo $this->Paginator->sort('interval',__d('q3_task','Intervalo')); ?></th>
				<th><?php echo $this->Paginator->sort('action',__d('q3_task','Acción')); ?></th>
				<th><?php echo $this->Paginator->sort('comments',__d('q3_task','Observaciones')); ?></th>
				<th><?php echo $this->Paginator->sort('result',__d('q3_task','Resultado')); ?></th>
				<th><?php echo $this->Paginator->sort('active',__d('q3_task','Activa')); ?></th>
				<th class="actions"><?php echo __d('q3_task','Acciones'); ?></th>

			</tr>
			
			<?php /* Antiguos filtros */ ?>

		
		</thead>

		<?php /* only for datatables
		<tfoot>
	        <tr>
				<th class="no-sort"></th>
				<th class="js-TableFilter-input"><?php echo __d('q3_task','Última ejecución'); ?></th>
				<th class="js-TableFilter-input"><?php echo __d('q3_task','Próxima ejecución'); ?></th>
				<th class="js-TableFilter-input"><?php echo __d('q3_task','Intervalo'); ?></th>
				<th class="js-TableFilter-input"><?php echo __d('q3_task','Acción'); ?></th>
				<th class="js-TableFilter-input"><?php echo __d('q3_task','Observaciones'); ?></th>
				<th class="js-TableFilter-input"><?php echo __d('q3_task','Resultado'); ?></th>
				<th class="js-TableFilter-input"><?php echo __d('q3_task','Activa'); ?></th>
	          	<th class="no-sort"></th>
	        </tr>
	    </tfoot>
	    */ ?>

	    <tbody>
		<?php foreach ($tasks as $task): ?>
		<tr>

			<td><?php echo $this->Form->checkbox('Selected.'.$task['Task']['id'] , array('class'=>'selected')); ?></td>
			<td><?php
			if($task['Task']['last']=='0000-00-00 00:00:00'){
				echo __d('q3_task','Nunca');
			}
			else{
				echo $this->Date->dateFormat($task['Task']['last'],__d('q3_task','abreviada_hora'));
			}
			?>&nbsp;</td>
			<td><?php echo $this->Date->dateFormat($task['Task']['next'],__d('q3_task','abreviada_hora')); ?>&nbsp;</td>
			<td><?php echo h($task['Task']['interval']); ?>&nbsp;</td>
			<td><?php echo h($task['Task']['action']); ?>&nbsp;</td>
			<td><?php echo h($task['Task']['comments']); ?>&nbsp;</td>
			
			<td class="icon"><?php
			switch($task['Task']['result']){
				case TASK_RESULT_WARNING: $r_image='exclamation.png';
				$r_text=__d('q3_task','advertencia',true);
				break;
				case TASK_RESULT_ERROR: $r_image='error.png';
				$r_text=__d('q3_task','error',true);
				break;
				case TASK_RESULT_NORMAL:
				default:
					$r_image='info.png';
					$r_text=__d('q3_task','sin error',true);
					break;
			}

			echo $this->Html->image('icons/'.$r_image,array('alt'=>$r_text,'title'=>$r_text,'width'=>16,'height'=>16)); ?>&nbsp;</td>
			<td>
				<?php if ($task['Task']['active']==TASK_STATUS_ACTIVE) {
					//$image = $this->Html->image('icons/unlocked.png', array('alt' => __d('q3_task','Desactivar')));
					echo $this->Html->link(
						'<i class="icon icon-https"></i>',
						array('action' => 'set_active', TASK_STATUS_INACTIVE, $task['Task']['id']),
						array('escape' => false, 'class' => 'u-btnTableActions')
					);
				} else {
					//$image = $this->Html->image('icons/locked.png', array('alt' => __d('q3_task','Activar')));
					echo $this->Html->link(
						'<i class="icon icon-lock-open"></i>',
						array('action' => 'set_active', TASK_STATUS_ACTIVE, $task['Task']['id']),
						array('escape' => false, 'class' => 'u-btnTableActions')
					);
				} ?>
			</td>
			<td class="u-thTableActions">
				<div class="btn-group btn-group-xs" role="group" aria-label="">
				
				<?php echo $this->Html->link(
					//__d('q3_task','Editar'), 
					'<i class="icon icon-create"></i>', 
					array('action' => 'edit', $task['Task']['id']),
					array('escape' => false, 'class' => 'btn u-btnTableActions')
				); ?>

				<?php /*
				<?php echo $this->Form->postLink(
					//__d('q3_task','Eliminar'),
					'<i class="icon icon-delete"></i>', 
					array('action' => 'delete', $task['Task']['id']), null, __d('q3_task','¿Confirma que desea eliminar %s?', $task['Task']['action']),
					array('escape' => false, 'class' => 'btn u-btnTableActions')
				); ?>
				*/ ?>

				<?php echo $this->Html->link(
					//__d('q3_task','Delete'), 
					'<i class="icon icon-delete"></i>',
					array('action' => 'delete', $task['Task']['id']), 
					array('confirm'=>__d('q3_task','Are you sure to delete %s?', $task['Task']['action']), 'escape' => false, 'class' => 'btn u-btnTableActions')
				); ?>

				<?php echo $this->Html->link(
					__d('q3_task','Ver'), 
					array('action' => 'view', $task['Task']['id']),
					array('escape' => false, 'class' => 'btn u-btnTableActions')
				); ?>

				</div>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>


<?php /*


<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Form->checkbox('main', array('id'=>'main')); ?></th>
			<th><?php echo $this->Paginator->sort('last',__d('q3_task','Última ejecución')); ?></th>
			<th><?php echo $this->Paginator->sort('next',__d('q3_task','Próxima ejecución')); ?></th>
			<th><?php echo $this->Paginator->sort('interval',__d('q3_task','Intervalo')); ?></th>
			<th><?php echo $this->Paginator->sort('action',__d('q3_task','Acción')); ?></th>
			<th><?php echo $this->Paginator->sort('comments',__d('q3_task','Observaciones')); ?></th>

			<th><?php echo $this->Paginator->sort('result',__d('q3_task','Resultado')); ?></th>
			<th><?php echo $this->Paginator->sort('active',__d('q3_task','Activa')); ?></th>

			<th class="actions"><?php echo __d('q3_task','Acciones'); ?></th>
	</tr>
	<?php foreach ($tasks as $task): ?>
	<tr>
		<td><?php echo $this->Form->checkbox('Selected.'.$task['Task']['id'] , array('class'=>'selected')); ?></td>
		<td><?php
		if($task['Task']['last']=='0000-00-00 00:00:00'){
			echo __d('q3_task','Nunca');
		}
		else{
			echo $this->Date->dateFormat($task['Task']['last'],__d('q3_task','abreviada_hora'));
		}
		?>&nbsp;</td>
		<td><?php echo $this->Date->dateFormat($task['Task']['next'],__d('q3_task','abreviada_hora')); ?>&nbsp;</td>
		<td><?php echo h($task['Task']['interval']); ?>&nbsp;</td>
		<td><?php echo h($task['Task']['action']); ?>&nbsp;</td>
		<td><?php echo h($task['Task']['comments']); ?>&nbsp;</td>
		<td class="icon"><?php
		switch($task['Task']['result']){
			case TASK_RESULT_WARNING: $r_image='exclamation.png';
			$r_text=__d('q3_task','advertencia',true);
			break;
			case TASK_RESULT_ERROR: $r_image='error.png';
			$r_text=__d('q3_task','error',true);
			break;
			case TASK_RESULT_NORMAL:
			default:
				$r_image='info.png';
				$r_text=__d('q3_task','sin error',true);
				break;
		}

		echo $this->Html->image('icons/'.$r_image,array('alt'=>$r_text,'title'=>$r_text,'width'=>16,'height'=>16)); ?>&nbsp;</td>
		<td class="icon">
						<?php if ($task['Task']['active']==TASK_STATUS_ACTIVE) {
							$image = $this->Html->image('icons/unlocked.png', array('alt' => __d('q3_task','Desactivar')));
							echo $this->Html->link(
								$image,
								array('action' => 'set_active', TASK_STATUS_INACTIVE, $task['Task']['id']),
								array('escape' => false)
							);
						} else {
							$image = $this->Html->image('icons/locked.png', array('alt' => __d('q3_task','Activar')));
							echo $this->Html->link(
								$image,
								array('action' => 'set_active', TASK_STATUS_ACTIVE, $task['Task']['id']),
								array('escape' => false)
							);
						}

					?></td>
		<td class="actions">
			<?php echo $this->Html->link(__d('q3_task','Ver'), array('action' => 'view', $task['Task']['id'])); ?>
			<?php echo $this->Html->link(__d('q3_task','Editar'), array('action' => 'edit', $task['Task']['id'])); ?>
			<?php echo $this->Form->postLink(__d('q3_task','Eliminar'), array('action' => 'delete', $task['Task']['id']), null, __d('q3_task','¿Confirma que desea eliminar %s?', $task['Task']['action'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>



*/ ?>


	<div class="PaginationToolbar">
		<p class="alert alert-danger">
		<?php
		echo $this->Paginator->counter(array(
		'format' => __d('q3_task','Página {:page} de {:pages}, viendo {:current} registros de {:count} totales, empezando en {:start}, finalizando en {:end}')
		));
		?></p>

		<div class="PaginationToolbar_paginationLinks">
		<?php
			echo $this->Paginator->prev('< ' . __d('q3_task','anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__d('q3_task','siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</div>
</div>
<?php echo $this->Form->end(); ?>