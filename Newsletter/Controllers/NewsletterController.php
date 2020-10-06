<?php 
namespace SakuraPanel\Plugins\Newsletter\Controllers;


// auth midleware : MemberControllerBase
use SakuraPanel\Controllers\Member\{
	MemberControllerBase
};

// forms
use SakuraPanel\Plugins\Newsletter\Forms\{SubscriberForm , GroupForm};

use SakuraPanel\Plugins\Newsletter\Models\{Subscribers , Groups , SubscriberGroups};

use SakuraPanel\Library\Datatables\DataTable;

/**
 * NewsletterController
 */
class NewsletterController extends MemberControllerBase
{	
	public function initialize(){
		parent::initialize();
	
		$this->ajax->disableArray();

		$this->page->set('title', 'Newsletter');
        $this->page->set('description','Manage Newsletters');
		
		$this->page->set('base_route' , 'member/newsletter');
	}

	// index page
	public function indexAction()
	{
		$this->view->pick('plugins/newsletter/index');
	}

	/**	
	 * Get List Subsriptions
	 */
	public function listAction()
	{
		$this->view->dataTable = true;
		
		$this->page->set('title', 'Subscribers');

		$this->view->pick('plugins/newsletter/list');
	}

	/**	
	 * Get List Subsriptions
	 */
	public function groupsAction()
	{
		$this->view->dataTable = true;
		
		$this->page->set('title', 'Groups');

		$this->view->pick('plugins/newsletter/groups');
	}

	/**	
	 * Get List Subsriptions
	 */
	public function groupsubscribersAction($id = null)
	{
		/**	
		 * Check if group existed
		 */
		$group = Groups::findFirstById($id);
		if(!$group){
			$this->flashSession->error('This group does not exist ! ');
			return $this->response->redirect($this->request->getHTTPReferer());
		}
		/**	
		 * Update First Subscriber Group by ID
		 */
		if(!empty($this->request->get('action'))){
			$id = $this->request->getPost('id');
			$row = SubscriberGroups::findFirstById($id);
			
			if (!$row)
				return $this->ajax->setData($id)->error('Please select at least a row to update ! ')->sendResponse();
				
			switch($this->request->get('action')){
				case 'active':
						$row->status = ($row->status == $this::ACTIVE ? $this::INACTIVE : $this::ACTIVE );
						$action = $row->save();
					break;
				case 'delete':
						$action = $row->delete();
					break;
			}

			if ($action){
				$this->ajax->success('Action successfully completed!');
			}else{
				$this->ajax->error('Action was failed !');
			}
			return $this->ajax->sendResponse();
		}

		/**	
		 * Enable datatable assets
		 */
		$this->view->dataTable = true;
		$this->view->group = $group;
		
		/**	
		 * Set Page Information
		 */
		$this->page->set('title', ucfirst($group->name));

		/**	
		 * Pick the datatable view 
		 */
		$this->view->pick('plugins/newsletter/groupsubscribers');
	}

	/**	
	 * edit subscriber
	 */
	public function editsubscriberAction($id = null)
	{
		$row = Subscribers::findFirstById((int) $id) ?: new Subscribers();

		if ($row->id)
			$this->page->set('title', 'Edit Subscriber : ' . (int) $id);
		else
			$this->page->set('title', 'Create New Subscriber');

		$form = new SubscriberForm($row);
		
		if (!empty($this->request->isPost())) {
			if (false === $form->isValid($_POST)) {
			    $messages = $form->getMessages();

			    foreach ($messages as $message) {
			        $this->flashSession->warning((string) $message);
			    }
			}else{
				$form->bind($_POST, $row);

				if ($row->save()) {
					$this->flashSession->success('Subscriber Saved Successffully ');
					return $this->response->redirect($this->request->getHTTPReferer());
				}else{
					$this->flashSession->error('Error ! ' . implode(" & ", $row->getMessages()));
				}
			}
		}else{
			$form->bind($row->toArray() , $row);
		}


		$this->view->form = $form;
		$this->view->row = $row;

		$this->view->pick('plugins/newsletter/subscriberform');
	}

