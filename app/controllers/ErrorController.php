<?php

class ErrorController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $user=new Users();
        $profil=new Profil();
        $password = $this->request->getPost('Password');
        $success=$user->save(
                $this->request->getPost(),
                [
                    "First_Name",
                    "Last_Name",
                    "Email",
                    "Password",
                ]
            );
        
        $user->Password= sha1($password);
        $user->save();
        $messages=$user->getMessages();
        if($success)
            $this->response->redirect("login");
        else{
            $this->view->setVar("messages",$messages);
            
        }
    }

}

