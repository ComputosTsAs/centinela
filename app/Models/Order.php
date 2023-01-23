<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['admission_date', 'status_id', 'user_id', 'description', 'delivery_date', 'user_id_deliver','who_takes'];

   
    /**
     * Define relationship with user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

     /**
     * Define relationship with user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\StatusOutput');
    }


 


}
