<?php

namespace Modules\Admin\Http\Controllers\College\Department\Staff;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\Staff;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Staff\Entities\StaffType;
use Modules\College\Entities\College;
use Modules\Department\Entities\Department;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class StaffController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::college.department.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::college.department.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $staff_type = StaffType::find($data['category']);
        $staff = $staff_type->staffs()->create([
           'first_name'=>$data['first_name'],
           'last_name'=>$data['last_name'],
           'phone'=>$data['phone'],
           'email'=>$data['email'],
           'staffID'=>$data['staffID'],
           'password'=>Hash::make($data['staffID']),
           'department_id' => $data['department']
        ]);

        $staff->profile()->create([
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'tribe_id' => $data['tribe'],
            'address' => $data['address'],
            'biography' => 'staff biography',
        ]);

        session()->flash('message','Congratulation the new staff has been register successfully the staff can login and update his documents and other information using '.$data['email'].' as email and '.$data['staffID'].' as password ');
        return redirect()->route('admin.college.department.staff.show',[$staff->id]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($staff_id)
    {
        return view('admin::college.department.staff.edit',['staff'=>Staff::find($staff_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $staff_id)
    {
        $staff = Staff::find($staff_id);
        $data = $request->all();
        $staff->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'staffID'=>$data['staffID'],
            'password'=>Hash::make($data['staffID']),
            'department_id' => $data['department']
        ]);

        $staff->profile()->update([
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'tribe_id' => $data['tribe'],
            'address' => $data['address'],
            'biography' => 'staff biography',
        ]);

        session()->flash('message','Congratulation the staff information is updated successfully the staff can login and update his documents and other information using '.$data['email'].' as email and '.$data['staffID'].' as password ');
        return redirect()->route('admin.college.department.staff.show',[$staff->id]);

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($staff_id)
    {
        $errors = [];
        $staff = Staff::find($staff_id);
        dd($staff);
        if($staff->lecturer){
            $errors[] = 'Action denied because staff is lecturer you have to delete his lecturer record';
        }
        if($staff->directer){
            $errors[] = 'Action denied because staff is directer you have to delete his directer record';
        }
        if(empty($errors)){
            unset(session('staffs')[$staff]);
            $staff->profile->delete();
            $staff->delete();
            session()->flash('message','Congratulation staff is deleted successfully');
        }else{
            session()->flash('error',$errors);
        }
        return back();
    }

    public function show($staff_id)
    {
        return view('admin::college.department.staff.show',['staff'=>Staff::find($staff_id)]);
    }

    public function search(Request $request)
    {
        $flag = null;
        $staffs = [];
        if($request->college){
            $flag = 'college';
        }
        if($request->department){
            $flag = 'department';
        }
        if($flag){
            switch ($flag) {
                case 'college':
                    $college = College::find($request->college);
                    
                    foreach ($college->departments as $department) {
                        foreach ($department->staffs as $staff) {
                            $staffs[] = $staff;
                        }
                    }
                    $message = 'found in '.$college->name.' College';
                    break;
                default:
                    $department = Department::find($request->department);
                    foreach ($department->staffs as $staff) {
                        $staffs[] = $staff;
                    }
                    $message = 'found in '.$department->name.' Department';
                    break;
            }
        }else{
            $message = 'found in the entire school';
            foreach (admin()->colleges as $college) {
                foreach ($college->departments as $department) {
                    foreach ($department->staffs as $staff) {
                        $staffs[] = $staff;
                    }
                }
            }
        }
        $result = 'Staff';
        if(count($staffs) > 1){
            $result = 'Staffs';
        }
        session()->flash('message',count($staffs).' '.$result.' '.$message);
        session(['staffs'=>$staffs]);
        return redirect()->route('admin.college.department.staff.staff');
    }

    public function staff()
    {
        return view('admin::college.department.staff.staff');
    }
    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'CustomerName'  => $row['customer_name'],
         'Gender'   => $row['gender'],
         'Address'   => $row['address'],
         'City'    => $row['city'],
         'PostalCode'  => $row['postal_code'],
         'Country'   => $row['country']
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('tbl_customer')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
}
