<?php

namespace App\Http\Controllers\Backend;

use App\Models\Multimedia;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MultimediaController extends AdminController
{
    protected $uploadPath;
    protected $uploadPathDoc;
    protected $uploadPathAudio;
    protected $uploadPathVideo;
    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path('multimedia/uploadImage');
        $this->uploadPathDoc = public_path('multimedia/uploadDocs');
        $this->uploadPathVideo = public_path('multimedia/uploadVideo');
        $this->uploadPathAudio = public_path('multimedia/uploadAudio');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        if (($status = $request->get('status')) && $status == 'documentos') {
            $multimediaCount = Multimedia::where('tipo', 'Documento')->count();
            $multimedias = Multimedia::where('tipo', 'Documento')->latest()->simplePaginate(7);
        } else if ($status == 'imagens') {
            $multimediaCount = Multimedia::where('tipo', 'Imagem')->count();
            $multimedias = Multimedia::where('tipo', 'Imagem')->latest()->simplePaginate(7);
        } else if ($status == 'audios') {
            $multimediaCount = Multimedia::where('tipo', 'Aúdio')->count();
            $multimedias = Multimedia::where('tipo', 'Aúdio')->latest()->simplePaginate(7);
        } else if ($status == 'videos') {
            $multimediaCount = Multimedia::where('tipo', 'Vídeo')->count();
            $multimedias = Multimedia::where('tipo', 'Vídeo')->latest()->simplePaginate(7);
        } else {
            $multimediaCount = Multimedia::count();
            $multimedias = Multimedia::latest()->simplePaginate(7);
        }

        $statusList = $this->fileTypeList($request);

        return view('backend.multimedia.index', compact('multimediaCount', 'multimedias', 'statusList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $multimedia = new Multimedia();
        return view('backend.multimedia.create', compact('multimedia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome_ficheiro' => 'required',
            'ficheiro' => 'file|mimes:pdf,jpeg,png,jpg,gif,svg,mp3,wav,m4a,mp4,webm,3gp,mov,flv,avi,wmv,ts,mkv|max:6120',
        ]);

        $data = $this->handleResquest($request);
        if ($data['doc_type'] == 'Seleccione o tipo de documento') {
            $data['doc_type'] = null;
        }

        $multimedia = Multimedia::create($data);

        return redirect('/backend/multimedias')->with("message", "Ficheiro inserido com sucesso!");

        //return dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Multimedia $multimedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $multimedia = Multimedia::findOrFail($id);
        return view("backend.multimedia.edit", compact('multimedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $multimedia = Multimedia::findOrFail($id);

        $this->validate($request, [
            'nome_ficheiro' => 'required',
            'ficheiro' => 'file|mimes:pdf,jpeg,png,jpg,gif,svg,mp3,wav,m4a,mp4,webm,3gp,mov,flv,avi,wmv,ts,mkv|max:6120',
        ]);

        $oldFile = $multimedia->ficheiro;
        $data = $this->handleResquest($request);

        $multimedia->update($data);
        $this->removeFileByExtension($oldFile, $multimedia->ficheiro);


        return redirect('/backend/multimedias')->with("message", "Ficheiro actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $multimedia = Multimedia::findOrFail($id);
        $file = $multimedia->ficheiro;

        $this->removeFileByExtension(null, $file); //remove o ficheiro do servidor

        $multimedia->delete();

        return redirect('/backend/multimedias')->with('message', 'O ficheiro foi excluído com sucesso!');
    }

    private function isFileSelected(Request $request)
    {
        if ($request->hasFile('ficheiro')) {
            return true;
        }
        return false;
    }

    private function removeFileByExtension($oldFile = null, $file)
    {
        if ($oldFile != null)
            $extensaoOldFile = explode(".", $oldFile)[1];
        $extensaoNewFile = explode(".", $file)[1];

        if ($oldFile != null) {
            if (($oldFile !== $file) && ($extensaoOldFile == $extensaoNewFile && $extensaoNewFile == 'pdf')) {
                $this->removeDoc($oldFile);
            }

            if (($oldFile !== $file) && ($extensaoNewFile == 'jpeg' || $extensaoNewFile == 'png' || $extensaoNewFile == 'jpg' || $extensaoNewFile == 'gif' || $extensaoNewFile == 'svg')) {
                $this->removeImage($oldFile);
            }

            if (($oldFile !== $file) && ($extensaoNewFile == 'mp3' || $extensaoNewFile == 'acc' || $extensaoNewFile == 'm4a')) {
                $this->removeAudio($oldFile);
            }

            if (($oldFile !== $file) && ($extensaoNewFile == 'mp4' || $extensaoNewFile == 'webm' || $extensaoNewFile == '3gp' || $extensaoNewFile == 'mov' || $extensaoNewFile == 'flv' || $extensaoNewFile == 'avi' || $extensaoNewFile == 'wmv' || $extensaoNewFile == 'ts' || $extensaoNewFile == 'mkv')) {
                $this->removeVideo($oldFile);
            }
        } else {
            if ($extensaoNewFile == 'pdf') {
                $this->removeDoc($file);
            }

            if ($extensaoNewFile == 'jpeg' || $extensaoNewFile == 'png' || $extensaoNewFile == 'jpg' || $extensaoNewFile == 'gif' || $extensaoNewFile == 'svg') {
                $this->removeImage($file);
            }

            if ($extensaoNewFile == 'mp3' || $extensaoNewFile == 'acc' || $extensaoNewFile == 'm4a') {
                $this->removeAudio($file);
            }

            if ($extensaoNewFile == 'mp4' || $extensaoNewFile == 'webm' || $extensaoNewFile == '3gp' || $extensaoNewFile == 'mov' || $extensaoNewFile == 'flv' || $extensaoNewFile == 'avi' || $extensaoNewFile == 'wmv' || $extensaoNewFile == 'ts' || $extensaoNewFile == 'mkv') {
                $this->removeVideo($file);
            }
        }
    }

    private function handleResquest(Request $request)
    {
        $dados = $request->all(); //pegar todos os dados inseridos pelo usuario
        if ($this->isFileSelected($request)) {
            $file = $request->file('ficheiro'); //pega o ficheiro
            $extension = $file->getClientOriginalExtension();

            if ($extension && $extension == 'pdf') {
                $docName = $this->handleResquestDoc($request);
                $dados['tipo'] = 'Documento';
                $dados['ficheiro'] = $docName;
            }
            if ($extension && ($extension == 'jpeg' || $extension == 'png' || $extension == 'jpg' || $extension == 'gif' || $extension == 'svg')) {
                $imgName = $this->handleResquestImage($request);
                $dados['tipo'] = 'Imagem';
                $dados['ficheiro'] = $imgName;
                $dados['doc_type'] == " ";
            }
            if ($extension && ($extension == 'mp3' || $extension == 'acc' || $extension == 'm4a')) {
                $audioName = $this->handleResquestAudio($request);
                $dados['tipo'] = 'Aúdio';
                $dados['ficheiro'] = $audioName;
                $dados['doc_type'] == " ";
            }
            if ($extension && ($extension == 'mp4' || $extension == 'webm' || $extension == '3gp' || $extension == 'mov' || $extension == 'flv' || $extension == 'avi' || $extension == 'wmv' || $extension == 'ts' || $extension == 'mkv')) {
                $videoName = $this->handleResquestVideo($request);
                $dados['tipo'] = 'Vídeo';
                $dados['ficheiro'] = $videoName;
                $dados['doc_type'] == " ";
            }
            return $dados;
        }
    }

    private function handleResquestImage(Request $request)
    {
        /*se o usuario se inseriu uma imagem, faça:*/
        if ($request->hasFile('ficheiro')) {
            $image = $request->file('ficheiro'); //pega o image
            $extension = $image->getClientOriginalExtension();
            /*nome temporarrio */
            //$fileName = time() . '.' . $extension; //pegar o nome e a extensao do
            $fileName = $request['nome_ficheiro'] . '.' . $extension; //pegar o nome e a extensao do

            $imageResize = Image::make($image->getRealPath())->orientate();
            $imageResize->resize(800, 450);

            $destination = $this->uploadPath; //pasta destino da imagem
            $successUploaded = $imageResize->save($destination . '/' . $fileName); //mover a imagem

            if ($successUploaded) {
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');

                $extension = $image->getClientOriginalExtension(); //extensao
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName); //renomear a thumnail

                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            return $fileName; //substituir os dados do campo image com os dados actual
        }
    }

    private function handleResquestDoc(Request $request)
    {
        /*se o usuario se inseriu um pdf, faça:*/
        if ($request->hasFile('ficheiro')) {
            $pdf = $request->file('ficheiro'); //pega o ficheiro
            //$fileName = time() . '.' . $pdf->getClientOriginalExtension(); //pegar o nome e a extensao do ficheiro e dar um nome temporario
            $fileName = $request['nome_ficheiro'] . '.' . $pdf->getClientOriginalExtension(); //pegar o nome e a extensao do ficheiro e dar um nome temporario

            $destination = $this->uploadPathDoc; //pasta destino do pdf
            $pdf->move($destination, $fileName); //mover o pdf

            return $fileName; //substituir os dados do campo pdf com os dados actual
        }
    }

    private function handleResquestAudio(Request $request)
    {
        /*se o usuario se inseriu um audio, faça:*/
        if ($request->hasFile('ficheiro')) {
            $audio = $request->file('ficheiro'); //pega o ficheiro
            //$fileName = time() . '.' . $audio->getClientOriginalExtension(); //pegar o nome e a extensao do ficheiro e dar um nome temporario
            $fileName = $request['nome_ficheiro']  . '.' . $audio->getClientOriginalExtension(); //pegar o nome e a extensao do ficheiro e dar um nome temporario

            $destination = $this->uploadPathAudio; //pasta destino do audio
            $audio->move($destination, $fileName); //mover o audio

            return $fileName; //substituir os dados do campo audio com os dados actual
        }
    }

    private function handleResquestVideo(Request $request)
    {
        /*se o usuario se inseriu um video, faça:*/
        if ($request->hasFile('ficheiro')) {
            $video = $request->file('ficheiro'); //pega o ficheiro
            //$fileName = time() . '.' . $video->getClientOriginalExtension(); //pegar o nome e a extensao do ficheiro e dar um nome temporario
            $fileName = $request['nome_ficheiro'] . '.' . $video->getClientOriginalExtension(); //pegar o nome e a extensao do ficheiro e dar um nome temporario

            $destination = $this->uploadPathVideo; //pasta destino do video
            $video->move($destination, $fileName); //mover o video

            return $fileName; //substituir os dados do campo video com os dados actual
        }
    }
    //eliminar as imagens
    private function removeImage($image)
    {

        if (!empty($image)) {
            $imagePath = $this->uploadPath . '/' . $image;
            $ext = substr(strchr($image, '.'), 1); //extensao das imagens
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }

    //eliminar docs
    private function removeDoc($doc)
    {

        if (!empty($doc)) {
            $docPath = $this->uploadPathDoc . '/' . $doc;

            if (file_exists($docPath)) unlink($docPath);
        }
    }

    //eliminar os audios
    private function removeAudio($audio)
    {

        if (!empty($audio)) {
            $audioPath = $this->uploadPathAudio . '/' . $audio;

            if (file_exists($audioPath)) unlink($audioPath);
        }
    }

    //eliminar os videos
    private function removeVideo($video)
    {

        if (!empty($video)) {
            $videoPath = $this->uploadPathVideo . '/' . $video;

            if (file_exists($videoPath)) unlink($videoPath);
        }
    }

    //listar os ficheiros com base no tipo
    private function fileTypeList($request)
    {
        return [
            'todos' => Multimedia::count(),
            'imagens' => Multimedia::where('tipo', 'Imagem')->count(),
            'documentos' => Multimedia::where('tipo', 'Documento')->count(),
            'audios' => Multimedia::where('tipo', 'Aúdio')->count(),
            'videos' => Multimedia::where('tipo', 'Vídeo')->count(),
        ];
    }
}
