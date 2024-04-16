<?php

namespace Cpkm\Admin\Service;

use Cpkm\Admin\Models\SystemSetting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * Class SystemSettingsService.
 */
class SystemSettingsService
{
    /** 
     * \App\Repositories\System\SystemSettingRepository
     * @access protected
     * @var SystemSettingRepository
     * @version 1.0
     * @author Henry
    **/
    protected $SystemSettingRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(SystemSetting $SystemSetting)
    {
        $this->SystemSettingRepository = $SystemSetting;
    }
    
    protected $allowSetting = [
        'tax_percentage',
        'company',
        'purchase_settings',
        'sales_settings',
    ];

    /**
     * 取得設定檔
     * @param string $lang
     * @param string $type
     * @return $data
     * @author Henry
    **/
    public function getSetting(String $key) {
        return $this->SystemSettingRepository->getSetting($key);
    }
    
    /**
     * 更新設定檔
     * @param string $lang
     * @param string $name
     * @param array|object|string|int $value
     * @return boolean
     * @author Henry
    **/
    public function updateSetting(String $key, $value) {
        if(!in_array($key, $this->allowSetting)) {
            return false;
        }
        if(is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }
        $this->SystemSettingRepository->updateOrCreate([
                'key'   =>  $key
            ],[
                'value' =>  $value
            ]);
    }

    /**
     * 初始化設定
     * @version 1.0
     * @param array $data
     * @author Henry
    **/
    public function Init(Array $data) {
        $this->allowSetting = array_merge($this->allowSetting, ['init', 'main_currency', 'decimal_point']);
        foreach($data as $name => $value) {
            $this->updateSetting($name, $value);
        }
        $this->updateSetting('init', 1);
    }
    
    /**
     * 初始化檢查
     * @version 1.0
     * @author Henry
     * @return Boolean
     */
    public function CheckInit() {
        return $this->SystemSettingRepository->getSetting("init");
    }
    
    /**
     * 取得分類設定
     * @param  mixed $lang
     * @return array
     */
    public function getSettings() {
        return $this->SystemSettingRepository->getAllSettings();
    }

}