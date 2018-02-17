<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\I18n\Validator\Alpha;

class ServicesController extends AbstractActionController {
    
    public function indexAction() {

        $request = $this->getRequest();
        $status = [];

        // handle the challenge question
        if($request->getQuery('name') != null) {
            $name = $request->getQuery('name');
        } else {
            $name = $this->params()->fromRoute('name');    
        }

        $isAlpha = new Alpha();

        if( $request->isGet() && $isAlpha->isValid($name) ) {                
            $status = ['name' => ucwords($name) ];    

        } else {
            $status = ['error' => 'Name is not valid, please try again']; 
        }

        // first time land make sure an error doesn't appear
        if( $request->isGet() && empty($name) ) {
            $status = ['message' => ''];
        }

        return new ViewModel($status);
    }
}
