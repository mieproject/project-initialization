<?php


namespace MieProject\ProjectInitialization;


class playWithFiles
{

    public function run()
    {
        $this->UserModel();
        $this->DatabaseSeeder();
    }
    protected function UserModel(){
        $userModelPath = app_path('Models/User.php');
        $userModelFile = file_get_contents($userModelPath);

        // add `use HasRoles`
        if (strpos($userModelFile,'Spatie\Permission\Traits\HasRoles')  === false){
            $regex1 = '/(use(.*);)/';
            $subst1 = "\$1\nuse Spatie\\Permission\\\\Traits\\\\HasRoles;";

            $userModelFile = preg_replace($regex1, $subst1, $userModelFile,1);

            $regex2 = '/(class.(.*).(extends).(.*)\n{\n(.+)use ((.*);))/';
            $subst2 = "class $2 $3 $4\n{\n$5use $7, HasRoles;"; // $2 = className, $3 = extends, $4 = Authenticatable,$5 = space, $7 used

            $userModelFile = preg_replace($regex2, $subst2, $userModelFile,1);

            file_put_contents($userModelPath,$userModelFile);
        }
        // end add `use HasRoles`
    }

    protected function DatabaseSeeder(){

        $path = base_path('database/seeders/DatabaseSeeder.php');
        $file = file_get_contents($path);

//         add `use HasRoles`
        if (strpos($file,'PermissionsDemoSeeder')  === false){
            $regex1 = '/(public function run)(\(\))\n.+{((.|\n)*?)}/';
            $subst1 = "$1$2{\n      \n        ".'$this->call([PermissionsDemoSeeder::class]);'."$3\n    }";

            $file = preg_replace($regex1, $subst1, $file,1);


            file_put_contents($path,$file);
        }
        // end add `use HasRoles`

        //
    }

}