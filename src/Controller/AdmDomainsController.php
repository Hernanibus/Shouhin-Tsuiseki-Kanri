<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AdmDomains Controller
 *
 * @property \App\Model\Table\AdmDomainsTable $AdmDomains
 * @method \App\Model\Entity\AdmDomain[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmDomainsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AdmHierarchies'],
        ];
        $admDomains = $this->paginate($this->AdmDomains);

        $this->set(compact('admDomains'));
    }

    /**
     * View method
     *
     * @param string|null $id Adm Domain id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admDomain = $this->AdmDomains->get($id, [
            'contain' => ['AdmHierarchies'],
        ]);

        $this->set(compact('admDomain'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admDomain = $this->AdmDomains->newEmptyEntity();
        if ($this->request->is('post')) {
            $admDomain = $this->AdmDomains->patchEntity($admDomain, $this->request->getData());
            if ($this->AdmDomains->save($admDomain)) {
                $this->Flash->success(__('The adm domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm domain could not be saved. Please, try again.'));
        }
        $admHierarchies = $this->AdmDomains->AdmHierarchies->find('list', ['limit' => 200])->all();
        $this->set(compact('admDomain', 'admHierarchies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Domain id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admDomain = $this->AdmDomains->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admDomain = $this->AdmDomains->patchEntity($admDomain, $this->request->getData());
            if ($this->AdmDomains->save($admDomain)) {
                $this->Flash->success(__('The adm domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm domain could not be saved. Please, try again.'));
        }
        $admHierarchies = $this->AdmDomains->AdmHierarchies->find('list', ['limit' => 200])->all();
        $this->set(compact('admDomain', 'admHierarchies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Domain id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admDomain = $this->AdmDomains->get($id);
        if ($this->AdmDomains->delete($admDomain)) {
            $this->Flash->success(__('The adm domain has been deleted.'));
        } else {
            $this->Flash->error(__('The adm domain could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
