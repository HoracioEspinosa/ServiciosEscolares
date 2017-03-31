<?php

namespace Caribbean\Http\Controllers\Modules\Expedientes;

use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Illuminate\Http\Request;
use Caribbean\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;



class ExpedientesController extends Controller
{

    private $result = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $idAlumnoo=$request->id;
        $this->setUserHeader();

        $result = $this->result;

        if ($result['tipo'] == 1) {

            $expe = $this->getExpedientes($idAlumnoo);

            return view('modules.expedientes.index', compact('users', 'result', 'expe','idAlumnoo'));

        } else {
            return view('modules.users.index', compact('users', 'result'));

        }

    }

    public function procedimientosExpe(Request $request)
    {
        $idExpediente=$request->id;
        if (cookie::get('token') == "" || Cookie::get('token') == null) {
            return redirect('/login');
        } else {
            try {
                try {
                    $client = new GuzzleHttp\Client(['base_uri' => env('SERVER_API')]);
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer ' . cookie::get('token'),
                    ];

                    $my_request = $client->request('POST', '/api/expedientes/Buscar', [
                        'form_params' => [
                            'accion' => $idExpediente,
                            'idexperiencia' => $idExpediente,
                            'nombre' => $idExpediente,
                            'url' => $idExpediente,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();

                    $result = json_decode($result, JSON_PRETTY_PRINT);

                    return $result;
                } catch (ClientException $exception) {
                    ;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            } catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function getarchivos(Request $request)
    {

        $idAlumnoo=$request->id;
        $directorio = getcwd()."/public/archivosExpedientes/Archivos";
        $gestor_dir = scandir($directorio,1);
        $expe = $this->getExpedientes($idAlumnoo);

        $archivos = '';
        $max=count($expe)-1;

        for($i = 0; $i < count($expe); ++$i) {
            switch ($i) {
                case '.pdf':

                    break;
                case '.docx':

                    break;
                case '.xlsx':
                    
                    break;
                case '.pptx':
                    echo "i es igual a 1";
                    break;
                case '.txt':
                    echo "i es igual a 1";
                    break;
                case '.jpg':
                    echo "i es igual a 1";
                    break;
                case '.png':
                    echo "i es igual a 1";
                    break;
            }


            $archivos.= "<a class=\"file-block file ui-draggable ui-draggable-handle\" id=\"5gtUXQrC\">
        <span class=\"file-status-icon\"></span>
        <span class=\"data-item-icon\"></span>
        <span class=\"file-settings-icon\" data-ids='".$expe[$i]['idExpedientes']."'>      x     </span>
        <span class=\"file-icon-area\">
            <span class=\"block-view-file-type pdf file\">
                <img>
            </span>
        </span>
        <span class=\"file-block-title\" value='".$expe[$i]['nombre']."'>".$expe[$i]['nombre']."</span></a>";
        }

        return $archivos;
    }


    public function setUserHeader()
    {
        if (cookie::get('token') == "" || Cookie::get('token') == null) {
            return redirect('/login');
        } else {
            try {
                try {
                    $client = new GuzzleHttp\Client(['base_uri' => env('SERVER_API')]);
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . cookie::get('token'),
                    ];
                    $result = $client->get('api/auth/me', ['headers' => $headers]);
                    $resultado = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT)["user"];
                    $this->result = $resultado;
                } catch (ClientException $exception) {
                    ;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            } catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }


    public function getExpedientes($idAlumno)
    {
        if (cookie::get('token') == "" || Cookie::get('token') == null) {
            return redirect('/login');
        } else {
            try {
                try {
                    $client = new GuzzleHttp\Client(['base_uri' => env('SERVER_API')]);
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer ' . cookie::get('token'),
                    ];
                    $idAl = $idAlumno;
                    $my_request = $client->request('POST', '/api/expedientes/Buscar', [
                        'form_params' => [
                            'idAlumno' => $idAl,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();

                    $result = json_decode($result, JSON_PRETTY_PRINT);

                    return $result;
                } catch (ClientException $exception) {
                    ;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            } catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

}
