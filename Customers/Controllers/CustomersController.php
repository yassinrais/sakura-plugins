<?php 
namespace SakuraPanel\Plugins\Customers\Controllers;


// auth midleware : MemberControllerBase
use SakuraPanel\Controllers\Member\{
	MemberControllerBase
};

// use SakuraPanel\Plugins\Customers\Models\{Customers , modelName2};

// use SakuraPanel\Plugins\Customers\Forms\{FormName1 , FormName2};

// use SakuraPanel\Library\Datatables\DataTable;

/**
 * CustomersController
 */
class CustomersController extends MemberControllerBase
{	
	// init page info (if its a view controller :) )
	public function initialize(){
		parent::initialize();
		
		$this->page->set('base_route' , 'member/Customers');
		$this->page->set('title', 'Customers');
        $this->page->set('description','Customers Information');
		
        $this->view->dataTable = true;
	}

	// index page
	public function indexAction()
	{
		$this->view->pick('plugins/Customers/index');
	}


}