<?php
App::uses('Q3TaskAppController', 'Q3Task.Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends Q3TaskAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $helpers=array('Q3Toolbox.Date','Q3Toolbox.Tools') ;

/**
 * beforeFilter method
 *
 * @return void
 */

	public function beforeFilter() {
		if (in_array($this->params['action'], array('index', 'admin_index', 'delete', 'admin_delete', 'set_active', 'admin_set_active'))) {
			$this->Security->validatePost = false;
			$this->Security->csrfCheck = false;
		}
		parent::beforeFilter();
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Task->recursive = 0;
		$conditions = $this->_parseSearch();
		$this->set('tasks', $this->paginate($conditions));
		$this->_setSelects();
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__d('q3_task','Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$this->set('task', $this->Task->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__d('q3_task','The task has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('q3_task','The task could not be saved. Please, try again.'));
			}
		}
		$this->render('admin_edit');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__d('q3_task','Invalid task'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__d('q3_task','The task has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('q3_task','The task could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
			$this->request->data = $this->Task->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @param boolean $confirm
 * @return void
 */
	public function admin_delete($id = null, $confirm = false) {
		if (!empty($id)) {
			$ids = array($id);
		} else {
			$ids = array();
		}

		if(!empty($this->request->data['Selected'])) {
			foreach ($this->request->data['Selected'] as $selected_id => $selected) {
				if ($selected) {
					$ids[] = $selected_id;
				}
			}
		}

		if (!empty($ids) && $confirm) {
			$error = false;
			foreach ($ids as $id) {
				$this->Task->id = $id;
				if (!$this->Task->delete()) {
					$error = true;
				}
				if ($error) {
					$this->Session->setFlash(__d('q3_task','Fallo al realizar la operación'));
				} else {
					$this->Session->setFlash(__d('q3_task','Tasks eliminados'));
				}
			}
			$this->redirect(array('action' => 'index'));
		} elseif (empty($ids)) {
			throw new NotFoundException(__d('q3_task','Tasks no encontrados'));
			$this->redirect(array('action' => 'index'));
		}
		$tasks = $this->Task->find('all', array(
			'conditions' => array('Task.id' => $ids)
		));
		$this->set(compact('tasks'));

	}

/**
 * admin_set_active method
 *
 * @throws NotFoundExceptiona
 * @throws MethodNotAllowedException
 * @param int $active
 * @param string $id
 * @return void
 */

	public function admin_set_active($active = 0, $id = null) {
		if (!empty($id)) {
			$ids = array($id);
		} else {
			$ids = array();
		}

		if(!empty($this->request->data['Selected'])) {
			foreach ($this->request->data['Selected'] as $selected_id => $selected) {
				if ($selected) {
					$ids[] = $selected_id;
				}
			}
		}

		if (!empty($ids)) {
			$error = false;
			foreach ($ids as $id) {
				$this->Task->id = $id;
				if (!$this->Task->save(compact('active'))) {
					$error = true;
				}
				if ($error) {
					$this->Session->setFlash(__d('q3_task','Fallo al realizar la operación'));
				} else {
					($active)?$this->Session->setFlash(__d('q3_task','Tareas activadas')):$this->Session->setFlash(__d('q3_task','Tareas desactivadas'));
				}
			}
		} else {
			throw new NotFoundException(__d('q3_task','Tasks no encontrados'));
		}
		$this->redirect(array('action' => 'index'));
	}

	protected function _setSelects() {
			$this->set(compact(''));
	}
}
