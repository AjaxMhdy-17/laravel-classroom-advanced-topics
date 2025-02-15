<?php

namespace App\Policies;

use App\Models\ScheduledClass;
use App\Models\User;

class ScheduledClassPolicy 
{
   /// if name of policy matched the name of the model ScheduledClass
   /// and prefix will be policy then laravel will understand it a policy for this model 
   /// otherwise it policy should defined into AuthServiceProvider manually 
   public function delete(User $user , ScheduledClass $class){
    return $user->id == $class->teacher_id ; 
   }


}
