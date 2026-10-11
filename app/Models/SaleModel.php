<?php
namespace App\Models;
use CodeIgniter\Model;

class SaleModel extends Model {
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'customer_id', 'sold_by', 'quantity', 'total_price', 'created_at'];

    public function getSalesHistory() {
        return $this->select('sales.*, products.name as product_name, customers.full_name as customer_name, users.full_name as staff_name')
                    ->join('products', 'products.id = sales.product_id')
                    ->join('customers', 'customers.id = sales.customer_id', 'left')
                    ->join('users', 'users.id = sales.sold_by')
                    ->orderBy('sales.created_at', 'DESC')
                    ->findAll();
    }
}
