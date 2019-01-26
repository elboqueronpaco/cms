<?php



use App\Core\Controller;

class Pages extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        echo "Pagina inicial";
    }
    
}