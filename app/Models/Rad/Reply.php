<?php
/**
 * Date: 6/1 0001
 * Time: 16:23
 * @author GROOT (pzyme@outlook.com)
 */
namespace App\Models\Rad;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reply extends Model {
    protected $table = 'radreply';
    protected $guarded = ['id'];
}