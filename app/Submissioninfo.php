<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submissioninfo extends Model
{
    protected $table = "submission_info";
    protected $primaryKey = "submission_info_id";

    public function findSubs($recruitment_id, $id){
        return $this->where('recruitment_id', $recruitment_id)->where('id', $id)->get();
    }
    public function findSub($id){
        return $this->where('recruitment_id', $id)->get();
    }
    public function findSubOnce($recruitment_id, $id){
        return $this->where('recruitment_id' ,$recruitment_id)->where('id', $id)->first();
    }
    public function findSubTwo($id){
        return $this->where('recruitment_id', $id)->first();
    }
    public function findSubId($id){
        return $this->findOrFail($id);
    }
    public function editSub($data, $id){
        return $this->where('submission_info_id', $id)->update($data);
    }
    public function addSubmission($data){
        return $this->insert($data);
    }
    public function getSubresume($id){
        return $this->join('recruitment', 'recruitment.recruitment_id', 'submission_info.recruitment_id')
                    ->join('users', 'users.id', 'submission_info.id')
                    ->where('recruitment.id', $id)
                    // ->where('users.id', $id)
                    ->paginate(5);
    }
    public function getSub($id){
        return $this->join('recruitment', 'recruitment.recruitment_id', 'submission_info.recruitment_id')
                    ->join('users', 'users.id', 'recruitment.id')
                    ->where('submission_info.id', $id)
                    ->paginate(5);
    }
    public function sortDate($date, $id){
        return $this->join('recruitment', 'recruitment.recruitment_id', 'submission_info.recruitment_id')
                    ->join('users', 'users.id', 'recruitment.id')
                    ->where('date_created', $date)
                    ->where('submission_info.id', $id)
                    ->paginate(5);
    }
    public function sortZero($status, $id){
        return $this->join('recruitment', 'recruitment.recruitment_id', 'submission_info.recruitment_id')
                    ->join('users', 'users.id', 'recruitment.id')
                    ->where('submission_status', $status)
                    ->where('submission_info.id', $id)
                    ->paginate(5);
    }
    public function sortOnce($status, $id){
        return $this->join('recruitment', 'recruitment.recruitment_id', 'submission_info.recruitment_id')
                    ->join('users', 'users.id', 'recruitment.id')
                    ->where('submission_status', $status)
                    ->where('submission_info.id', $id)
                    ->paginate(5);
    }
    public function sortTwo($status, $id){
        return $this->join('recruitment', 'recruitment.recruitment_id', 'submission_info.recruitment_id')
                    ->join('users', 'users.id', 'recruitment.id')
                    ->where('submission_status', $status)
                    ->where('submission_info.id', $id)
                    ->paginate(5);
    }
    public function delSub($id){
        return $this->where('submission_info_id', $id)->delete();
    }
}