	/**	
	 * edit subscriber
	 */
	public function editgroupAction($id = null)
	{
		$row = Groups::findFirstById((int) $id) ?: new Groups();

		if ($row->id)
			$this->page->set('title', 'Edit Group : ' . (int) $id);
		else
			$this->page->set('title', 'Create New Group');

		$form = new GroupsForm($row);
		
		if (!empty($this->request->isPost())) {
			if (false === $form->isValid($_POST)) {
			    $messages = $form->getMessages();

			    foreach ($messages as $message) {
			        $this->flashSession->warning((string) $message);
			    }
			}else{
				$form->bind($_POST, $row);

				if ($row->save()) {
					$this->flashSession->success('Group Saved Successffully ');
					return $this->response->redirect($this->request->getHTTPReferer());
				}else{
					$this->flashSession->error('Error ! ' . implode(" & ", $row->getMessages()));
				}
			}
		}else{
			$form->bind($row->toArray() , $row);
		}


		$this->view->form = $form;
		$this->view->row = $row;

		$this->view->pick('plugins/newsletter/groupform');
	}

    /** 
     * Active/InActive subscriber
     */
	public function activeAction()
	{
		if ($this->request->isAjax()) {
			$id = (int) $this->request->get('id');

			$row = Subscribers::findFirstById($id);
			if (!$row) {
				return $this->ajax->error('Unknown row id '.$id)->sendResponse();
			}else{
                $row->disableValidation();
                $row->status = ($row->status == $this::ACTIVE) ? $this::INACTIVE  : $this::ACTIVE;

                if ($row->save()) {
					return $this->ajax->success("Row $id {$row->getStatusInfo()->title} successfully !")->sendResponse();
				}else{
					return $this->ajax->error("Row $id {$row->getStatusInfo()->title} failed ! \n".implode("&", $row->getMessages()))->sendResponse();
				}
			}

        }
		return $this->ajax->error('Unknown error')->sendResponse();
	}
	/**	
	 * Get List of subscribers (ajax method)
	 */
	
	public function listajaxAction()
	{
		$builder = $this->modelsManager->createBuilder()
						->columns('id, email, referrer, status ')
						->from(Subscribers::class);

		$dataTables = new DataTable();
		$dataTables->setIngoreUpperCase(true);
		$dataTables->fromBuilder($builder)
		->addCustomColumn('c_referrer' , function ($key , $data) {
			return $data['referrer'] ?? "<i class='fa fa-exclamation'></i> Unknown";
		})
		->addCustomColumn('c_groups' , function ($key , $data) {
			return Subscribers::findFirstById($data['id'])->groups->count();
		})
		->addCustomColumn('c_status' , function ($key , $data) {
			$s = Subscribers::getStatusById($data['status']);
			return "<span class='btn btn-$s->color btn-icon-split btn-sm p-0'>
			<span class='icon text-white-50'>
				<i class='fas fa-$s->icon' style='width:20px'></i>
			</span>
			<span class='text'>$s->title</span>
		</span>";
		})
		->addCustomColumn('c_actions' , function ($key , $data) {
			$id = $data['id'];
			$actions = "";
			if ($data['status'] != $this::DELETED)
				$actions .= 
				"<span title='Delete' data-action ='delete' data-id='$id' class='ml-1 btn btn-danger btn-circle btn-sm table-action-btn'><i class='fas fa-trash'></i></span>";
			
			if ($data['status'] != $this::ACTIVE)
				$actions .= 
					"<span title='Active' data-action='../active' data-id='$id' class='ml-1 btn btn-success btn-circle btn-sm table-action-btn' ><i class='fas fa-check-circle'></i></span>";
				
			if ($data['status'] == $this::ACTIVE)
				$actions .= 
					"<span title='Suspend' data-action='../active' data-id='$id' class='ml-1 btn btn-primary btn-circle btn-sm table-action-btn' ><i class='fas fa-minus-circle'></i></span>";
				
			$actions .= 
				"<a href='{$this->page->get('base_route')}/editsubscriber/$id' class='ml-1 btn btn-warning btn-circle btn-sm ' ><i class='fas fa-edit'></i></a>";


			return $actions;
		})
		->sendResponse();
	}
	
