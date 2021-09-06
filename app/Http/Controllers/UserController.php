<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(2);
 
        return response()->json([
            'status' => true,
            'data' => $users
            
        ]);
    }

    public function saveExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx'
        ]);

        $path = $request->file('import_file');
        $data = Excel::import(new UsersImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
    }

    public function downloadUser()
    {
        return Excel::download(new UsersExport, 'users-data.xlsx');
    }

}
