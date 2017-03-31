<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\AuthController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ModuleUsersController extends Controller
{


    /**
     * @return mixed
     */
    public function getUserData(){
        $user_id = 0;
        $username =  NULL;
        $result = array( "error" => "", "message" => "" );
        try{
            $users =  DB::select("CALL GET_USER_DATA(".$user_id.", '".$username."')");
            $result["error"] = false;
            $result["message"] = (sizeof($users) > 0) ? $users : "No users found";
        }catch (Exception $exception){
            $result["error"] = true;
            $result["message"] = $exception;
        }
        $result = json_encode($result);
        return json_decode($result, JSON_PRETTY_PRINT);
    }

    /**
     * @return mixed
     */
    public function getAllUsersInformation() {
        //$users = DB::table('users')->join('user_information', 'users.user_information_iduser_information', '=', 'user_information.iduser_information');
        $users = DB::select('SELECT * FROM usuarios INNER JOIN informacion ON usuarios.idUsuarios = informacion.idInformacion');
        $users = json_encode($users, true);
        return json_decode($users, JSON_PRETTY_PRINT);
    }


    public function getAllProfesorsInformation() {
        $users = DB::table('usuarios')->join('informacion', 'usuarios.idUsuarios', '=', 'informacion.idInformacion')->get();
        return Datatables::of($users)->make(true);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllUserInformationByUsername(Request $request)
    {

            $username = $request->input('username');

            if ($username == null) {
                $user = AuthController::getAuthenticatedUserWithParameter($request);
                $id = $user["id_users"];
                $information = DB::table('users')
                    ->join('user_information', 'users.user_information_iduser_information', '=', 'user_information.iduser_information')
                    ->join('departments', 'users.Departments_id_departments','=','departments.id_departments')
                    ->join('users_levels', 'users.Users_levels_idUsers_levels', '=', 'users_levels.idUsers_levels')
                    ->select("users.username", "users.deleted", "users.id_users", "users.uname AS name", "users.lastname", "users.status AS status", "users.email", "user_information.code", "user_information.photo", "user_information.extra_phones", "user_information.address", "user_information.age", "user_information.gender", "departments.id_departments", "departments.name AS department_name", "users_levels.name AS level_name")
                    ->where('users.id_users', '=', $id)
                    ->get();
            } else {
                $information = DB::table('users')
                    ->join('user_information', 'users.user_information_iduser_information', '=', 'user_information.iduser_information')
                    ->join('departments', 'users.Departments_id_departments','=','departments.id_departments')
                    ->join('users_levels', 'users.Users_levels_idUsers_levels', '=', 'users_levels.idUsers_levels')
                    ->select("users.username", "users.deleted", "users.id_users", "users.uname AS name", "users.lastname", "users.status AS status", "users.email", "user_information.code", "user_information.photo", "user_information.extra_phones", "user_information.address", "user_information.age", "user_information.gender", "departments.id_departments", "departments.name AS department_name", "users_levels.name AS level_name")
                    ->where('users.username', '=', $username)
                    ->get();
            }
            $information = json_encode($information[0], true);
            return json_decode($information, JSON_PRETTY_PRINT);
        $username = $request->input('username');

        if ($username == null) {
            $user = AuthController::getAuthenticatedUserWithParameter($request);
            dd($user);
            $id = $user["id_users"];
            $information = User::all();
        } else {
            $information = User::all();
        }
        $information = json_encode($information[0], true);
        return json_decode($information, JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function get(Request $request){
        //$user = AuthController::getAuthenticatedUserWithParameter($request);
        //$id = $user["id_users"];
        //$id = null;
        //$type = $request->input('deleted');
        $query = User::all();

        return Datatables::of($query)->make(true);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request){
        $uname = $request->input('uname');
        $pass = $request->input('password');
        $result = array( "error" => "", "message" => "" );
        $password = DB::select("SELECT password FROM users WHERE uname = '".$uname."'");
        $password = $password[0]->password;
        if (Hash::check($pass, $password)) {
            $result["error"] = false;
            //comentario
            $result["message"] = "LOGGED IN";
        }else{
            $result["error"] = true;
            $result["message"] = "LOGIN ERROR";
        }
        $result = json_encode($result, true);
        return json_decode($result, JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getBranchID(Request $request) {
<<<<<<< HEAD
        $id = DB::table('departments')->where('id_departments', $request->input('id'))->select('departments.Branch_offices_id_branch_offices')->get();
        return $id[0]->Branch_offices_id_branch_offices;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getDepartmentsByBranch(Request $request) {
        $id = DB::table('departments')->where('Branch_offices_id_branch_offices', $request->input('id'))->get();
        return $id;
=======
        $user = User::all()->where('idUsuarios', $request->input('id'));
        return $user;
>>>>>>> a8c557a0557ce9996777b98b8ac63e9dfbf49a45
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function create(Request $request) {
        $name           =   $request->input('name');
        $lastname       =   $request->input('lastname');
        $username       =   strtoupper(substr($request->input('name'), 0,1) . $request->input('lastname'));
        $password       =   Hash::make('superman');
        $status         =   $request->input('status');
        $email          =   $request->input('email');
        $confirm        =   true;
        $iDdepartment   =   $request->input('department_id');
        $type           =   $request->input('type');
        $photo          =   env('SERVER_API').'/public/img/users/default.jpg';
        $phone          =   $request->input('phone');
        $address        =   $request->input('address');
        $age            =   $request->input('age');
        $gender         =   $request->input('gender');

        $data = array($name, $lastname, $username, $password, $status, $email, $confirm, $iDdepartment, $type, $photo, $phone, $address, $age, $gender);

        $user = DB::select("CALL INSERT_USER_DATA(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $data);
        $user = json_encode($user, true);
        return json_decode($user, JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function update(Request $request) {
        $id             =   $request->input('id');
        $nombre           =   $request->input('nombre');
        $apellido       =   $request->input('apellido');
        $correo          =   $request->input('correo');
        $edad            =   $request->input('edad');
        $foto          =   env('SERVER_API').'/public/img/users/default.jpg';
        $telefono          =   $request->input('telefono');
        $genero         =   $request->input('genero');
        $tipo           =   $request->input('tipo');
        $estado           =   $request->input('estado');
        $idInformacion         =   $request->input('idInformacion');
        $direccion        =   $request->input('direccion');

        $data = array($nombre, $apellido, $correo, $edad, $foto, $telefono, $genero, $tipo, $idInformacion, $direccion, $id, $estado);
        $user = DB::select('CALL UPDATE_FULL_USER_DATA(?,?,?,?,?,?,?,?,?,?,?,?)', $data);
        $user = json_encode($user, true);
        return json_decode($user, JSON_PRETTY_PRINT);
    }

    function delete(Request $request) {
        $user = DB::table('usuarios')->where('idUsuarios', $request->input('id'))->update(['estado' => 0]);
        $user = json_encode($user, true);
        return json_decode($user, JSON_PRETTY_PRINT);
    }

    function restore(Request $request) {
        $user = DB::table('usuarios')->where('idUsuarios', $request->input('id'))->update(['estado' => 1]);
        $user = json_encode($user, true);
        return json_decode($user, JSON_PRETTY_PRINT);
    }

    function getRecords() {
        $query = DB::table('users')->join('user_information', 'users.user_information_iduser_information', '=', 'user_information.iduser_information')->join('departments', 'users.Departments_id_departments','=','departments.id_departments')->join('users_levels', 'users.Users_levels_idUsers_levels', '=', 'users_levels.idUsers_levels')->select("users.deleted", "users.id_users", "users.uname AS name", "users.lastname", "users.status AS status", "users.email", "user_information.code", "user_information.photo", "user_information.extra_phones", "user_information.address", "user_information.age", "user_information.gender", "departments.id_departments", "departments.name AS department_name", "users_levels.name AS level_name")->get();
        $total = $query->count();
        $deleted = $query->where('deleted', 1)->count();
        $admins = $query->where('level_name', 'Administrador')->count();
        $nodeleted = ((int) $total)-((int)$deleted);
        $active = $query->where('status', 1)->count();
        $inactive = $query->where('status', 0)->count();
        $records = array(
            'total' => $total,
            'admins' => $admins,
            'deleted' => $deleted,
            'no_deleted' => $nodeleted,
            'active' => $active,
            'inactive' => $inactive
        );
        return $records;
    }
}
