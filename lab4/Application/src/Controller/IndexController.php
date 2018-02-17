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
use Zend\Validator\Digits;
use Zend\Validator\EmailAddress;
use Zend\I18n\Validator\Alpha;

class IndexController extends AbstractActionController {
    
    public function indexAction() {
        $request = $this->getRequest();
        $status = [];

        $username = $request->getPost('username');
        $email = $request->getPost('email');
        $age = $request->getPost('age');

        $isAlpha = new Alpha();
        $isEmail = new EmailAddress();
        $isDigits = new Digits();
       
        if($request->isPost()) {
            
            if ( $isAlpha->isValid($username) && $isEmail->isValid($email) && $isDigits->isValid($age) ) {
                $status = ['success' => 'Success! Valid input! '];
    
            } else {
                $status = ['error' => 'Please reenter your input. '];
            }    
        }

        

        // first time land make sure an error doesn't appear
        if( $request->isGet()) {
            $status = ['message' => ''];
        }

        //echo $status['message'];
        return new ViewModel($status);
    }
}
