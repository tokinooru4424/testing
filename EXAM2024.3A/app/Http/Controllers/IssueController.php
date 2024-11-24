<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('issues.index',['issues' => Issue::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lstComputer = Computer::all();
        $lstissue = Issue::all();
        return view('issues.add',['lstComputer' => $lstComputer,'lstissue'=>$lstissue]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $created_by = $request->input('created_by');
        $created_date = $request->input('created_date');
        $computer_id = $request->input('computer_id');
        $description = $request->input('description');
        $urgency = $request->input('urgency');
        $status = $request->input('status');

        DB::table('issues')->insert([
           'computer_id' => $computer_id,
            'description' => $description,
            'reported_by' =>  $created_by,
            'reported_date' => $created_date,
            'urgency' => $urgency,
            'status' => $status,
        ]);
        return redirect()->route('issues.index')->with('success','Thêm sự cố thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lstComputer = Computer::all();
        $issue = Issue::find($id);
        return view('issues.edit',['issue' => $issue,'lstComputer'=>$lstComputer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => 'required',
        
        ]);
        $issuse = Issue::find($id);
        $issuse->reported_by = $request->input('reported_by');
        $issuse->reported_date = $request->input('reported_date');
        $issuse->computer_id = $request->input('computer_id');
        $issuse->description = $request->input('description');
        $issuse->urgency = $request->input('urgency');
        $issuse->status = $request->input('status');
        $issuse->update();
        return redirect()->route('issues.index')->with('success','Sửa sự cố thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Booking = Issue::find($id);
        try{
            $Booking->delete();
            return redirect()->route('issues.index')->with('success','Xoá thành công');
        }catch(Exception $e){
            echo $e;        
        }
    }
}
