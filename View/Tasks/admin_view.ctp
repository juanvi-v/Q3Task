<div class="tasks view">
<h2><?php  echo __d('q3_task','Task'); ?></h2>
	<dl>
		<dt><?php echo __d('q3_task','Id'); ?></dt>
		<dd>
			<?php echo h($task['Task']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Last'); ?></dt>
		<dd>
			<?php echo h($task['Task']['last']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Next'); ?></dt>
		<dd>
			<?php echo h($task['Task']['next']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Interval'); ?></dt>
		<dd>
			<?php echo h($task['Task']['interval']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Action'); ?></dt>
		<dd>
			<?php echo h($task['Task']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Comments'); ?></dt>
		<dd>
			<?php echo h($task['Task']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Error'); ?></dt>
		<dd>
			<?php echo h($task['Task']['error']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Result'); ?></dt>
		<dd>
			<?php echo h($task['Task']['result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Active'); ?></dt>
		<dd>
			<?php echo h($task['Task']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Created'); ?></dt>
		<dd>
			<?php echo h($task['Task']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('q3_task','Modified'); ?></dt>
		<dd>
			<?php echo h($task['Task']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('q3_task','Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('q3_task','Editar Task'), array('action' => 'edit', $task['Task']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('q3_task','Eliminar Task'), array('action' => 'delete', $task['Task']['id']), null, __d('q3_task','¿Confirma que desea eliminar %s?', $task['Task']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('q3_task','Listar Tasks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('q3_task','Nuevo Task'), array('action' => 'add')); ?> </li>
	</ul>
</div>
