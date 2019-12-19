<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ProfileController extends ControllerBase
{
    public function newAction()
    {
    }
    public function indexAction()
    {
        if ($this->request->isPost()) {
            $user = Users::findFirst(array( 
               'Email = :Email: and Password = :Password:', 'bind' => array( 
                  'Email' => $this->request->getPost("login"), 
                  'Password' => sha1($this->request->getPost("password")) 
               ) 
            ));  
            if ($user === false) { 
               $this->flash->error("Incorrect credentials"); 
               return $this->response->redirect("login");
            }
            if(1)
              $this->response->redirect("profile/new");
            $this->session->set('auth', $user->ID); 
            $this->persistent->parameters = null;
         }
    }
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "profile",
                'action' => 'index'
            ]);

            return;
        }

        $profil = new Profil();
        $profil->nom = $this->request->getPost("nom");
        $profil->prenom = $this->request->getPost("prenom");
        $profil->adress = $this->request->getPost("adress");
        
         $profil->setImageLien(base64_encode(file_get_contents($this->request->getUploadedFiles()[0]->getTempName())));  
        $profil->setCvLien(base64_encode(file_get_contents($this->request->getUploadedFiles()[1]->getTempName())));   
        $profil->description = $this->request->getPost("description");
        $profil->setIdUser($this->session->get('auth'));
    
        if (!$profil->save()) {
            foreach ($profil->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "profile",
                'action' => 'new'
            ]);

            return;
        }
        $this->flash->success("profil was created successfully");

        $this->response->redirect("profile");
    }
}

