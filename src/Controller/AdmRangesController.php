<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AdmRanges Controller
 *
 * @property \App\Model\Table\AdmRangesTable $AdmRanges
 * @method \App\Model\Entity\AdmRange[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmRangesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $admRanges = $this->paginate($this->AdmRanges);

        $this->set(compact('admRanges'));
    }

    /**
     * View method
     *
     * @param string|null $id Adm Range id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admRange = $this->AdmRanges->get($id, [
            'contain' => ['AdmHierarchies'],
        ]);

        $this->set(compact('admRange'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admRange = $this->AdmRanges->newEmptyEntity();
        if ($this->request->is('post')) {
            $admRange = $this->AdmRanges->patchEntity($admRange, $this->request->getData());
            if ($this->AdmRanges->save($admRange)) {
                $this->Flash->success(__('The adm range has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm range could not be saved. Please, try again.'));
        }
        $admHierarchies = $this->AdmRanges->AdmHierarchies->find('list', ['limit' => 200])->all();
        $this->set(compact('admRange', 'admHierarchies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Range id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admRange = $this->AdmRanges->get($id, [
            'contain' => ['AdmHierarchies'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admRange = $this->AdmRanges->patchEntity($admRange, $this->request->getData());
            if ($this->AdmRanges->save($admRange)) {
                $this->Flash->success(__('The adm range has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm range could not be saved. Please, try again.'));
        }
        $admHierarchies = $this->AdmRanges->AdmHierarchies->find('list', ['limit' => 200])->all();
        $this->set(compact('admRange', 'admHierarchies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Range id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admRange = $this->AdmRanges->get($id);
        if ($this->AdmRanges->delete($admRange)) {
            $this->Flash->success(__('The adm range has been deleted.'));
        } else {
            $this->Flash->error(__('The adm range could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