	/**	
	 * Get List of subscribers (ajax method)
	 */
	public function groupsubscribersajaxAction($id = null)
	{
		$group = Groups::findFirstById($id);

		if(!$group)
			return $this->ajax->error('This group does not exist ! ')->sendResponse();
		

		$builder = $this->modelsManager->createBuilder()
							->columns('sg.id as id, s.email as email, sg.created_at as created, sg.updated_at as updated , sg.status as status')
							->addFrom(Subscribers::class, 's')
							->addFrom(SubscriberGroups::class, 'sg')
							->addFrom(Groups::class, 'g')
							->where('g.id = :group_id: and  sg.group_id = g.id and sg.subscriber_id = s.id ' , ['group_id'=>$id]);

		$dataTables = new DataTable();
		$dataTables->setIngoreUpperCase(true);
		$dataTables->fromBuilder($builder)
		->addCustomColumn('c_status' , function ($key , $data) {
			$s = Groups::getStatusById($data['status']);
			return "<span class='btn btn-$s->color btn-icon-split btn-sm p-0'>
			<span class='icon text-white-50'>
				<i class='fas fa-$s->icon' style='width:20px'></i>
			</span>
			<span class='text'>$s->title</span>
		</span>";
		})
		->addCustomColumn('c_created', function($key, $data) {
				return \SakuraPanel\Functions\_getTimeAgo($data['updated']);
		})
		->addCustomColumn('c_updated', function($key, $data) {
				return \SakuraPanel\Functions\_getTimeAgo($data['created']);
		})
		->addCustomColumn('c_actions' , function ($key , $data) {
			$id = $data['id'];
			$actions = "";
			if ($data['status'] != $this::DELETED)
				$actions .= 
				"<span title='Delete' data-action ='?action=delete' data-id='$id' class='ml-1 btn btn-danger btn-circle btn-sm table-action-btn'><i class='fas fa-trash'></i></span>";
			
			if ($data['status'] != $this::ACTIVE)
				$actions .= 
					"<span title='Active' data-action='?action=active' data-id='$id' class='ml-1 btn btn-success btn-circle btn-sm table-action-btn' ><i class='fas fa-check-circle'></i></span>";
				
			if ($data['status'] == $this::ACTIVE)
				$actions .= 
					"<span title='Suspend' data-action='?action=active' data-id='$id' class='ml-1 btn btn-primary btn-circle btn-sm table-action-btn' ><i class='fas fa-minus-circle'></i></span>";
								
			$actions .= 
				"<a href='{$this->page->get('base_route')}/editgroup/$id' class='ml-1 btn btn-warning btn-circle btn-sm ' ><i class='fas fa-edit'></i></a>";


			return $actions;
		})
		->sendResponse();
	}

	/**	
	 * Get List of subscribers (ajax method)
	 */
	public function groupsajaxAction()
	{
		$builder = $this->modelsManager->createBuilder()
						->columns('id, name, description, updated_at, status ')
						->from(Groups::class);

		$dataTables = new DataTable();
		$dataTables->setIngoreUpperCase(true);
		$dataTables->fromBuilder($builder)
		->addCustomColumn('c_status' , function ($key , $data) {
			$s = Groups::getStatusById($data['status']);
			return "<span class='btn btn-$s->color btn-icon-split btn-sm p-0'>
			<span class='icon text-white-50'>
				<i class='fas fa-$s->icon' style='width:20px'></i>
			</span>
			<span class='text'>$s->title</span>
		</span>";
		})
		->addCustomColumn('c_subsribers', function($key , $data){
			$s = Groups::findFirstById($data['id'])->subscribers->count();
			return "<b>$s</b> <i class='fa fa-users'></i>";
		})
		->addCustomColumn('c_update', function($key, $data) {
				return \SakuraPanel\Functions\_getTimeAgo($data['updated_at']);
		})
		->addCustomColumn('c_actions' , function ($key , $data) {
			$id = $data['id'];
			$actions = "";
			if ($data['status'] != $this::DELETED)
				$actions .= 
				"<span title='Delete' data-action ='delete' data-id='$id' class='ml-1 btn btn-danger btn-circle btn-sm table-action-btn'><i class='fas fa-trash'></i></span>";
			
			if ($data['status'] != $this::ACTIVE)
				$actions .= 
					"<span title='Active' data-action='../active' data-id='$id' class='ml-1 btn btn-success btn-circle btn-sm table-action-btn' ><i class='fas fa-check-circle'></i></span>";
				
			if ($data['status'] == $this::ACTIVE)
				$actions .= 
					"<span title='Suspend' data-action='../active' data-id='$id' class='ml-1 btn btn-primary btn-circle btn-sm table-action-btn' ><i class='fas fa-minus-circle'></i></span>";
								
			$actions .= 
				"<a href='{$this->page->get('base_route')}/groupsubscribers/$id' class='ml-1 btn btn-warning btn-circle btn-sm ' ><i class='fas fa-list'></i></a>";
				
			$actions .= 
				"<a href='{$this->page->get('base_route')}/editgroup/$id' class='ml-1 btn btn-warning btn-circle btn-sm ' ><i class='fas fa-edit'></i></a>";


			return $actions;
		})
		->sendResponse();
	}
}