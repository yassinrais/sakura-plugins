<?php 

namespace SakuraPanel\Plugins\Country\Controllers;


use SakuraPanel\Controllers\Member\{
	MemberControllerBase
};

use SakuraPanel\Plugins\Country\Models\{
	Country
};

use SakuraPanel\Library\DataTables\DataTable;

use SakuraPanel\Plugins\Country\Forms\CountryForm;

/**
 * CountryController
 */
class CountryController extends MemberControllerBase
{

	private $dataTables_columns = 'id, name, title, [iso2], iso3, num, status, currency , capital';

	public function initialize(){
		parent::initialize();
		
		$this->page->set('base_route' , 'member/country');
		$this->page->set('title', 'Countries');
        $this->page->set('description','Here you can manager all country information.');
		
        $this->view->dataTable = true;
	}

	public function indexAction()
	{
		return $this->view->pick('plugins/country/index');
	}	
	public function createAction()
	{
		$row = new Country();
		$form = new CountryForm($row);


		if ($this->request->isPost()) {
			$row->user_id = (int) $this->di->get('user')->id;


            if (false === $form->isValid($_POST)) {
			    $messages = $form->getMessages();

			    foreach ($messages as $message)
			        $this->flashSession->warning((string) $message);
			}else{
				$form->bind($this->request->getPost(), $row);
				$row->status  ="1";

				if ($row->save()) {
					$this->flashSession->success('New Row created successfully ! ');
 					
 					$form->clear();
				}else{
				    foreach ($row->getMessages() as $message)
				        $this->flashSession->warning((string) $message);
				}

			}
		}

		$this->view->form = $form;
		// $this->view->form->bind($row->toArray() , $row);

		return $this->view->pick('plugins/country/form');
	}
	public function editAction($id = null)
	{
		if (!is_null($id)) {
			$row = Country::findFirstById($id);

			if ($row) {
				if ($this->request->isPost()) {
					$form = new CountryForm($row);


		            if (false === $form->isValid($_POST)) {
					    $messages = $form->getMessages();

					    foreach ($messages as $message)
					        $this->flashSession->warning((string) $message);
					}else{
						$form->bind($_POST, $row);

						if ($row->save()) {
							$this->flashSession->success('Change saved successfully ! ');
						}else{
						    foreach ($row->getMessages() as $message)
						        $this->flashSession->warning((string) $message);
						}

					}
				}


				$this->view->row = $row;

				$this->view->form = new CountryForm($row);
				$this->view->form->bind($row->toArray() , $row);

				return $this->view->pick('plugins/country/form');
			}


		}
		return $this->response->redirect($this->page->get('base_route'));
	}	


	public function ajaxAction()
	{
		if ($this->request->isAjax()) {
          $builder = $this->modelsManager->createBuilder()
                          ->columns($this->dataTables_columns)
                          ->from(Country::class);

          $dataTables = new DataTable();

          $dataTables->setOptions([
          	'limit'=> abs((int) $this->request->get('length'))
          ]);
          $dataTables->setIngoreUpperCase(true);
          
          $dataTables->fromBuilder($builder)
          ->addCustomColumn('c_status' , function ($key , $data) {
          	$s = Country::getStatusById($data['status']);
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
          		"<span title='Delete Row' data-action ='delete' data-id='$id' class='ml-1 btn btn-danger btn-circle btn-sm table-action-btn'><i class='fas fa-trash'></i></span>";
          	if ($data['status'] == $this::DELETED)
				$actions .= 
          		"<span title='Restore Row' data-action='restore' data-id='$id' class='ml-1 btn btn-info btn-circle btn-sm table-action-btn' ><i class='fas fa-trash-restore'></i></span>";

      		$actions .= 
      			"<a href='{$this->page->get('base_route')}/edit/$id' class='ml-1 btn btn-warning btn-circle btn-sm ' ><i class='fas fa-edit'></i></a>";


          	return $actions;
          });

          
          return $dataTables->sendResponse();
        }
		return  $this->ajax->error('Method Ajax is only allowed')->sendResponse();
	}

	public function deleteAction()
	{
		if ($this->request->isAjax()) {
			$id = (int) $this->request->get('id');

			$row = Country::findFirstById($id);

			if (!$row) 
				return  $this->ajax->error('Unknown row id '.$id)->sendResponse();

			$row->status = $this::DELETED;
			if ($row->delete())
				return  $this->ajax->error("Row $id deleted successfully !")->sendResponse();
			
			return  $this->ajax->error("Row $id deleted failed ! \n".implode("&", $row->getMessages()))->sendResponse();

        }
		return  $this->ajax->error('Method Ajax is only allowed')->sendResponse();
	}

	public function restoreAction()
	{
		if ($this->request->isAjax()) {
			$id = (int) $this->request->get('id');

			$row = Country::findFirstById($id);

			if (!$row)
				return  $this->ajax->error('Unknown row id '.$id)->sendResponse();
			
			$row->status = $this::INACTIVE;
			if ($row->save())
				return  $this->ajax->error("Row $id restore successfully !")->sendResponse();
			
			return  $this->ajax->error("Row $id restore failed ! \n".implode("&", $row->getMessages()))->sendResponse();
        }
		return  $this->ajax->error('Method Ajax is only allowed')->sendResponse();
	}


}