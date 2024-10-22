<?php

namespace App;

// use Codesleeve\Stapler\ORM\EloquentTrait;
// use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    // implements StaplerableInterface
    // use EloquentTrait;

    protected $table   = 'tblStaff';
    protected $guarded = ['StaffRef', 'YearsOfService', 'RefName', 'RefRelationship', 'RefOccupation', 'RefPhone', 'RefEmail', 'RefAddress', 'Qualification', 'ProfDateObtained',
        'Institution', 'QualificationObtained', 'DateObtained'];
    public $timestamps = false;
    public $primaryKey = 'StaffRef';

    public $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User', 'UserID');
    }
    public function company()
    {
        return $this->belongsTo('App\Company', 'CompanyID');
    }
    public function country()
    {
        return $this->belongsTo('App\Country', 'CountryID');
    }
    public function state()
    {
        return $this->belongsTo('App\State', 'StateID');
    }

    public function state_of_origin()
    {
        return $this->belongsTo('App\State', 'StateofOrigin');
    }

    public function country_of_origin()
    {
        return $this->belongsTo('App\Country', 'CountryOfOrigin');
    }

    public function country_of_birth()
    {
        return $this->belongsTo('App\Country', 'CountryOfBirth');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'GenderID');
    }

    public function marital_status()
    {
        return $this->belongsTo(MaritalStatus::class, 'MaritalStatusID');
    }

    public function location()
    {
        return $this->belongsTo('App\Location', 'LocationID');
    }
    public function tasks()
    {
        return $this->hasMany('App\ProjectTask', 'StaffID', 'StaffRef');
    }
    // singular
    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
        // return Department::whereIn('DepartmentRef', explode(',', $this->DepartmentID))->get();
    }

    // plural
    public function departments()
    {
        return $this->hasMany(Department::class, 'DepartmentRef', 'DepartmentID');
        // return Department::whereIn('DepartmentRef', explode(',', $this->DepartmentID))->get();
    }

    public function religion()
    {
        return $this->belongsTo('App\Religion', 'ReligionID');
    }

    public function company_department()
    {
        return $this->belongsTo(CompanyDepartment::class, 'DepartmentID', 'id');
    }
    public function supervisor()
    {
        return $this->belongsTo(Staff::class, 'SupervisorID', 'StaffRef');
    }
    public function getProjectsAttribute()
    {
        $staff_id = $this->StaffRef;
        $projects = Project::whereHas('tasks', function ($query) use ($staff_id) {
            $query->where('StaffID', $staff_id);
        })->orWhere('SupervisorID', $staff_id)->get();
        return $projects;
    }
    public function getProjectsExtendedAttribute()
    {
        // Same as getProjectsAttribute(), but Including projects I've CREATED (Even if I'm not involved).
        $staff_id = $this->StaffRef;
        $projects = Project::whereHas('tasks', function ($query) use ($staff_id) {
            $query->where('StaffID', $staff_id);
        })->orWhere('SupervisorID', $staff_id)->orWhere('CreatedBy', $this->UserID)->get();
        return $projects;
    }

    public function getFullNameAttribute()
    {
        return $this->user->FullName ?? '';
    }
    public function getFirstNameAttribute()
    {
        return $this->user->first_name;
    }
    public function getMiddleNameAttribute()
    {
        return $this->user->middle_name;
    }
    public function getLastNameAttribute()
    {
        return $this->user->last_name;
    }

    public function payroll_details()
    {
        return $this->hasMany(PayrollMonthly::class, 'StaffID');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'BankRef', 'BankID');
    }

    public function scorecards()
    {
        return $this->hasMany('App\ScoreCard', 'StaffID');
    }

    public function nysc_location()
    {
        return $this->belongsTo('App\State', 'NYSCLocationID');
    }

    public function subordinates()
    {
        return $this->hasMany('App\Staff', 'SupervisorID');
    }

    public function references()
    {
        return $this->hasMany(Reference::class, 'ReferenceID');
    }

    public function nationality()
    {
        return $this->belongsTo(Country::class, 'Nationality');
    }

    public function appraisals()
    {
        return $this->hasMany('App\Appraisal', 'staffID');
    }
    public function appraisalcomments()
    {
        return $this->hasMany('App\AppraisalComment', 'staffID');
    }
    public function appraisalcustomers()
    {
        return $this->hasMany('App\AppraisalCustomer', 'staffID');
    }
    public function appraisalfinances()
    {
        return $this->hasMany('App\AppraisalFinance', 'staffID');
    }
    public function appraisalinternals()
    {
        return $this->hasMany('App\AppraisalInternal', 'staffID');
    }
    public function appraisallearnings()
    {
        return $this->hasMany('App\AppraisalLearning', 'staffID');
    }
    public function appraisalrecommendations()
    {
        return $this->hasMany('App\AppraisalRecommendation', 'staffID');
    }
    public function appraisalsignatures()
    {
        return $this->hasMany('App\AppraisalSignature', 'staffID');
    }
    public function appraisaltrainings()
    {
        return $this->hasMany('App\AppraisalTraining', 'staffID');
    }
    public function staffbehaviouralitems()
    {
        return $this->hasMany('App\StaffBehaviouralItem', 'staffID');
    }

    public function staffAppraisals()
    {
        return $this->hasMany('App\StaffAppraisal', 'staff_id');
    }

}