<?php
/**
 * Date: 15/6/1
 * Time: 21:21
 * User: Pzyme
 * @author GROOT (pzyme@outlook.com)
 */
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Graph extends Model {
    protected $table = 'radacct';
    protected $guarded = ['id'];

    private $username;

    private $graph_sql;

    public function __construct($username) {
        $this->username = $username;
    }

    /**
     * 每月流量使用
     * @return array
     */
    public function monthly() {
        $this_month = Carbon::now()->format("Y-m");
        $start = $this_month.'-01 00:00:00';
        $end = Carbon::parse($this_month.'-15 00:00:00')->endOfMonth();

        $data = [];
        $date = Carbon::now()->format("Y-m");
        for($i = 1;$i<32;$i++) {
            $data[$date.'-'.sprintf("%02d", $i)] = [0,0];
        }

        $query = DB::table('radacct')->where('username',$this->username)->where("acctstarttime",">",$start);
        $query->where('acctstoptime','<',$end);
        $result = $query->get();


        foreach($result as $row) {
            list($date,$time) = explode(" ",$row->acctstoptime);
            $data[$date][0] += number_format($row->acctinputoctets/1024/1024,2);
            $data[$date][1] += number_format($row->acctoutputoctets/1024/1024,2);
        }

        return $data;

    }


    public function chart($type, $period) {
        //$type login download upload
        //$period daily monthly yearly
        $func = camel_case(strtolower($type).'_'.strtolower($period));
        $this->$func();
        $result = DB::select(DB::raw($this->graph_sql),[$this->username]);
        return $result;
    }

    private function loginDaily() {
        $this->graph_sql = "SELECT username,COUNT(acctstarttime) AS login,DAY(acctstarttime) AS `daily` FROM radacct WHERE username=? AND acctstoptime > 0 GROUP BY `daily`";
    }
    private function loginMonthly() {
        $this->graph_sql = "SELECT username,COUNT(acctstarttime) AS login,MONTHNAME(acctstarttime) AS `monthly` FROM radacct WHERE username=? AND acctstoptime > 0 GROUP BY `monthly`";
    }
    private function loginYearly() {
        $this->graph_sql = "SELECT username,COUNT(acctstarttime) AS login,YEAR(acctstarttime) AS `yearly` FROM radacct WHERE username=? AND acctstoptime > 0 GROUP BY `yearly`";
    }
    private function downloadDaily() {
        $this->graph_sql = "SELECT username,FLOOR(SUM(acctoutputoctets/1024/1024)) AS download, DAY(acctstarttime) AS `daily` FROM
              radacct WHERE username = ? AND acctstoptime > 0 AND acctstarttime > DATE_SUB(curdate(),INTERVAL (DAY(curdate())-1) DAY)
              AND acctstarttime< now() GROUP BY `daily`";
    }
    private function downloadMonthly() {
        $this->graph_sql = "SELECT username,FLOOR(SUM(acctoutputoctets/1024/1024)) AS download,MONTHNAME(acctstarttime) AS `monthly` FROM radacct WHERE username=? GROUP BY `monthly`";
    }
    private function downloadYearly() {
        $this->graph_sql = "SELECT username,FLOOR(SUM(acctoutputoctets/1024/1024)) AS download,YEAR(acctstarttime) AS `yearly` FROM radacct WHERE username = ? GROUP BY `yearly`";
    }
    private function uploadDaily() {
        $this->graph_sql = "SELECT username,FLOOR(SUM(acctinputoctets/1024/1024)) AS upload,DAY(acctstarttime) AS `daily` FROM
          radacct WHERE username = ? AND acctstoptime > 0 AND acctstarttime>DATE_SUB(curdate(),INTERVAL (DAY(curdate())-1) DAY)
          AND acctstarttime < now() GROUP BY `daily`";
    }
    private function uploadMonthly() {
        $this->graph_sql = "SELECT username,FLOOR(SUM(acctinputoctets/1024/1024)) AS upload,MONTHNAME(acctstarttime) AS `monthly` FROM radacct WHERE username = ? GROUP BY `monthly`";
    }
    private function uploadYearly() {
        $this->graph_sql = "SELECT username,FLOOR(SUM(acctinputoctets/1024/1024)) AS upload,YEAR(acctstarttime) as `yearly` FROM radacct WHERE username = ? GROUP BY `yearly`";
    }
}