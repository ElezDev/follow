<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class followup extends Model
{
    public function User_Register(){
        return $this->hasOne('App\Models\User_register');
    }
    use HasFactory;
    protected $fillable = [
        'progress_evaluation',
        'activities_carriedout',
        'start_date',
        'end_date',
        'practical_stage',
        'log',
        'agreement_report', // Corrigiendo el nombre del campo
    ];

    protected $allowIncluded = [];

    protected $allowFilter = [
        'id',
        'progress_evaluation',
        'activities_carriedout',
        'start_date',
        'end_date',
        'practical_stage',
        'log',
        'agreement_report'
    ];

    protected $allowSort = [
        'id',
        'progress_evaluation',
        'activities_carriedout',
        'start_date',
        'end_date',
        'practical_stage',
        'log',
        'agreement_report'
    ];

    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $field => $value) {
            if ($allowFilter->contains($field)) {
                $query->where($field, $value);
            }
        }
    }

    public function scopeSort(Builder $query)
    {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {
            $direction = 'asc';

            if (substr($sortField, 0, 1) === '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }

    public function scopeGetOrPaginate(Builder $query) {
        if (request('perPage')) {
            $perPage = intval(request('perPage'));

            if ($perPage) {
                return $query->paginate($perPage);
            }
        }
        return $query->get();
    }
}
