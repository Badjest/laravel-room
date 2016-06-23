<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use PDO;
use Illuminate\Support\Facades\Auth;

class SetData extends Controller
{
    public function delete_order()
    {

        if (Request::ajax()) {

            $data = Input::all();
            $id = $data['idorder'];
            DB::table('goods_into_orders')->where('idorder',$id)->delete();
            DB::table('orders')->where('idorder',$id)->delete();

            die;
        }
    }

    public function save_order()
    {



            $json = Input::all();
            $json = json_decode($json['categories'],true);
            DB::table('goods_into_orders')
                ->join('orders', 'goods_into_orders.idorder', '=', 'orders.idorder')
                ->where('orders.iduser', Auth::id())->delete();


        foreach ($json as $sku){
            if (is_null($sku["idorder"])) {
                $values = array('idorder' => null,'iduser' => Auth::id());
                DB::table('orders')->insert($values);
                $id = DB::getPdo()->lastInsertId();
                foreach ($sku["good"] as $good){
                    $lol = array('idgoodsintoorder' => null,'idgood' => $good["idgood"], 'idorder' => $id, 'countgood' =>$good["countgood"]);
                    DB::table('goods_into_orders')->insert($lol);
                }
            }
            else
            {

                DB::setFetchMode(PDO::FETCH_ASSOC);
                $rs = DB::table('goods_into_orders')
                    ->select("goods_into_orders.idgood")
                    ->join('orders', 'goods_into_orders.idorder', '=', 'orders.idorder')
                    ->where('orders.iduser', Auth::id())
                    ->where('orders.idorder',$sku["idorder"])->get();
               print_r($rs);
                foreach ($sku["good"] as $good){
                    $key = 0;
                    foreach ($rs as $rs_el){
                        print_r($rs_el);
                        if(intval($good["idgood"]) == intval($rs_el['idgood']))
                        {
                            DB::table('goods_into_orders')
                                ->join('orders', 'goods_into_orders.idorder', '=', 'orders.idorder')
                                ->where('orders.idorder',$sku["idorder"] )
                                ->where('orders.iduser',Auth::id())
                                ->update(array('countgood' => DB::raw('countgood +'. intval($good["countgood"]))));
                            $key = 1;
                            break;
                        }
                    }
                    if ($key == 0)
                    {
                        $lol = array('idgoodsintoorder' => null,
                            'idgood' => $good["idgood"],
                            'idorder' => $sku["idorder"],
                            'countgood' =>$good["countgood"]);
                        DB::table('goods_into_orders')->insert($lol);

                    }
                }
            }
        }




            die;


}
}