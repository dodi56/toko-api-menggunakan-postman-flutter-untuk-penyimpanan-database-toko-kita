<?php 

namespace App\Controllers; 

use App\Models\MProduk; 

class ProdukController extends RestfulController 
{
    //Membuat fungsi create produk :
     public function create() 
    { 
        $data = [ 'kode_produk' => $this->request->getVar('kode_produk'), 		'nama_produk' => $this->request->getVar('nama_produk'), 
            'harga' => $this->request->getVar('harga') 
            ];
        $model = new MProduk(); $model->insert($data); 
             $produk = $model->find($model->getInsertID()); 
            
            return $this->responseHasil(200, true, $produk); 
    }
    
   
    //Membuat fungsi list produk : 
       public function list() 
    { 
            $model = new MProduk(); 
            $produk = $model->findAll(); 
            return $this->responseHasil(200, true, $produk); 
    }
    
    //Membuat fungsi tampil produk  : 
        public function detail($id) 
    { 
        $model = new MProduk(); 
        $produk = $model->find($id); 
        
        return $this->responseHasil(200, true, $produk); 
    }
   
    //Membuat fungsi update produk : 
   
    public function ubah($id) 
    { 
        $data = [ 
            'kode_produk' => $this->request->getVar('kode_produk'), 				
            'nama_produk' => $this->request->getVar('nama_produk'), 
            'harga' => $this->request->getVar('harga') 
            ];
        $model = new MProduk(); 
            $model->update($id, $data); 
            $produk = $model->find($id);
            
            return $this->responseHasil(200, true, $produk); 
    }
    
        
    //Membuat fungsi delete produk :
        public function hapus($id) 
    { 
        $model = new MProduk(); 
        $produk = $model->delete($id);
    
        return $this->responseHasil(200, true, $produk); 
    }  
    
}