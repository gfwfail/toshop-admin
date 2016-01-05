<?php

namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','referrer'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function children() {
        return $this->hasMany(self::class, 'referrer', 'id');
    }

    public function insertNode()
    {

        $ancestorId = $this->referrer;
        $descendantId = $this->id;


        $table = "user_closure";
        $ancestor = "ancestor_id";
        $descendant = "descendant_id";
        $depth = "distance";

        if ($ancestorId==0){
            DB::table($table)->insert([$ancestor=>$descendantId,$descendant=>$descendantId,$depth=>0]);
            return;
        }

        $query = "
            INSERT INTO {$table} ({$ancestor}, {$descendant}, {$depth})
            SELECT tbl.{$ancestor}, {$descendantId}, tbl.{$depth}+1
            FROM {$table} AS tbl
            WHERE tbl.{$descendant} = {$ancestorId}
            UNION ALL
            SELECT {$descendantId}, {$descendantId}, 0
        ";
        DB::connection($this->connection)->statement($query);
    }

}
