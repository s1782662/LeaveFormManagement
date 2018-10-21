<?php
namespace LeaveFormManagement\View;
 
class CompositeView implements ViewInterface
{
    protected $views = array();
     
    public function attachView(ViewInterface $view) {
        $this->views[] = $view;
        return $this;
    }
      
    public function render() {
        $output = "";
        foreach ($this->views as $view) {
            $output .= $view->render();
        }
        return $output;
    }
}
