<?php 
namespace SakuraPanel\Plugins\Newsletter\Controllers;


// auth midleware : MemberControllerBase
use SakuraPanel\Controllers\Member\{
	MemberControllerBase
};

use SakuraPanel\Plugins\Newsletter\Forms\{CampaignForm};
use SakuraPanel\Plugins\Newsletter\Models\{Campaigns};

use SakuraPanel\Library\Datatables\DataTable;

/**
 * CampaignController
 */
class CampaignController extends MemberControllerBase
{	
	public function initialize(){
		parent::initialize();
	
		$this->ajax->disableArray();

		$this->page->set('title', 'Campaigns');
        $this->page->set('description','Manage Campaigns');
		
		$this->page->set('base_route' , 'member/newsletter');
	}

	// index page
	public function indexAction()
	{
		$this->view->dataTable = true;
		
		$this->view->pick('plugins/newsletter/campaigns/index');
	}
	// create new campaign
	public function newAction()
	{
		/**	
		 * Page Information
		 */
		$this->page->set('title', 'New Campaign');
		$this->page->set('description', 'Create a new Campaign');

		/**	
		 * Backend 
		 */
		$campaign = new Campaigns();

		$form = new CampaignForm($campaign);

		/**	
		 * If Posted
		 */
		if ($this->request->isPost()){
			$form->bind($_POST, $campaign);

			if (!$form->isValid()) {
				foreach ($form->getMessages() as $message)
					$this->flashSession->error($message);
			}else{
				if ($campaign->save()){
					$this->flashSession->success('Campaign has been created successfully ! ');
				}else{
					foreach ($campaign->getMessages() as $message)
						$this->flashSession->error($message);
				}
			}
		}

		$this->view->form = $form;
		$this->view->pick('plugins/newsletter/campaigns/form');
	}
	// create new campaign
	public function editAction($id = null)
	{
		/**	
		 * Backend 
		 */

		$id = intval($id);
		$campaign = Campaigns::findFirstById($id);

		if (!$campaign){
			/**	
			 * Redirect back
			 */
			$this->flashSession->error('This campaign does not exist ! ');
			return $this->response->redirect($this->request->getHTTPReferer());
		}

		$form = new CampaignForm($campaign);
		/**	
		 * Page Information
		 */
		$this->page->set('title', 'Edit Campaign : '.$id);
		$this->page->set('description', 'Edit Campaign Information');

		/**	
		 * If Posted
		 */
		if ($this->request->isPost()){
			$form->bind($_POST, $campaign);

			if (!$form->isValid()) {
				foreach ($form->getMessages() as $message)
					$this->flashSession->error($message);
			}else{
				if ($campaign->save()){
					$this->flashSession->success('Campaign has been updated successfully ! ');
				}else{
					foreach ($campaign->getMessages() as $message)
						$this->flashSession->error($message);
				}
			}
		}else{
			$campaign->start_date = date($this::DATE_FORMAT , $campaign->start_date ?? time());
			$campaign->end_date = date($this::DATE_FORMAT , $campaign->end_date ?? time());

			$form->bind($campaign->toArray() , $campaign);
		}

		$this->view->form = $form;
		$this->view->row = $campaign;
		$this->view->pick('plugins/newsletter/campaigns/form');
	}

	/**	
	 * Get List of subscribers (ajax method)
	 */
	public function listajaxAction()
	{
		$builder = $this->modelsManager->createBuilder()
						->columns('id, name, description, start_date , end_date , status ')
						->from(Campaigns::class);

		$dataTables = new DataTable();
		$dataTables->setIngoreUpperCase(true);
		$dataTables->fromBuilder($builder)
		->addCustomColumn('c_start' , function ($key , $data) {	
			$date = date($this::DATE_FORMAT , $data['start_date']);
			$date .= " / " . \SakuraPanel\Functions\_getTimeAgo($date);
			return $date;
		})
		->addCustomColumn('c_end' , function ($key , $data) {	
			$date = date($this::DATE_FORMAT , $data['end_date']);
			$date .= " / " . \SakuraPanel\Functions\_getTimeAgo($date);
			return $date;
		})
		->addCustomColumn('c_status' , function ($key , $data) {
			$s = Campaigns::getStatusById($data['status']);
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
					"<span title='Active' data-action='active' data-id='$id' class='ml-1 btn btn-success btn-circle btn-sm table-action-btn' ><i class='fas fa-check-circle'></i></span>";
				
			if ($data['status'] == $this::ACTIVE)
				$actions .= 
					"<span title='Suspend' data-action='active' data-id='$id' class='ml-1 btn btn-primary btn-circle btn-sm table-action-btn' ><i class='fas fa-minus-circle'></i></span>";
				
			$actions .= 
				"<a href='{$this->page->get('base_route')}/campaigns/edit/$id' class='ml-1 btn btn-warning btn-circle btn-sm ' ><i class='fas fa-edit'></i></a>";


			return $actions;
		})
		->sendResponse();
	}

	/** 
     * Active/InActive Campaign
     */
	public function activeAction()
	{
		if ($this->request->isAjax()) {
			$id = (int) $this->request->get('id');

			$row = Campaigns::findFirstById($id);
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
     * Delete Campaign
     */
	public function deleteAction()
	{
		if ($this->request->isAjax()) {
			$id = (int) $this->request->get('id');

			$row = Campaigns::findFirstById($id);
			if (!$row) {
				return $this->ajax->error('Unknown row id '.$id)->sendResponse();
			}else{
                $row->disableValidation();

                if ($row->delete()) {
					return $this->ajax->success("Row Deleted successfully !")->sendResponse();
				}else{
					return $this->ajax->error("Row Deleted was failed ! \n".implode("&", $row->getMessages()))->sendResponse();
				}
			}

        }
		return $this->ajax->error('Unknown error')->sendResponse();
	}
}