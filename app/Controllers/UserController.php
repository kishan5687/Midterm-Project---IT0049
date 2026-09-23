<?php
namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController {

    public function index() {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function create() {
        return view('users/create');
    }

    public function store() {
        $model = new UserModel();

        $rules = [
            'username'  => 'required|min_length[4]|is_unique[users.username]|max_length[50]',
            'full_name' => 'required|min_length[3]|max_length[100]',
            'password'  => 'required|min_length[6]',
            'avatar'    => 'permit_empty|max_size[avatar,2048]|is_image[avatar]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Avatar configuration rules
        $avatarName = null;
        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $avatarName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/avatars', $avatarName);
        }

        $model->save([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            // standard security requirement
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'avatar'     => $avatarName,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users')->with('success', 'Staff profile configured.');
    }

    public function edit($id) {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id) {
        $model = new UserModel();
        $user = $model->find($id);

        $rules = [
            'full_name' => 'required|min_length[3]|max_length[100]',
            'avatar'    => 'permit_empty|max_size[avatar,2048]|is_image[avatar]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $avatarName = $user['avatar'];
        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $avatarName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/avatars', $avatarName);
        }

        $updateData = [
            'full_name' => $this->request->getPost('full_name'),
            'avatar'    => $avatarName
        ];

        // Only encrypt a password if the text input field isn't empty
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $updateData['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $model->update($id, $updateData);
        return redirect()->to('/users')->with('success', 'Staff account updated.');
    }

    public function delete($id) {
        // Prevent deleting yourself while logged in
        if (session()->get('id') == $id) {
            return redirect()->to('/users')->with('error', 'Action rejected: You cannot delete your own session.');
        }

        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'Staff removed.');
    }
}
