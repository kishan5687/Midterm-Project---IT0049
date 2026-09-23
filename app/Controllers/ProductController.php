<?php
namespace App\Controllers;
use App\Models\ProductModel;

class ProductController extends BaseController {
    public function index() {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('products/index', $data);
    }

    public function create() {
        return view('products/create');
    }

    public function store() {
        $model = new ProductModel();
        
        // Simple Form Validation [1]
        $rules = [
            'name'  => 'required|min_length[3]',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Standard File Upload [1]
        $file = $this->request->getFile('image');
        $imgName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/products', $imgName);

        $model->save([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'image' => $imgName,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/products')->with('success', 'Product added successfully.');
    }

    public function edit($id) {
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        return view('products/edit', $data);
    }

    public function update($id) {
        $model = new ProductModel();
        $product = $model->find($id);

        $rules = [
            'name'  => 'required|min_length[3]',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imgName = $product['image'];
        $file = $this->request->getFile('image');
        
        // Check if a new file is uploaded
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/products', $imgName);
        }

        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'image' => $imgName
        ]);

        return redirect()->to('/products')->with('success', 'Product updated successfully.');
    }

    public function delete($id) {
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/products')->with('success', 'Product deleted.');
    }
}
