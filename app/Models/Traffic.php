<?php
/**
 * Date: 6/1 0001
 * Time: 16:22
 * @author GROOT (pzyme@outlook.com)
 */
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Rad\Group;
use Illuminate\Pagination\Paginator;

/**
 * 流量
 * Class Traffic
 * @package App\Models
 */
class Traffic extends Model {
    protected $table = 'radacct';
    protected $guarded = ['id'];

    private $username;
    private $group;

    public function __construct($username = null) {
        $this->username = $username;
        $this->group = $username != null ? Group::belong($username) : '';
        //Carbon::setTestNow(Carbon::create(2015, 5, 31, 12));
    }

    /**
     * vpn用户的总流量
     * @param $username
     * @return array
     */
    public function total() {
        $query = DB::table('radgroupcheck')->where("groupname",$this->group);
        $result = $query->get();

        $_tmp = [];
        foreach($result as $res) {
            switch($res->attribute) {
                case env('Max_Daily_Traffic'):
                    $_tmp['daily'] = $res->value;
                    break;
                case env('Max_Monthly_Traffic'):
                    $_tmp['monthly'] = $res->value;
                    break;
            }
        }
        return $_tmp;
    }

    /**
     * 当日使用流量
     * @return int
     */
    public function daily() {
        $today = Carbon::now()->format("Y-m-d");
        $start = $today.' 00:00:00';
        $end = $today.' 23:59:59';

        $sql = "SELECT FLOOR(SUM(acctinputoctets+acctoutputoctets)/1024/1024) as total FROM radacct WHERE username=? AND acctstarttime > ? AND acctstoptime < ?";
        $result = DB::select(DB::raw($sql),[$this->username,$start,$end]);

        return isset($result[0]->total) ? $result[0]->total : 0;
    }

    /**
     * 本月使用流量
     * @return int
     */
    public function monthly() {
        $this_month = Carbon::now()->format("Y-m");
        $start = $this_month.'-01 00:00:00';
        $end = Carbon::parse($this_month.'-15 00:00:00')->endOfMonth();

        $sql = "SELECT FLOOR(SUM(acctinputoctets+acctoutputoctets)/1024/1024) as total FROM radacct WHERE username=? AND acctstarttime > ? AND acctstoptime < ?";

        $result = DB::select(DB::raw($sql),[$this->username,$start,$end]);

        return isset($result[0]->total) ? $result[0]->total : 0;
    }


    public function remove() {
        return DB::table('radacct')->where("username",$this->username)->delete() >= 0;
    }


    public static function top($from,$to,$take = 10,$order = 'download',$order_type = 'desc') {
        $sql = "SELECT DISTINCT(radacct.username),radacct.acctstarttime,MAX(radacct.acctstoptime) AS acctstoptime,
                radacct.radacctid,
                SUM(radacct.acctsessiontime) AS `time`,
                SUM(radacct.acctinputoctets) AS upload,
                SUM(radacct.acctoutputoctets) AS download FROM radacct WHERE
                radacct.acctstarttime > ? AND acctstarttime < ?
                GROUP BY radacct.username ORDER BY $order DESC LIMIT ?";
        $result = DB::select(DB::raw($sql),[$from,$to,$take]);

        return $result;
    }


    /**
     * @param int $take
     * @param null $username
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function page($take = 20, $username = null) {

        $query = DB::table('radacct');
        if($username != null) {
            $query->where('username',$username);
        }

        $query->orderBy("radacctid","desc");
        return $query->paginate($take)->setPageName('rpage');
    }

}