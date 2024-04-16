<?php

namespace Cpkm\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory, \Cpkm\Admin\Traits\ObserverTrait;

    protected $fillable = [
        'key',
        'value',
    ];

    public static $audit = [
        //要紀錄欄位
        'only' => [
            'key',
            'value',
        ],   
    ];

    /**
     * 取得設定檔
     * @param string $lang
     * @param string $type
     * @return $data
     * @author Henry
    **/
    public function getSetting(String $key) {
        $setting = $this->where([
            'key'   =>  $key,
        ])->first();
        if($setting) {
            return $setting->value;
        }
        return false;
    }

    public function getAllSettings() {
        return $this->all()->pluck('value', 'key')->toArray();
    }
}
