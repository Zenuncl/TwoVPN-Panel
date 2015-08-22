<?php
/**
 * Date: 6/2 0002
 * Time: 12:00
 * @author GROOT (pzyme@outlook.com)
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Plan extends Model {
    protected $table = 'radgroupcheck';
    protected $guarded = ['id'];

    public static function instance() {
        return new \App\Models\Rad\GroupCheck;
    }
}