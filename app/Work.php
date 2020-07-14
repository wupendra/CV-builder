<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'start_date','end_date'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'highlights' => 'array',
    ];

    //Work belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Add work time period attribute
    public function getPeriodAttribute()
    {
    	if(!empty($this->start_date))
    	{
    		$start = $this->start_date;
    		if(!empty($this->end_date))
    			$end = $this->end_date;
    		else
    			$end = Carbon::now();
    		$days = $start->diffInDays($end);
    		$months = $start->diffInMonths($end);
    		if($days<=1)
    			$period = '1 Day';
    		elseif($days<=31)
    			$period = $days.' Days';
    		elseif($months==1)
    			$period = '1 Month';
    		elseif($months>1 && $months<12)
    			$period = $months.' Months';
    		elseif($months == 13)
    			$period = '1 Year 1 Month';
    		elseif($months>13 && $months<24)
    			$period = '1 Year '.($months-12).' Months';
    		elseif($months%12==1)
    			$period = floor($months/12).' Years 1 Month';
    		else
    			$period = floor($months/12).' Years '.($months%12).' Months';
    		return $period;
    	}
        else
        	return '0 Days';
    }
}
