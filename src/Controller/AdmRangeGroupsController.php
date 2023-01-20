<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AdmRangeGroups Controller
 *
 * @property \App\Model\Table\AdmRangeGroupsTable $AdmRangeGroups
 * @method \App\Model\Entity\AdmRangeGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmRangeGroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $admRangeGroups = $this->paginate($this->AdmRangeGroups);

        $this->set(compact('admRangeGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Adm Range Group id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admRangeGroup = $this->AdmRangeGroups->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('admRangeGroup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admRangeGroup = $this->AdmRangeGroups->newEmptyEntity();
        if ($this->request->is('post')) {
            $admRangeGroup = $this->AdmRangeGroups->patchEntity($admRangeGroup, $this->request->getData());
            if ($this->AdmRangeGroups->save($admRangeGroup)) {
                $this->Flash->success(__('The adm range group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm range group could not be saved. Please, try again.'));
        }
        $this->set(compact('admRangeGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Range Group id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admRangeGroup = $this->AdmRangeGroups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admRangeGroup = $this->AdmRangeGroups->patchEntity($admRangeGroup, $this->request->getData());
            if ($this->AdmRangeGroups->save($admRangeGroup)) {
                $this->Flash->success(__('The adm range group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm range group could not be saved. Please, try again.'));
        }
        $this->set(compact('admRangeGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Range Group id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admRangeGroup = $this->AdmRangeGroups->get($id);
        if ($this->AdmRangeGroups->delete($admRangeGroup)) {
            $this->Flash->success(__('The adm range group has been deleted.'));
        } else {
            $this->Flash->error(__('The adm range group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
