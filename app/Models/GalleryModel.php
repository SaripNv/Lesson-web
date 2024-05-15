<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id_gallery';
    protected $allowedFields = ['nama_foto', 'foto', 'deskripsi', 'tanggal_diambil'];
}