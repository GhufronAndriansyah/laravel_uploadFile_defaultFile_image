<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // $students = Student::withTrashed()->get();
        return view('students.index',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Cara Pertama

        // $student = new Student;
        // $student->nama = $request->nama;
        // $student->nrp = $request->nrp;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;
        // $student->save();
        // return redirect('/students');

        //Cara Kedua Menggunakan Fillable

        // Student::create([
        //     'nama'=> $request->nama,
        //     'nrp'=> $request->nrp,
        //     'email'=> $request->email,
        //     'jurusan'=> $request->jurusan
        // ]);
        // return redirect('/students');

        //Cara Ketiga Menggunakan Fillable
        if($request->file < 1){
            $nama_file = 'no-photo.png';
        }else{
            $request->validate([
                'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
        }
        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|size:9',
            'email' => 'required',
            'jurusan' => 'required' 
        ]);
        Student::create([
            'nama'=> $request->nama,
            'nrp'=> $request->nrp,
            'email'=> $request->email,
            'jurusan'=> $request->jurusan,
            'file'=> $nama_file
        ]);
        return redirect('/students')->with('status','Data Student Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // $std = Student::withTrashed()
        //         ->where('id', $student)
        //         ->get();
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|size:9',
            'email' => 'required',
            'jurusan' => 'required'
        ]);
        
        Student::where('id',$student->id)
                ->update([
                    'nama'=> $request->nama,
                    'nrp'=> $request->nrp,
                    'email'=>$request->email,
                    'jurusan'=>$request->jurusan
                ]);
                return redirect('/students')->with('status','Data Student Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status','Data Student Berhasil Dihapus');
    }

    public function restore($student)
    {
        Student::withTrashed()
        ->where('id', $student)
        ->restore();
        return redirect('/students')->with('status','Restore Data Student Berhasil');

    }

    public function restore_all()
    {
        Student::withTrashed()->restore();
        return redirect('/students')->with('status','Restore Semua Data Student Berhasil');

    }

    public function hapus_permanen($student)
    {
        Student::withTrashed()
        ->where('id', $student)
        ->forceDelete();
        return redirect('/students')->with('status','Data Tong Sampah Berhasil Dihapus Permanen');
    }

    public function hapus_permanen_all()
    {
        Student::onlyTrashed()->forceDelete();
        return redirect('/students')->with('status','Semua Data Tong Sampah Berhasil Dihapus Permanen');
    }

    // public function upload(Request $request)
    // {   
	// 	$this->validate($request, [
    //         'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
    //     ]);
    //     $file = $request->file('file');
    //     $nama_file = time()."_".$file->getClientOriginalName();
    //     $tujuan_upload = 'data_file';
    //     $file->move($tujuan_upload,$nama_file);

    //     Student::create([
    //         'file' => $nama_file
    //     ]);
    // }
}

