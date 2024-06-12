<?php

namespace Cpkm\Admin\Traits;

trait QueryTrait
{
    protected $likes = [
    ];

    protected $betweens = [
    ];
    /**
     * 列表SQL
     * @param  array $where
     * @return $query
     * @version 1.0
     * @author Henry
     */
    public function listQuery(array $where) {
        $query = $this;
        foreach ($where as $field => $value) {
            if(in_array($field, $this->likes)) {
                $query = $query->where($field, 'like', '%'.$value.'%');
            }else if(in_array($field, $this->betweens)) {
                $query = $query->whereBetween($field, [$value['start']." 00:00:00", $value['end']." 23:59:59"]);
            }else{
                $query = $query->where($field, $value);
            }
        }
        if(isset($this->withs) && $this->withs) {
            $query = $query->with($this->withs);
        }
        if(isset($this->detail) && $this->detail) {
            $query = $query->select($this->detail);
        }
        return $query->select($this->getTable().'.*');
    }

    /**
     * 取得單筆資料
     * @param string $id
     * @return object
     * @version 1.0
     * @author Henry
     */
    public function getDetail($id) {
        $query = $this->select($this->detail);
        if(isset($this->withs) && $this->withs) {
            $query = $query->with($this->withs);
        }
        return $query->find($id);
    }

    /**
     * 搜尋單筆資料
     * @param string $id
     * @return object
     * @version 1.0
     * @author Henry
     */
    public function search(array $where) {
        return $this->listQuery($where)->first();
    }

    public function getDetailFields() {
        return $this->detail??[];
    }

    public function getDeleteAbleAttribute() {
        foreach ($this->withs??[] as $relation) {
            
            if($this->{$relation}()->exists()) {
                return false;
            }
        }
        foreach($this->checkDeletes??[] as $relation) {
            if($this->{$relation}()->exists()) {
                return false;
            }
        }
        return true;
    }
}
