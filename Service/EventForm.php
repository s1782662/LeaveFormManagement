<?php
namespace LeaveFormManagement\Service;

use LeaveFormManagement\Form\Input\Form;

class EventForm extends Form{

	public function init(){
		
		$this->setField('eventname')->setAttribs([
			'size'=>9,
			'maxlength'=>9,
		]);

		$this->setField('eventdescription')->setAttribs([
			'size'=>9,
			'maxlength'=>9,
		]);

		$this->setField('eventstart')->setAttribs([
			'size'=>9,
			'maxlength'=>9,
		]);

		$this->setField('eventend')->setAttribs([
			'size'=>9,
			'maxlength'=>9,
		]);

		$this->setField('eventstatus')->setAttribs([
			'size'=>9,
			'maxlength'=>9,
		]);

		$this->setField('eventgender')->setAttribs([
			'size'=>9,
			'maxlength'=>9,
		]);

		$filter = $this->getFilter();
	
		$filter->setRule(
			'eventname',
			'event name shouldn\'t be Nill',
			function($value){
				return $value;
				}
			);
	
		$filter->setRule(
			'eventdescription',
			'describe shouldn\'t be nill',
			function($value){
				return $value;
			}
		);

		$filter->setRule(
			'eventstart',
			'date shouldn\'t be nill',
			function($value){
				return $value;
			}
		);

		$filter->setRule(
			'endend',
			'date shouldn\'t be nill',
			function($value){
				return $value;
			}
		);

		$filter->setRule(
			'eventgender',
			'gender shouldn\'t be nill',
			function($value){
				return $value;
			}
		);

		$filter->setRule(
			'eventstatus',
			'status shouldn\'t be nill',
			function($value){
				return $value;
			}
		);
		return $this;
	}

}
