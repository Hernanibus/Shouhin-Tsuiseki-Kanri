<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;

/**
 * AdmUsers Controller
 *
 * @property \App\Model\Table\AdmUsersTable $AdmUsers
 * @method \App\Model\Entity\AdmUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmUsersController extends AppController
{
    public function initialize():void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated( [ 'index', 'login', 'logout', ] );//'edit', 'view' ] );
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AdmHierarchies', 'AdmDomains'],
        ];
        $admUsers = $this->paginate($this->AdmUsers);
        $this->set(compact('admUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Adm User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admUser = $this->AdmUsers->findFullUserInfo([
            'user_id'   => $id,
            'contain'   => ['AdmHierarchies', 'AdmDomains'],
        ]);

        $domains = $this->AdmUsers->AdmDomains->domainNames();
        $this->set(compact('admUser', 'domains'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admUser = $this->AdmUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $admUser = $this->AdmUsers->patchEntity($admUser, $this->request->getData());
            if ($this->AdmUsers->save($admUser)) {
                $this->Flash->success(__('The adm user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm user could not be saved. Please, try again.'));
        }
        $admHierarchies = $this->AdmUsers->AdmHierarchies->find('list', ['limit' => 200])->all();
        $admDomains = $this->AdmUsers->AdmDomains->find('list', ['limit' => 200])->all();
        $this->set(compact('admUser', 'admHierarchies', 'admDomains'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admUser = $this->AdmUsers->get($id, [
            'contain' => [],
        ]);
        if ( $this->request->is( ['patch', 'post', 'put'] ) )
        {
            $admUser = $this->AdmUsers->patchEntity( $admUser, $this->request->getData() );
            if ( $this->AdmUsers->save( $admUser ) )
                { $this->Flash->success( __( 'The User information has been saved' ) ); }
            else
                { $this->Flash->error( __('The User could not be saved. Please try it again.') ); }
        }
        $admHierarchies = $this->AdmUsers->AdmHierarchies->find('list', ['limit' => 200])->all();
        $admDomains = $this->AdmUsers->AdmDomains->find('list', ['limit' => 200])->all();
        $this->set(compact('admUser', 'admHierarchies', 'admDomains'));

        return $this->redirect( [ 'action' => 'index' ]);//, $admUser->id ] );
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admUser = $this->AdmUsers->get($id);
        if ($this->AdmUsers->delete($admUser)) {
            $this->Flash->success(__('The adm user has been deleted.'));
        } else {
            $this->Flash->error(__('The adm user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->request->allowMethod( [ 'get', 'post' ] );
        $firstPageController    = Configure::read( 'DomainUserControl.postLoginController' );
        $firstPageAction        = Configure::read( 'DomainUserControl.postLoginAction' );
        $result = $this->Authentication->getResult();
        if( $result->isValid() )
        {
            $redirect = $this->request->getQuery( 'redirect',
                                                [ 'controller'  => $firstPageController,
                                                  'action'      => $firstPageAction ] );
            return $this->redirect( $redirect );
        }
        if( $this->request->is( 'post' ) && !$result->isValid() )
            { $this->Flash->error( __( 'wrong pass or user' ) ); }
    }
    public function logout()
    {
        return $this->redirect( $this->Authentication->logout() );
    }
}
