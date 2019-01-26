<?php



use App\Core\Controller;
use App\Core\Layouts;
class Pages extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $Layouts = new Layouts("Pages/index");
    }
    public function about(){
        $Layouts = new Layouts("Pages/about");
    }
    
}