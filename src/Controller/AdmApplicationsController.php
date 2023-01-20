<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AdmApplications Controller
 *
 * @property \App\Model\Table\AdmApplicationsTable $AdmApplications
 * @method \App\Model\Entity\AdmApplication[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmApplicationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $admApplications = $this->paginate($this->AdmApplications);

        $this->set(compact('admApplications'));
    }

    /**
     * View method
     *
     * @param string|null $id Adm Application id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admApplication = $this->AdmApplications->get($id, [
            'contain' => ['AdmHierarchies'],
        ]);

        $this->set(compact('admApplication'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admApplication = $this->AdmApplications->newEmptyEntity();
        if ($this->request->is('post')) {
            $admApplication = $this->AdmApplications->patchEntity($admApplication, $this->request->getData());
            if ($this->AdmApplications->save($admApplication)) {
                $this->Flash->success(__('The adm application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm application could not be saved. Please, try again.'));
        }
        $admHierarchies = $this->AdmApplications->AdmHierarchies->find('list', ['limit' => 200])->all();
        $this->set(compact('admApplication', 'admHierarchies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Application id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admApplication = $this->AdmApplications->get($id, [
            'contain' => ['AdmHierarchies'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admApplication = $this->AdmApplications->patchEntity($admApplication, $this->request->getData());
            if ($this->AdmApplications->save($admApplication)) {
                $this->Flash->success(__('The adm application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm application could not be saved. Please, try again.'));
        }
        $admHierarchies = $this->AdmApplications->AdmHierarchies->find('list', ['limit' => 200])->all();
        $this->set(compact('admApplication', 'admHierarchies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Application id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admApplication = $this->AdmApplications->get($id);
        if ($this->AdmApplications->delete($admApplication)) {
            $this->Flash->success(__('The adm application has been deleted.'));
        } else {
            $this->Flash->error(__('The adm application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
