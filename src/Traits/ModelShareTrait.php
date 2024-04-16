<?php

namespace Cpkm\Admin\Traits;
use Schema;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

trait ModelShareTrait
{
    /**
     * 找出最上層
     */

     public function getTop($data, $relation) {
        $parent = $this->getParent($data, $relation);
        return $data->id != $parent->id ? $parent : null;
     }
     
     public function getParent($data, $relation) {
        if(isset($data->{$relation})){
            return $this->getParent($data->{$relation}, $relation);
        }
        return $data;
     }     

    /**
     * 找出下層(包含自己)
    */
     public function getLowerData($data, $relation) {
        $lower_data = [];
        $getLower = function($data, $relation) use (&$lower_data, &$getLower) {
            if(isset($data->{$relation})){            
                foreach($data->{$relation} as $value){
                    $lower_data[] = $value->id;
                    $getLower($value, $relation);
                }
            }
        };
        $lower_data[] = $data->id;
        $getLower($data, $relation);
        return $lower_data;
     }       
	/**
     * 一對多 比對 更新刪除
     */
    protected function scopeHasManySyncable($db, $parent, $relation, $validatedData, $merge_data = [])
    {
        $deleteIds = array_diff($parent->{$relation}()->pluck('id')->all(), array_column($validatedData, 'id'));

        foreach($validatedData as $value){
            if(isset($value['id'])){
                $data = $parent->{$relation}()->findOrFail($value['id']);
                $data->update($value);
            }else{
                $parent->{$relation}()->create($value);
            }
        }

        foreach($deleteIds as $id){
            $data = $parent->{$relation}()->findOrFail($id);
            $data->delete();
        }
    }    

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date;
    }    
}