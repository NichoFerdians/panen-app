<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class HasilPanenController extends Controller
{
    public function getHasilPanen(Request $request)
    {
        $hasilPanen = HasilPanen::orderBy('user', 'asc')->orderBy('metode', 'asc')->get();

        $result = $this->formatData($hasilPanen);

        return response()->json($result);
    }
    public function getReportData(Request $request)
    {
        $users = DB::table('hasil_panen')
            ->select('user')
            ->distinct()
            ->orderBy('user', 'asc')
            ->get();

        $result = [];
        foreach ($users as $e) {

            $queryManual = HasilPanen::where([
                ['user', $e->user],
                ['metode', "manual"]
            ]);
            $manual = $queryManual->get()->toArray();
            $manualSumMatang = (int) $queryManual->sum('matang');
            $manualSumMentah = (int) $queryManual->sum('mentah');

            $queryMekanis = HasilPanen::where([
                ['user', $e->user],
                ['metode', "mekanis"]
            ]);

            $mekanis = $queryMekanis->get()->toArray();
            $mekanisSumMatang = (int) $queryMekanis->sum('matang');
            $mekanisSumMentah = (int) $queryMekanis->sum('mentah');

            $result[] = $this->formatData($manual);
            $result[] = $this->formatData([["user"=> "subtotal", "matang" => $manualSumMatang, "mentah" => $manualSumMentah]]);
            $result[] = $this->formatData($mekanis);
            $result[] = $this->formatData([["user"=> "subtotal", "matang" => $mekanisSumMatang, "mentah" => $mekanisSumMentah]]);
        }

        // Grand Total

        $queryTotal = HasilPanen::all();

        $sumMatang = (int) $queryTotal->sum('matang');
        $sumMentah = (int) $queryTotal->sum('mentah');
        $result[] = $this->formatData([["user"=> "grandtotal", "matang" => $sumMatang, "mentah" => $sumMentah]]);

        return response()->json(array_merge(...$result));
    }


    // Helper Function
    // TODO: Move this to helper class
    private function formatData($data) {
        $result = [];
        foreach ($data as $e) {
            $no_panen = isset($e["user"]) && isset($e["blok"]) ? Carbon::now()->format('ymd') . $e["user"] . "." . $e["blok"] : "";
            $result[] = [
                "user" => $e["user"] ?? "",
                "no_panen" =>  $no_panen,
                "blok" => $e["blok"] ?? "",
                "metode" => $e["metode"] ?? "",
                "hasil_panen" => [
                    "matang" => $e["matang"] ?? "",
                    "mentah" => $e["mentah"] ?? ""
                ]
            ];
        }

        return $result;
    }
}
