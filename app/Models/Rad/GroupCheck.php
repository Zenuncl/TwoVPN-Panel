<?php
/**
 * Date: 6/1 0001
 * Time: 16:25
 * @author GROOT (pzyme@outlook.com)
 */
namespace App\Models\Rad;

use Illuminate\Database\Eloquent\Model;
use DB;

class GroupCheck extends Model {
    protected $table = 'radgroupcheck';
    protected $guarded = ['id'];

    /**
     *
     * @param array $plan
     * @return mixed
     */
    public function make(array $plan, $update = false) {
        return DB::transaction(function() use($plan, $update){
            $insert_data = [
                [
                    'groupname' => $plan['name'],
                    'attribute' => env('Max_Daily_Traffic'),
                    'op' => ':=',
                    'value' => $plan['daily']
                ],
                [
                    'groupname' => $plan['name'],
                    'attribute' => env('Max_Monthly_Traffic'),
                    'op' => ':=',
                    'value' => $plan['monthly']
                ],
                [
                    'groupname' => $plan['name'],
                    'attribute' => env('Simultaneous_Use'),
                    'op' => ':=',
                    'value' => $plan['simultaneous']
                ]
            ];


            if($update) {
                DB::table('radgroupcheck')->where("groupname",$plan['name'])->delete();
                DB::table('radgroupreply')->where('groupname',$plan['name'])->delete();
            }

            $id = DB::table('radgroupreply')->insert([
                [
                    'groupname' => $plan['name'],
                    'attribute' => 'Acct-Interim-Interval',
                    'op' => ':=',
                    'value' => $plan['acctinterval']
                ],
                [
                    'groupname' => $plan['name'],
                    'attribute' => 'Session-Timeout',
                    'op' => ':=',
                    'value' => $plan['sessiontimeout']
                ],
                [
                    'groupname' => $plan['name'],
                    'attribute' => 'Idle-Timeout',
                    'op' => ':=',
                    'value' => $plan['idletimeout']
                ]
            ]);

            return DB::table('radgroupcheck')->insert($insert_data);
        });
    }

    /**
     *
     * @param $groupname
     * @return array|bool
     */
    public function detail($groupname) {
        $sql = "SELECT groupname,GROUP_CONCAT(attribute) AS attr,GROUP_CONCAT(value) AS val FROM radgroupcheck WHERE groupname=? GROUP BY groupname";
        $result = DB::select(DB::raw($sql),[$groupname]);

        if(!isset($result[0])) return false;
        $row = $result[0];unset($result);

        $attrs = explode(",",str_replace([env('Max_Daily_Traffic'),env('Max_Monthly_Traffic'),env('Simultaneous_Use')],['daily','monthly','simultaneous'],$row->attr));
        $vals = explode(",",$row->val);

        $reply = DB::select(DB::raw("select GROUP_CONCAT(attribute) as attr,group_concat(value) as val from radgroupreply where groupname=? group by groupname"),[$groupname]);

        if(!isset($reply[0])) abort(500);
        $reply = $reply[0];

        $reply_attrs = explode(",",str_replace([env('Acct_Interim_Interval'),env('Session_Timeout'),env('Idle_Timeout')],['acct_interval','session_timeout','idle_timeout'],$reply->attr));
        $replay_vals = explode(",",$reply->val);

        return [
            'groupname' => $row->groupname
        ] + array_combine($attrs,$vals) + array_combine($reply_attrs,$replay_vals);
    }

    public function getAll() {
        $sql = "SELECT groupname,GROUP_CONCAT(radgroupcheck.attribute) AS attr,GROUP_CONCAT(radgroupcheck.value) AS val FROM radgroupcheck GROUP BY groupname ORDER BY id";
        $result = DB::select($sql);

        $_tmp = [];
        foreach($result as $row) {
            $attrs = explode(",",str_replace([env('Max_Daily_Traffic'),env('Max_Monthly_Traffic'),env('Simultaneous_Use')],['daily','monthly','simultaneous'],$row->attr));
            $vals = explode(",",$row->val);
            array_push($_tmp,[
                'groupname' => $row->groupname,
                'detail' => array_combine($attrs,$vals)
            ]);
        }
        return $_tmp;
    }


    public function remove($groupname) {
        return DB::transaction(function() use($groupname){
            DB::table("radgroupcheck")->where("groupname",$groupname)->delete();
            DB::table('radgroupreply')->where('groupname',$groupname)->delete();
            return true;
        });
    }
}