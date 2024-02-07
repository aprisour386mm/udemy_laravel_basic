<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        //Eloquent(エロクアント)
        $values = Test::all();

        // 数字
        $count = Test::count();

        //インスタンス
        $first = Test::findOrFail(2);

        $whereBBB = Test::where('text', '=', 'bbb')->get();

        //クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
        ->select('id', 'text')
        ->get();

        //dd($values, $count, $first, $whereBBB, $queryBuilder);

        return view('tests.test', compact('values', 'count', 'first','whereBBB', 'queryBuilder'));
        // return view('フォルダ名.ファイル名', compact('values'));
        // viewはLaravelのヘルパ関数 フォルダ名.ファイル名
    }
}
