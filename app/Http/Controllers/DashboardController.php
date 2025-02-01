<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index() {

        $usuarios = User::all()->count();

        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as'),
        ])
        ->groupBy('ano')
        ->orderBy('ano',  'ASC')
        ->get();

        foreach($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        $catData = Categoria::all();

        foreach($catData as $cat) {
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = Produto::where('id_categorias', $cat->id)->count();
        }

        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
