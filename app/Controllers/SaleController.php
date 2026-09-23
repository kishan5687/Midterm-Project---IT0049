<?php
namespace App\Controllers;
use App\Models\SaleModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;

class SaleController extends BaseController {
    
    public function record() {
        $prodModel = new ProductModel();
        $custModel = new CustomerModel();

        $data['products'] = $prodModel->findAll();
        $data['customers'] = $custModel->findAll();

        return view('sales/record', $data);
    }

    public function store() {
        $saleModel = new SaleModel();
        $prodModel = new ProductModel();

        $productId = $this->request->getPost('product_id');
        $customerId = $this->request->getPost('customer_id'); // Optional [1]
        $quantity = (int)$this->request->getPost('quantity');

        $product = $prodModel->find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if ($quantity > $product['stock_quantity']) {
            return redirect()->back()->withInput()->with('error', 'Sale rejected: Requested quantity exceeds available stock.');
        }

        $totalPrice = $product['price'] * $quantity;

        $saleModel->save([
            'product_id' => $productId,
            'customer_id' => !empty($customerId) ? $customerId : null,
            'sold_by' => session()->get('id'), // Current logged-in staff member [1]
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $newStock = $product['stock_quantity'] - $quantity;
        $prodModel->update($productId, ['stock_quantity' => $newStock]);

        return redirect()->to('/sales/history')->with('success', 'Sale processed successfully.');
    }

    public function history() {
        $saleModel = new SaleModel();
        $data['sales'] = $saleModel->getSalesHistory();
        return view('sales/history', $data);
    }
}
