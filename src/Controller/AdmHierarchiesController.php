<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AdmHierarchies Controller
 *
 * @property \App\Model\Table\AdmHierarchiesTable $AdmHierarchies
 * @method \App\Model\Entity\AdmHierarchy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdmHierarchiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentAdmHierarchies'],
        ];
        $admHierarchies = $this->paginate($this->AdmHierarchies);

        $this->set(compact('admHierarchies'));
    }

    /**
     * View method
     *
     * @param string|null $id Adm Hierarchy id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admHierarchy = $this->AdmHierarchies->get($id, [
            'contain' => ['ParentAdmHierarchies', 'AdmApplications', 'AdmRanges', 'ChildAdmHierarchies'],
        ]);

        $this->set(compact('admHierarchy'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admHierarchy = $this->AdmHierarchies->newEmptyEntity();
        if ($this->request->is('post')) {
            $admHierarchy = $this->AdmHierarchies->patchEntity($admHierarchy, $this->request->getData());
            if ($this->AdmHierarchies->save($admHierarchy)) {
                $this->Flash->success(__('The adm hierarchy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm hierarchy could not be saved. Please, try again.'));
        }
        $parentAdmHierarchies = $this->AdmHierarchies->ParentAdmHierarchies->find('list', ['limit' => 200])->all();
        $admApplications = $this->AdmHierarchies->AdmApplications->find('list', ['limit' => 200])->all();
        $admRanges = $this->AdmHierarchies->AdmRanges->find('list', ['limit' => 200])->all();
        $this->set(compact('admHierarchy', 'parentAdmHierarchies', 'admApplications', 'admRanges'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm Hierarchy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admHierarchy = $this->AdmHierarchies->get($id, [
            'contain' => ['AdmApplications', 'AdmRanges'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admHierarchy = $this->AdmHierarchies->patchEntity($admHierarchy, $this->request->getData());
debug( $admHierarchy );
/**
            if ($this->AdmHierarchies->save($admHierarchy)) {
                $this->Flash->success(__('The adm hierarchy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adm hierarchy could not be saved. Please, try again.'));
**/
        }
        $parentAdmHierarchies = $this->AdmHierarchies->ParentAdmHierarchies->find('list', ['limit' => 200])->all();
        $admApplications = $this->AdmHierarchies->AdmApplications->find('list', ['limit' => 200])->all();
        $admRanges = $this->AdmHierarchies->AdmRanges->find('list', ['limit' => 200])->all();
        $this->set(compact('admHierarchy', 'parentAdmHierarchies', 'admApplications', 'admRanges'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adm Hierarchy id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admHierarchy = $this->AdmHierarchies->get($id);
        if ($this->AdmHierarchies->delete($admHierarchy)) {
            $this->Flash->success(__('The adm hierarchy has been deleted.'));
        } else {
            $this->Flash->error(__('The adm hierarchy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
